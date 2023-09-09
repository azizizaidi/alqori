<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFeeRequest;
use App\Http\Requests\StoreFeeRequest;
use App\Http\Requests\StoreAddReceiptRequest;
use App\Http\Requests\UpdateFeeRequest;
use App\Models\ReportClass;
use App\Models\User;
use App\Models\Fee;
use App\Models\HistoryPayment;
use Illuminate\Support\Facades\Http;
use Gate;
use Auth;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;

class FeeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('fee_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fees.index');
    }

    public function amount(Request $request)
    {
       
        $selectedFee = $request->input('selected_fee');

        //dd($request);
    
        return redirect()->route('admin.toyyibpay.createBill', compact('selectedFee'));
    
    }

    public function pay()
    {
      

      $fee=ReportClass::where('registrar_id',Auth::user()->id)->sum('fee_student') - HistoryPayment::where('paid_by_id',Auth::user()->id)->sum('amount_paid');
      $percentage30 = 0.3 * $fee; 
      $percentage50 = 0.5 * $fee;
      $percentage70 = 0.7 * $fee;
      $percentage100 = 1 * $fee;

    

    

        return view('admin.fees.pay', compact('percentage30','percentage50','percentage70','percentage100','fee'));
    }
    
     public function addReceipt()
    {
        abort_if(Gate::denies('fee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
         $registrars = User::with('roles')
                        ->whereRelation('roles','id', 'like', '%'.'4'.'%')
                        ->select('id', DB::raw("CONCAT(users.name,' ',code) AS full_name"))->get()->pluck('full_name', 'id');

        return view('admin.fees.addreceipt',compact('registrars'));
    }

    public function create()
    {
        abort_if(Gate::denies('fee_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fees.create');
    }
    
     public function storeReceipt(StoreAddReceiptRequest $request)
    {
        
    
   
    //dd($request);
        $receipt = HistoryPayment::create($request->all());

        return redirect()->route('admin.fees.index');
    }

    public function store(StoreFeeRequest $request)
    {
        $fee = Fee::create($request->all());

        return redirect()->route('admin.fees.index');
    }

    public function edit(Fee $fee)
    {
        abort_if(Gate::denies('fee_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fees.edit', compact('fee'));
    }

    public function update(UpdateFeeRequest $request, Fee $fee)
    {
        $fee->update($request->all());

        return redirect()->route('admin.fees.index');
    }

    public function show(Fee $fee)
    {
        abort_if(Gate::denies('fee_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.fees.show', compact('fee'));
    }

    public function destroy(Fee $fee)
    {
        abort_if(Gate::denies('fee_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $fee->delete();

        return back();
    }

    public function massDestroy(MassDestroyFeeRequest $request)
    {
        Fee::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function createBill($selectedFee)
    {
      
    
       
       
        $some_data = array(
            'userSecretKey'=> config('toyyibpay.key'),
            'categoryCode'=> config('toyyibpay.category'),
            'billName'=>'contoh1',
            'billDescription'=>'blabla',
            'billPriceSetting'=>1,
            'billPayorInfo'=>1,
            'billAmount'=>$selectedFee * 100,
            'billReturnUrl'=> route('admin.toyyibpay.paymentstatus'),
            'billCallbackUrl'=> route('admin.toyyibpay.callback'),
            'billExternalReferenceNo' => 'bill-4324',
            'billTo'=>'testdwd',
            'billEmail'=>'resityuranalqori@gmail.com',
            'billPhone'=>'0183879635',
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>0,
            'billContentEmail'=>'Terima kasih kerana telah bayar yuran mengaji!:)',
            'billChargeToCustomer'=>1,
           
           
          
           
           
          );
 

 
          $url = 'https://dev.toyyibpay.com/index.php/api/createBill';
          $response = Http::asForm()->post($url, $some_data);
          $billCode = $response[0]['BillCode'];
          $billAmount = $selectedFee;

          // Store the billCode in the session
          session([
            'billAmount' => $billAmount,
            'billCode' => $billCode
        ]);
         
          return redirect('https://dev.toyyibpay.com/'. $billCode);

       
    }

 

    public function paymentStatus()
    {

        $response= request()->status_id;
        if($response == 1)
        {
          $paidby = Auth::user()->id;     
          $billAmount = session('billAmount');
          $billCode = session('billCode');
          $hpayment = HistoryPayment::create([
          'amount_paid' => $billAmount,
          'receipt_paid' => 'https://dev.toyyibpay.com/'. $billCode,
          'paid_by_id'  => $paidby,
         ]);
         $totalfee = ReportClass::where('registrar_id',Auth::user()->id)->sum('fee_student');
         $balance = $totalfee -  $billAmount;

        // dd($paidby);

         return redirect()->route('admin.home')->with('success', 'Your payment has been successfully');
        }
    
      else
      {
         
          return redirect()->route('admin.home')->with('fail', 'Your payment has been canceled');;
      }
   
        
    }
    

    public function callback()
    {
        $response= request()->all(['refno','status','reason','billcode','order_id','amount']);
       Log::info($response);
    }
}
