<?php

namespace App\Http\Requests;

use App\Models\ClassType;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClassTypeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('class_type_edit');
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
