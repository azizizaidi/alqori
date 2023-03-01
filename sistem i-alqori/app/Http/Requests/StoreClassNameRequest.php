<?php

namespace App\Http\Requests;

use App\Models\ClassName;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClassNameRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('class_name_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'feeperhour' => [
                'integer',
                'required',
            ],
            'allowanceperhour' => [
                'integer',
                'required',
            ],
        ];
    }
}
