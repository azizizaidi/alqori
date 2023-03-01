<?php

namespace App\Http\Requests;

use App\Models\ClassPackage;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClassPackageRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('class_package_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:class_packages,id',
        ];
    }
}
