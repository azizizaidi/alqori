<?php

namespace App\Http\Requests;

use App\Models\AssignClassTeacher;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;
use App\Rules\NoNullInArray;

class StoreAssignClassTeacherRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('assign_class_teacher_create');
    }

    public function rules()
    {
        return [
            'teacher_id' => [
                'required',
                'integer',
            ],
           
            'registrar_id' => [
                'required',
                'integer',
            ],
            'assign_class_code' => [
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
