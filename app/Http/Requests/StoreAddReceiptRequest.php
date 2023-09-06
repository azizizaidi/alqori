<?php

namespace App\Http\Requests;

use App\Models\HistoryPayment;
use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAddReceiptRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('fee_create');
    }

    public function rules()
    {
        return [
            'amount_paid' => [
                'integer',
                'required',
                
            ],
            'receipt_paid' => [
                'string',
               
                'required',
            ],
           
            'paid_by_id' => [
              
                'required',
            ],
        ];
    }
}
