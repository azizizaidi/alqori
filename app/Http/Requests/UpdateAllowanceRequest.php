<?php

namespace App\Http\Requests;

use App\Models\ReportClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAllowanceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('edit_allowance');
    }

    public function rules()
    {
        return [
            'allowance_note' => [
                'string',
                'required',
               
            ],
         ];
    }
}
