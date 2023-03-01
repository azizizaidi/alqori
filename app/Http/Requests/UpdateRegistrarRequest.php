<?php

namespace App\Http\Requests;

use App\Models\Registrar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateRegistrarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('registrar_edit');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:registrars,code,' . request()->route('registrar')->id,
            ],
            'phone' => [
                'string',
                'required',
            ],
            'registrar_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
