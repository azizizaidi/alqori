<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Auth;
use App\Models\AssignClassTeacher;
use App\Models\ReportClass;
use App\Models\HistoryPayment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Gate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use ConsoleTVs\Charts\Facades\Charts;


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

         $hpayment = HistoryPayment::get();


 


           
           
        return view('home', compact('registrars','students','teachers','reportclasses','hpayment'));
    }

    
}


