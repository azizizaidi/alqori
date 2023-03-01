<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_create');
    }

    public function rules()
    {
        return [
            'student_id' => [
                'required',
                'integer',
            ],
            'code' => [
                'string',
                'required',
                'unique:students',
            ],
            'age_stage' => [
                'string',
                'required',
            ],
            'note' => [
                
                
            ],
        ];
    }
}
