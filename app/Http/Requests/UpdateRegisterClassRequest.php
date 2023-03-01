<?php

namespace App\Http\Requests;

use App\Models\RegisterClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRegisterClassRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('register_class_edit');
    }

    public function rules()
    {
        return [
            'code_class' => [
                'string',
                'required',
                'unique:register_classes,code_class,' . request()->route('register_class')->id,
            ],
            'class_type_id' => [
                'required',
                'integer',
            ],
            'class_name_id' => [
                'required',
                'integer',
            ],
            'class_package_id' => [
                'required',
                'integer',
            ],
            'class_numer_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
