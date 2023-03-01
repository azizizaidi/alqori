<?php

namespace App\Http\Requests;

use App\Models\Invoice;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreInvoiceRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('invoice_create');
    }

    public function rules()
    {
        return [
            'student' => [
                'string',
                'nullable',
            ],
            'registrar' => [
                'string',
                'nullable',
            ],
            'teacher' => [
                'string',
                'nullable',
            ],
            'class' => [
                'string',
                'nullable',
            ],
            'total_hour' => [
                'string',
                'nullable',
            ],
            'amount_fee' => [
                'string',
                'nullable',
            ],
            'date_class' => [
                'string',
                'nullable',
            ],
            'fee_perhour' => [
                'string',
                'nullable',
            ],
        ];
    }
}
