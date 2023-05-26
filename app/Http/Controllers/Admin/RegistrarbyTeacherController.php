<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyClaimRequest;
use App\Http\Requests\StoreClaimRequest;
use App\Models\User;
use App\Models\ClassName;
use App\Models\AssignClassTeacher;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class RegistrarbyTeacherController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('registrar_by_teacher_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $registrars = AssignClassTeacher:: with('classes','registrar')
        ->whereRelation('teacher', 'teacher_id', 'LIKE',Auth::user()->id)
        //->whereRelation('classes', 'class_name_id', 'LIKE', $id)
        //->orderBy('student_code', 'ASC')
      //  ->join('users', 'assign_class_teachers.registrar_id', '=', 'users.id')
       //->select(DB::raw("CONCAT(users.name,' ',users.code) AS full_name"), 'assign_class_teachers.id')
       // ->pluck('full_name', 'assign_class_teachers.id');
       ->get();

       
//foreach ($registrars as $registrar) {
   // echo $registrar->registrar->name;
//}
      // dd($registrars);

        return view('admin.registrar-by-teacher.index', compact('registrars'));
    }

    public function create()
    {
        abort_if(Gate::denies('claim_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

       // $users = User::pluck('name', 'id');

        return view('admin.claim.create');
    }

    public function store(StoreClaimRequest $request)
    {
        $claim = Claim::create($request->all());
       
        

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('Image'), $filename);
            $claim['image']= $filename;
        }
        $claim->save();
        
      

        return redirect()->route('admin.claim.index');
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
