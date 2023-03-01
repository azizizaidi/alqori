<?php

namespace App\Http\Requests;

use App\Models\ClassPackage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreClassPackageRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('class_package_create');
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
