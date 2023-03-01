<?php

namespace App\Http\Requests;

use App\Models\Debt;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDebtRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('debt_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                
            ],
            'description' => [
                'string',
               
                'required',
            ],
           
            'amount' => [
                'integer',
                'required',
            ],
        ];
    }
}
