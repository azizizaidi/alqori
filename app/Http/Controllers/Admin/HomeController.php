<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Auth;
use App\Models\AssignClassTeacher;
use App\Models\ReportClass;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;


class HomeController
{
    public function index()
    {
         $registrars = User::with('roles')
                        ->whereRelation('roles','id', 'like', '%'.'4'.'%');
                        
        $teachers = User::with('roles')
                        ->whereRelation('roles','id', 'like', '%'.'2'.'%');                
                        
        $students = User::with('roles')
                        ->whereRelation('roles','id', 'like', '%'.'3'.'%');
                        
         $reportclasses = ReportClass::get();


     

       // $assignclasses = AssignClassTeacher::with('teacher','registrar','classes')
         //               ->whereRelation('teacher','id', 'like', '%'.Auth::user()->id.'%')
                     //   ->get();
    //dd($reportclasses);
        
        //$students = AssignClassTeacher::with([ 'student', 'teacher','class'])
                                     // ->whereRelation('teacher','id', 'like', '%'.Auth::user()->id.'%')
                                   //   ->get();;
        
        return view('home', compact('registrars','students','teachers','reportclasses'));
    }
}
