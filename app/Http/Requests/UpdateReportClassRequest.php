<?php

namespace App\Http\Requests;

use App\Models\ReportClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateReportClassRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('status_fee');
    }

    public function rules()
    {
        return [
             'registrar_id' => [
                'required',
               
            ],

            'fee_student' => [
                
               
            ],
           
            'date' => [
                'string',
                'required',
            ],
            'subject' => [
                'string',
               
            ],
            'month' => [
                'string',
               
            ],
            'allowance' => [
                'integer',
               
            ],
            'allowance_note' => [
                
               
            ],
            'total_hour' => [
                'required',
               
              
             
            ],
            'record_student' => [
                'string',
               
            ],
            'class_names_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
