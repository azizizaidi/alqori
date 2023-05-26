<?php

namespace App\Http\Requests;

use App\Models\AssignClassTeacher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use App\Rules\NoNullInArray;

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
            'registrar_id' => [
                'required',
                'integer',
            ],
            'student_code' => [
                'string',
                'required',
            ],
           
            'classes' => [
                'required',
                'array',
                new NoNullInArray,
               
            ],
            'classpackage' => [
                'required',
                'array',
                new NoNullInArray,
               
            ],
        ];
    }
}
