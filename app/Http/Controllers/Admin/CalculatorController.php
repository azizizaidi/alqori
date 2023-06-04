<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CalculatorController extends Controller
{
 
    private $rates = [
        'student' => [
            'physical' => [
                'quran' => 50,
                'fardhu_ain' => 60
            ],
            'online' => [
                'quran' => 35,
                'fardhu_ain' => 40
            ],
        ],
        'teacher' => [
            'physical' => [
                'quran' => 30,
                'fardhu_ain' => 40
            ],
            'online' => [
                'quran' => 20,
                'fardhu_ain' => 25
            ],
        ],
    ];

    public function calculate(Request $request)
    {
        $type = $request->input('type');
        $mode = $request->input('mode');
        $category1 = $request->input('category1');
        $category2 = $request->input('category2');
        $hours = $request->input('hours');
        $total = null;
    
        if($type && $mode && $category1 && $hours) {
            $rate1 = $this->rates[$type][$mode][$category1];
            if ($category2) {
                $rate2 = $this->rates[$type][$mode][$category2];
                $total = ($rate1 + $rate2) * $hours;
            } else {
                $total = $rate1 * $hours;
            }
        }
    
        return response()->json(['total' => $total]);
    }

}
