<?php

namespace App\Http\Requests;

use App\Models\ClassNumber;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClassNumberRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('class_number_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
        ];
    }
}
