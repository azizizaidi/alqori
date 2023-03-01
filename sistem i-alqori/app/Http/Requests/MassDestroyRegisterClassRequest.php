<?php

namespace App\Http\Requests;

use App\Models\RegisterClass;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyRegisterClassRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('register_class_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:register_classes,id',
        ];
    }
}
