@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.assignClassTeacher.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assign-class-teachers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.assignClassTeacher.fields.id') }}
                        </th>
                        <td>
                            {{ $assignClassTeacher->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignClassTeacher.fields.teacher') }}
                        </th>
                        <td>
                            {{ $assignClassTeacher->teacher->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignClassTeacher.fields.teacher_code') }}
                        </th>
                        <td>
                            {{ $assignClassTeacher->teacher_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignClassTeacher.fields.student') }}
                        </th>
                        <td>
                            {{ $assignClassTeacher->student->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignClassTeacher.fields.student_code') }}
                        </th>
                        <td>
                            {{ $assignClassTeacher->student_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.assignClassTeacher.fields.class') }}
                        </th>
                        <td>
                            {{ $assignClassTeacher->class->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.assign-class-teachers.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection