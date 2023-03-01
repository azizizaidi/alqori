<?php

namespace App\Http\Requests;

use App\Models\ClassName;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyClassNameRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('class_name_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:class_names,id',
        ];
    }
}
