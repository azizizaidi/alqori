<?php

namespace App\Http\Requests;

use App\Models\AssignClassTeacher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAssignClassTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assign_class_teacher_edit');
    }

    public function rules()
    {
        return [
            'teacher_id' => [
                'required',
                'integer',
            ],
            'teacher_code' => [
                'string',
                'required',
            ],
            'student_id' => [
                'required',
                'integer',
            ],
            'student_code' => [
                'string',
                'required',
            ],
               'classes.*' => [
                'integer',
            ],
            'classes' => [
                'required',
                'array',
            ],
        ];
    }
}
