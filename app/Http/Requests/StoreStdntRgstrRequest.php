<?php

namespace App\Http\Requests;

use App\Models\StdntRgstr;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStdntRgstrRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('stdnt_rgstr_create');
    }

    public function rules()
    {
        return [
            'registrar_id' => [
                'required',
                'integer',
            ],
            'student_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
