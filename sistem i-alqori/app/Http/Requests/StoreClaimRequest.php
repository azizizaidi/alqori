<?php

namespace App\Http\Requests;

use App\Models\Claim;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClaimRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('claim_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
                 'unique:claims',
            ],
            'image' => [
                'image',
                'mimes:jpg,png,jpeg,gif,svg',
                'required',
            ],
           
            'amount' => [
                'integer',
                'required',
            ],
        ];
    }
}
