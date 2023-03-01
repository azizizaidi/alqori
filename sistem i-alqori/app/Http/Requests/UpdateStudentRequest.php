<?php

namespace App\Http\Requests;

use App\Models\Student;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStudentRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('student_edit');
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
                'unique:students,code,' . request()->route('student')->id,
            ],
            'age_stage' => [
                'string',
                'required',
            ],
        ];
    }
}
