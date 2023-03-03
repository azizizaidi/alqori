<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyReportClassRequest;
use App\Http\Requests\StoreReportClassRequest;
use App\Http\Requests\UpdateReportClassRequest;
use App\Models\AssignClassTeacher;
use App\Models\ReportClass;
use App\Models\User;
use App\Models\Registrar;
use App\Models\ClassName;
use App\Models\StdntRgstr;
use App\Models\RegisterClass;
use Gate;
use Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use Illuminate\Auth\AuthManager;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class ReportClassController extends Controller
{
    use CsvImportTrait;
  
    public function allowance()
    {

     abort_if(Gate::denies('allowance_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

     $teachers = DB::table('report_classes AS report')
     ->whereNull('report.deleted_at')
     ->select('report.id', 'report.created_by_id', 'user.name', DB::raw('SUM(report.allowance) AS alw'), 'report.month', 'report.created_at')
     ->groupBy('report.id', 'report.created_by_id', 'user.name', 'report.month', 'report.created_at')
     ->join('users AS user', 'report.created_by_id', 'user.id')
     ->orderBy('report.created_at', 'desc')
     ->get();
         //dd($teachers);
      
      
        return view('admin.reportClasses.allowance', compact('teachers'));
 

    }
//---------------------------------------------------------------------------------------------------------------

  public function editallowance(ReportClass $teacher)
    {
        abort_if(Gate::denies('edit_allowance'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $user = User::with('roles')->whereRelation('roles','id', 'like', '%'.'2'.'%')->select('id', DB::raw("CONCAT(users.name,' ',code) AS full_name"))->get()->pluck('full_name', 'id');;
      

       $teacher->load('created_by');
       
       
       return view('admin.reportClasses.editallowance', compact( 'teacher','user'));
    }
    public function index()
    {
        abort_if(Gate::denies('report_class_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       
        $reportClasses = ReportClass::with(['registrar', 'created_by','class_name'])->get();
        
        $users = User::get();
         $registrars =DB::table('users')->select('id', DB::raw("CONCAT(users.name,' ',code) AS full_name"))->get()->pluck('full_name', 'id');
      

        $teachers = DB::table('report_classes AS report')
        ->select('report.created_by_id', 'user.name', DB::raw('SUM(report.allowance) AS alw'),'month')
        ->groupBy('report.created_by_id', 'user.name')
        ->groupBy('report.month')
        ->join('users AS user', 'report.created_by_id', 'user.id')
        ->orderBy('report.created_by_id', 'DESC')
        ->get();
      

        return view('admin.reportClasses.index', compact('reportClasses', 'users','registrars','teachers'));
 
       

         }

    public function indexstudent()
    {
        abort_if(Gate::denies('report_class_student'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      if(Auth::user()->roles->contains(4)){
        $registrar_id =Auth::user()->id;
     
        $reportClasses = ReportClass::with([ 'registrar', 'created_by'])
                                    
                                      ->where('registrar_id',$registrar_id)
                                      ->whereNotIn('month',['null','mar2022','apr2022'])
                                      ->get();
                                      
                                   
                     
                                      
       // dd( $registrar_id);
        $users = User::get();
       //dd($reportClasses);
        
        return view('admin.reportClasses.indexstudent', compact('reportClasses', 'users'));
       } elseif(Auth::user()->roles->contains(1)){
             //$registrar_id =Auth::user()->id;
     
        $reportClasses = ReportClass::with([ 'registrar', 'created_by'])
                                    
                                      //->whereRelation('registrar', 'registrar_id', 'like', '%'.$registrar_id.'%')
                                      ->get();
                                      
                                   
                     
                                      
       // dd( $reportClasses);
        $users = User::get();
      //return dd($reportClasses);
        
        return view('admin.reportClasses.indexstudent', compact('reportClasses', 'users'));
        }
    }

    public function create()
    {
        abort_if(Gate::denies('report_class_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
       // whereRelation('roles','id', 'like', '%'.'4'.'%')
       //->whereRelation('registrar','teacher_id', 'like', '%'.Auth::user()->id.'%')
     
        $registrars = User::with('registrar')->whereRelation('roles','id', 'like', '%'.'4'.'%')->select('id', DB::raw("CONCAT(users.name,' ',code) AS full_name"))->get()->pluck('full_name', 'id');
   
   //$registrars= AssignClassTeacher::with('registrar')->whereRelation('registrar','teacher_id', 'like', '%'.Auth::user()->id.'%'//)->select('id','registrar_id','teacher_id')->get();
 // dd($registrars);
  
  
    
   // $registrars = DB::table('assign_class_teachers AS assignclass')
     //   ->whereRelation('registrar_id','teacher_id', 'like', '%'.Auth::user()->id.'%')
       // ->select('assignclass.registrar_id', 'user.name')
        //->join('users AS user', 'assignclass.registrar_id', 'user.id')
        //->get();
         //dd($registrars);
        
       $classnames = ClassName:: orderBy('name', 'ASC')->get()->pluck("name","id");
       return view('admin.reportClasses.create', compact( ['registrars','classnames']));
 
      
          }
         
          
    public function getClassNames($id) 
    {        
        $classnames = DB::table("assign_class_teacher_class_name")->where("assign_class_teacher_id",$id)->pluck("class_names_id","");
         //dd( $classnames);
        return json_encode($classnames);
    }

    public function store(StoreReportClassRequest $request)
    {
        
        
       
        $reportClass = ReportClass::create($request->all());
        
        //dd($reportClass);
        
        $classname = ClassName::find($request->id = $reportClass->class_names_id);
        $classname_2 = ClassName::find($request->id = $reportClass->class_names_id_2);

        if($reportClass->total_hour_2 == null){
            
            $reportClass->allowance = $reportClass->total_hour * $classname->allowanceperhour;
            if($classname->name == "Al-Quran Online AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 35 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 30 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 25 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Fardhu Ain Online AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 40 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 35 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 30 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Al-Quran Fizikal AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 50 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 45 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 40 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Fardhu Ain Fizikal AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 60 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 55 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 50 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Al-Quran Online BQ"){
                $reportClass->fee_student = 35 * $reportClass->total_hour;
            }elseif($classname->name == "Al-Quran Online CQ"){
                $reportClass->fee_student = 40 * $reportClass->total_hour;
            }elseif($classname->name == "Fardhu Ain Online BQ"){
                $reportClass->fee_student = 40 * $reportClass->total_hour;
            }elseif($classname->name == "Al-Quran Fizikal BQ"){
                $reportClass->fee_student = 50 * $reportClass->total_hour;
            }elseif($classname->name == "Fardhu Ain Fizikal BQ"){
                $reportClass->fee_student = 60 * $reportClass->total_hour;
            }
        }

        else{
            $reportClass->allowance = ($reportClass->total_hour * $classname->allowanceperhour)
            +($reportClass->total_hour_2 * $classname_2->allowanceperhour);

            if($classname->name == "Al-Quran Online AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 35 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 30 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 25 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Fardhu Ain Online AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 40 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <=11.9){
                    $reportClass->fee_student = 35 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 30 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Al-Quran Fizikal AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 50 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 45 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 40 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Fardhu Ain Fizikal AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 60 * $reportClass->total_hour;  
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 55 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 50 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Al-Quran Online BQ"){
                $reportClass->fee_student = 35 * $reportClass->total_hour;
            }elseif($classname->name == "Al-Quran Online CQ"){
                $reportClass->fee_student = 40 * $reportClass->total_hour;
            }elseif($classname->name == "Fardhu Ain Online BQ"){
                $reportClass->fee_student = 40 * $reportClass->total_hour;
            }elseif($classname->name == "Al-Quran Fizikal BQ"){
                $reportClass->fee_student = 50 * $reportClass->total_hour;
            }elseif($classname->name == "Fardhu Ain Fizikal BQ"){
                $reportClass->fee_student = 60 * $reportClass->total_hour;
            }

            //----------------------------------------------
            $feestudent = $reportClass->fee_student;
            if($classname_2->name == "Al-Quran Online AQ"){
                if($reportClass->total_hour_2 <= 7.9){
                    $reportClass->fee_student = $feestudent + (35 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 <= 11.9){
                    $reportClass->fee_student = $feestudent + (30 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 >= 12){
                    $reportClass->fee_student = $feestudent + (25 * $reportClass->total_hour_2);
                }
                 
            }elseif($classname_2->name == "Fardhu Ain Online AQ"){
                if($reportClass->total_hour_2 <= 7.9){
                    $reportClass->fee_student = $feestudent + (40 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 <= 11.9){
                    $reportClass->fee_student = $feestudent + (35 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 >= 12){
                    $reportClass->fee_student = $feestudent + (30 * $reportClass->total_hour_2);
                }
                 
            }elseif($classname_2->name == "Al-Quran Fizikal AQ"){
                if($reportClass->total_hour_2 <= 7.9){
                    $reportClass->fee_student = $feestudent + (50 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 <= 11.9){
                    $reportClass->fee_student = $feestudent + (45 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 >= 12){
                    $reportClass->fee_student = $feestudent + (40 * $reportClass->total_hour_2);
                }
                 
            }elseif($classname_2->name == "Fardhu Ain Fizikal AQ"){
                if($reportClass->total_hour_2 <= 7.9){
                    $reportClass->fee_student = $feestudent + (60 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 <= 11.9){
                    $reportClass->fee_student = $feestudent + (55 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 >= 12){
                    $reportClass->fee_student = $feestudent + (50 * $reportClass->total_hour_2);
                }
                 
            }elseif($classname_2->name == "Al-Quran Online BQ"){
                $reportClass->fee_student = $feestudent + (35 * $reportClass->total_hour_2);
            }elseif($classname_2->name == "Al-Quran Online CQ"){
                $reportClass->fee_student = $feestudent + (40 * $reportClass->total_hour_2);
            }elseif($classname_2->name == "Fardhu Ain Online BQ"){
                $reportClass->fee_student = $feestudent + (40 * $reportClass->total_hour_2);
            }elseif($classname_2->name == "Al-Quran Fizikal BQ"){
                $reportClass->fee_student = $feestudent + (50 * $reportClass->total_hour_2);
            }elseif($classname_2->name == "Fardhu Ain Fizikal BQ"){
                $reportClass->fee_student = $feestudent + (60 * $reportClass->total_hour_2);
            }



        }
       
        $reportClass->status = 0;
        $reportClass->save();
        //dd($reportClass);
//--------------------------
       //  $user = User::get();
      // dd($request);
      // $assignclass = new AssignClassTeacher;
      // $assignclass->student_id = $request->student->id;
       //$assignclass->save();

    //    $reportClass = new ReportClass;
    //    $reportClass->student_id = $assignclass->student_id;
    //    $reportClass->date = $request->date;
     //   $reportClass->total_hour = $request->total_hour;
       // dd($reportClass);
       // $reportClass->allowance = $reportClass->total_hour * $classnames->allowanceperhour;

    //   $reportClass->save();

        return redirect()->route('admin.report-classes.index');

       //----------------------------------------------
       // $user = new User();
           
      //  $user->usertype = 'Registrar';
      //  $user->password = bcrypt($request->password);
      //  $user->name = $request->name;
      //  $user->email = $request->email;
      //  $user->save();


      
           //       $assign_registrar = new AssignRegistrar();
           //       $assign_registrar->registrar_id = $user->id;
           //       $assign_registrar->surname = $request->surname;
            //      $assign_registrar->phone = $request->phone;
            //      $assign_registrar->number_id = $request->number_id;
                  
            //      $assign_registrar->save();
  
           
       
      //  $notification = array(
      //      'message' => 'Registrar Registration Inserted Successfully',
    //        'alert-type' => 'success'
    //    );
//
     //   return redirect()->route('registrar.view')->with($notification);
        //----------------
    }
   

    //------------------------------------------------------------------------------------------------------------------------------------------
    public function edit(ReportClass $reportClass)
    {
        abort_if(Gate::denies('status_fee'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       $registrars = User::with('roles')->whereRelation('roles','id', 'like', '%'.'4'.'%')->select('id', DB::raw("CONCAT(users.name,' ',code) AS full_name"))->get()->pluck('full_name', 'id');
     
       $classnames = ClassName::orderBy('name','ASC')->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

       $reportClass->load('registrar', 'class_name', 'created_by','class_name_2');

       return view('admin.reportClasses.edit', compact( 'registrars', 'classnames','reportClass'));
    }

    public function update(UpdateReportClassRequest $request, ReportClass $reportClass)
    {
        $reportClass->update($request->all());
        
        //dd($reportClass);
         //$classname = ClassName::find($request->id = $reportClass->class_names_id);
        
          $classname = ClassName::find($reportClass->class_name->id = $reportClass->class_names_id);
      
         //dd( $classname_2);

        if($reportClass->total_hour_2 == null){
            
            $reportClass->allowance = $reportClass->total_hour * $classname->allowanceperhour;
            if($classname->name == "Al-Quran Online AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 35 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 30 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 25 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Fardhu Ain Online AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 40 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 35 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 30 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Al-Quran Fizikal AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 50 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 45 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 40 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Fardhu Ain Fizikal AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 60 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 55 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 50 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Al-Quran Online BQ"){
                $reportClass->fee_student = 35 * $reportClass->total_hour;
            }elseif($classname->name == "Al-Quran Online CQ"){
                $reportClass->fee_student = 40 * $reportClass->total_hour;
            }elseif($classname->name == "Fardhu Ain Online BQ"){
                $reportClass->fee_student = 40 * $reportClass->total_hour;
            }elseif($classname->name == "Al-Quran Fizikal BQ"){
                $reportClass->fee_student = 50 * $reportClass->total_hour;
            }elseif($classname->name == "Fardhu Ain Fizikal BQ"){
                $reportClass->fee_student = 60 * $reportClass->total_hour;
            }
        }

        else{
            
              $classname_2 = ClassName::find($reportClass->class_name_2->id = $reportClass->class_names_id_2);
              
              
            $reportClass->allowance = ($reportClass->total_hour * $classname->allowanceperhour)
            +($reportClass->total_hour_2 * $classname_2->allowanceperhour);

            if($classname->name == "Al-Quran Online AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 35 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 30 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 25 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Fardhu Ain Online AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 40 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <=11.9){
                    $reportClass->fee_student = 35 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 30 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Al-Quran Fizikal AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 50 * $reportClass->total_hour;
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 45 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 40 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Fardhu Ain Fizikal AQ"){
                if($reportClass->total_hour <= 7.9){
                    $reportClass->fee_student = 60 * $reportClass->total_hour;  
                }elseif($reportClass->total_hour <= 11.9){
                    $reportClass->fee_student = 55 * $reportClass->total_hour;
                }elseif($reportClass->total_hour >= 12){
                    $reportClass->fee_student = 50 * $reportClass->total_hour;
                }
                 
            }elseif($classname->name == "Al-Quran Online BQ"){
                $reportClass->fee_student = 35 * $reportClass->total_hour;
            }elseif($classname->name == "Al-Quran Online CQ"){
                $reportClass->fee_student = 40 * $reportClass->total_hour;
            }elseif($classname->name == "Fardhu Ain Online BQ"){
                $reportClass->fee_student = 40 * $reportClass->total_hour;
            }elseif($classname->name == "Al-Quran Fizikal BQ"){
                $reportClass->fee_student = 50 * $reportClass->total_hour;
            }elseif($classname->name == "Fardhu Ain Fizikal BQ"){
                $reportClass->fee_student = 60 * $reportClass->total_hour;
            }

            //----------------------------------------------
            $feestudent = $reportClass->fee_student;
            if($classname_2->name == "Al-Quran Online AQ"){
                if($reportClass->total_hour_2 <= 7.9){
                    $reportClass->fee_student = $feestudent + (35 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 <= 11.9){
                    $reportClass->fee_student = $feestudent + (30 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 >= 12){
                    $reportClass->fee_student = $feestudent + (25 * $reportClass->total_hour_2);
                }
                 
            }elseif($classname_2->name == "Fardhu Ain Online AQ"){
                if($reportClass->total_hour_2 <= 7.9){
                    $reportClass->fee_student = $feestudent + (40 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 <= 11.9){
                    $reportClass->fee_student = $feestudent + (35 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 >= 12){
                    $reportClass->fee_student = $feestudent + (30 * $reportClass->total_hour_2);
                }
                 
            }elseif($classname_2->name == "Al-Quran Fizikal AQ"){
                if($reportClass->total_hour_2 <= 7.9){
                    $reportClass->fee_student = $feestudent + (50 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 <= 11.9){
                    $reportClass->fee_student = $feestudent + (45 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 >= 12){
                    $reportClass->fee_student = $feestudent + (40 * $reportClass->total_hour_2);
                }
                 
            }elseif($classname_2->name == "Fardhu Ain Fizikal AQ"){
                if($reportClass->total_hour_2 <= 7.9){
                    $reportClass->fee_student = $feestudent + (60 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 <= 11.9){
                    $reportClass->fee_student = $feestudent + (55 * $reportClass->total_hour_2);
                }elseif($reportClass->total_hour_2 >= 12){
                    $reportClass->fee_student = $feestudent + (50 * $reportClass->total_hour_2);
                }
                 
            }elseif($classname_2->name == "Al-Quran Online BQ"){
                $reportClass->fee_student = $feestudent + (35 * $reportClass->total_hour_2);
            }elseif($classname_2->name == "Al-Quran Online CQ"){
                $reportClass->fee_student = $feestudent + (40 * $reportClass->total_hour_2);
            }elseif($classname_2->name == "Fardhu Ain Online BQ"){
                $reportClass->fee_student = $feestudent + (40 * $reportClass->total_hour_2);
            }elseif($classname_2->name == "Al-Quran Fizikal BQ"){
                $reportClass->fee_student = $feestudent + (50 * $reportClass->total_hour_2);
            }elseif($classname_2->name == "Fardhu Ain Fizikal BQ"){
                $reportClass->fee_student = $feestudent + (60 * $reportClass->total_hour_2);
            }



        }
       
         $reportClass->update();

        return redirect()->route('admin.report-classes.index-student');
    }

    public function show(ReportClass $reportClass)
    {
        return view('admin.reportClasses.show', compact('reportClass'));
    }

    public function showinvoice(ReportClass $reportClass)
    {
        //abort_if(Gate::denies('report_class_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $user = auth()->user();
        $reportClass->load( 'registrar', 'created_by','class_name','class_name_2');
        

       // return view('admin.reportClasses.show', compact('reportClass'));

       //$reportClass->teacher->name
       $client = new Party([
        'name'          => $reportClass->created_by->name,
        'phone'         => $reportClass->id,
        'id_invoice'    => $reportClass->id,
         'date'    => $reportClass->created_at->toDateString(),
         
          'class_date'    => $reportClass->date,
          'class_date_2'    => $reportClass->date_2,
       
        'custom_fields' => ReportClass::where('id', $reportClass->id)->get()
           // 'classname'     => [$reportClass->class_name->name],
          //  'hour'          =>$reportClass->total_hour,
          //  'rate'          => 'RM'.$reportClass->class_name->feeperhour,
          //  'fee'           => 'RM'.$reportClass->fee_student,

        ,
    ]);

   // $feeclass = ReportClass::get('id');

    $customer = new Party([
        'name'          => $reportClass->registrar->name,
        'address'       => 'The Green Street 12',
        'code'          => '#22663214',
        'custom_fields' => [
            'order number' => '> 654321 <',
        ],
    ]);

    //feeperhour x totalhour

    $items = [
        (new InvoiceItem())->title('Service 1')->pricePerUnit(47.79)->quantity(2)->discount(10),
        (new InvoiceItem())->title('Service 2')->pricePerUnit(71.96)->quantity(2),
        (new InvoiceItem())->title('Service 3')->pricePerUnit(4.56),
        (new InvoiceItem())->title('Service 4')->pricePerUnit(87.51)->quantity(7)->discount(4)->units('kg'),
        (new InvoiceItem())->title('Service 5')->pricePerUnit(71.09)->quantity(7)->discountByPercent(9),
        (new InvoiceItem())->title('Service 6')->pricePerUnit(76.32)->quantity(9),
        (new InvoiceItem())->title('Service 7')->pricePerUnit(58.18)->quantity(3)->discount(3),
        (new InvoiceItem())->title('Service 8')->pricePerUnit(42.99)->quantity(4)->discountByPercent(3),
        (new InvoiceItem())->title('Service 9')->pricePerUnit(33.24)->quantity(6)->units('m2'),
        (new InvoiceItem())->title('Service 11')->pricePerUnit(97.45)->quantity(2),
        (new InvoiceItem())->title('Service 12')->pricePerUnit(92.82),
        (new InvoiceItem())->title('Service 13')->pricePerUnit(12.98),
        (new InvoiceItem())->title('Service 14')->pricePerUnit(160)->units('hours'),
        (new InvoiceItem())->title('Service 15')->pricePerUnit(62.21)->discountByPercent(5),
        (new InvoiceItem())->title('Service 16')->pricePerUnit(2.80),
        (new InvoiceItem())->title('Service 17')->pricePerUnit(56.21),
        (new InvoiceItem())->title('Service 18')->pricePerUnit(66.81)->discountByPercent(8),
        (new InvoiceItem())->title('Service 19')->pricePerUnit(76.37),
        (new InvoiceItem())->title('Service 20')->pricePerUnit(55.80),
    ];

    $notes = [
        'your multiline',
        'additional notes',
        'in regards of delivery or something else',
    ];
    $notes = implode("<br>", $notes);

    $invoice = Invoice::make('Invoice')
        ->template('alqori')
        ->series('BIG')
        ->sequence(667)
        ->serialNumberFormat('{SEQUENCE}/{SERIES}')
        ->seller($client)
       // ->fee($feeclass)
        ->buyer($customer)
        ->date(now()->subWeeks(3))
        ->dateFormat('m/d/Y')
        ->payUntilDays(14)
        ->currencySymbol('$')
        ->currencyCode('USD')
        ->currencyFormat('{SYMBOL}{VALUE}')
        ->currencyThousandsSeparator('.')
        ->currencyDecimalPoint(',')
        ->filename($client->name . ' ' . $customer->name)
        ->addItems($items)
        ->notes($notes)
        ->logo(public_path('vendor/invoices/sample-logo.png'))
        // You can additionally save generated invoice to configured disk
        ->save('public');

    $link = $invoice->url();
    // Then send email to party with link

    // And return invoice itself to browser or have a different view
    return $invoice->stream();
 }


    public function destroy(ReportClass $reportClass)
    {
        abort_if(Gate::denies('report_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportClass->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportClassRequest $request)
    {
        ReportClass::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function createBill(ReportClass $reportClass)
    {
        //$reportClass->load( 'registrar', 'created_by');
        $report = request('reportClass','id');
        //$response->fee_student."00";
        //dd
        $some_data = array(
            'userSecretKey'=> config('toyyibpay.key'),
            'categoryCode'=> config('toyyibpay.category'),
            'billName'=>$report->registrar->code,
            'billDescription'=>$report->month,
            'billPriceSetting'=>1,
            'billPayorInfo'=>1,
            'billAmount'=>$report->fee_student * 100,
            'billReturnUrl'=> route('admin.toyyibpay.paymentstatus', $report->id),
            'billCallbackUrl'=> route('admin.toyyibpay.callback'),
            'billExternalReferenceNo' => 'bill-4324',
            'billTo'=>$report->registrar->name,
            'billEmail'=>'resityuranalqori@gmail.com',
            'billPhone'=>'0183879635',
            'billSplitPayment'=>0,
            'billSplitPaymentArgs'=>'',
            'billPaymentChannel'=>0,
            'billContentEmail'=>'Terima kasih kerana telah bayar yuran mengaji!:)',
            'billChargeToCustomer'=>1,
           
           
          );
 

 //dd('$some_data');
          $url = 'https://toyyibpay.com/index.php/api/createBill';
          $response = Http::asForm()->post($url, $some_data);
          $billCode = $response[0]["BillCode"];
         
          return redirect('https://toyyibpay.com/'. $billCode);
    }

    public function paymentStatus(ReportClass $reportClass)
    {
        $report = request('reportClass','id');
      
       //tambah if status id
      
      
      
        $response = request()->all(['status_id','billcode','order_id']);
        if(request()->status_id == 1)
       {
        $report->status = 1;
        $report->save();
            return redirect()->route('admin.report-classes.index-student');
        }else if(request()->status_id == 2)
        {
            $report->status = 2;
            $report->save();
                return redirect()->route('admin.report-classes.index-student');
        }else if(request()->status_id == 3)
        {
            $report->status = 3;
            $report->save();
                return redirect()->route('admin.report-classes.index-student');
        }
    }
    

    public function callback()
    {
        
    }

    public function billTransaction()
    {
        
    }
    public function paymentPage(ReportClass $reportClass)
    {
        $response = request('reportClass','id');
        //dd($response);
        return view('admin.reportClasses.paymentpage', compact( ['response']));
    }
}