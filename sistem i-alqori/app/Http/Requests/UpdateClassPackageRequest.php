<?php

namespace App\Http\Requests;

use App\Models\ClassPackage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateClassPackageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('class_package_edit');
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
