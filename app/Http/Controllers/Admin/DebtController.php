<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDebtRequest;
use App\Http\Requests\StoreDebtRequest;
use App\Models\User;
use App\Models\Debt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class DebtController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('debt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $debts = Debt::all();

        return view('admin.debt.index', compact('debts'));
    }
    
 public function payDebt(Debt $debt)
    {
        abort_if(Gate::denies('debt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

      
        $paydebt = request('debt','id');
     
        $some_data = array(
            'userSecretKey'=> config('toyyibpay.key'),
            'categoryCode'=> config('toyyibpay.category'),
            'billName'=>$paydebt->name,
            'billDescription'=>"terima kasih",
            'billPriceSetting'=>1,
            'billPayorInfo'=>1,
            'billAmount'=>$paydebt->amount * 100,
            'billReturnUrl'=> route('admin.toyyibpay.paymentstatus', $paydebt->id),
            'billCallbackUrl'=> route('admin.toyyibpay.callback'),
            'billExternalReferenceNo' => 'bill-4324',
            'billTo'=>$paydebt->name ,
            'billEmail'=>'resityuranalqori@gmail.com',
            'billPhone'=>'0183879635',
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>0,
            'billContentEmail'=>'Terima kasih kerana telah bayar yuran mengaji!:)',
            'billChargeToCustomer'=>1,
           
           
          );
 


          $url = 'https://toyyibpay.com/index.php/api/createBill';
          $response = Http::asForm()->post($url, $some_data);
          $billCode = $response[0]["BillCode"];

          return redirect('https://toyyibpay.com/'. $billCode);
    }
   
    public function create()
    {
        abort_if(Gate::denies('debt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       // $users = User::pluck('name', 'id');

        return view('admin.debt.create');
    }

    public function store(StoreDebtRequest $request)
    {
        $debt = Debt::create($request->all());
       
        

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $debt['image']= $filename;
        }
        $debt->save();
        
      

        return redirect()->route('admin.debt.index');
    }


  public function edit(Debt $debt)
    {
        abort_if(Gate::denies('debt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       

        return view('admin.debt.edit', compact('debt'));
    }
    
  

    public function update(UpdateDebtRequest $request)
    {
        $debt = Debt::create($request->all());
       
        

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $debt['image']= $filename;
        }
        $debt->save();
        
      

        return redirect()->route('admin.debt.index');
    }
    
    public function destroy(Debt $debt)
    {
        abort_if(Gate::denies('debt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $debt->delete();

        return back();
    }


   /* public function show(UserAlert $userAlert)
    {
        abort_if(Gate::denies('user_alert_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAlert->load('users');

        return view('admin.userAlerts.show', compact('userAlert'));
    }

    public function destroy(UserAlert $userAlert)
    {
        abort_if(Gate::denies('user_alert_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $userAlert->delete();

        return back();
    }

    public function massDestroy(MassDestroyUserAlertRequest $request)
    {
        UserAlert::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }*/

   
}
