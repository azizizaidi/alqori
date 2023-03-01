<?php

namespace App\Http\Requests;

use App\Models\StdntRgstr;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyStdntRgstrRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('stdnt_rgstr_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:stdnt_rgstrs,id',
        ];
    }
}
