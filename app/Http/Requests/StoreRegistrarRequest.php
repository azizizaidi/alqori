<?php

namespace App\Http\Requests;

use App\Models\Registrar;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreRegistrarRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('registrar_create');
    }

    public function rules()
    {
        return [
            'code' => [
                'string',
                'required',
                'unique:registrars',
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
