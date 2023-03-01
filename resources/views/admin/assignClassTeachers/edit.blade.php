@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.assignClassTeacher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assign-class-teachers.update", [$assignClassTeacher->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="teacher_id">{{ trans('cruds.assignClassTeacher.fields.teacher') }}</label>
                <select class="form-control select2 {{ $errors->has('teacher') ? 'is-invalid' : '' }}" name="teacher_id" id="teacher_id" required>
                    @foreach($teachers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('teacher_id') ? old('teacher_id') : $assignClassTeacher->teacher->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('teacher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('teacher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.teacher_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="teacher_code">{{ trans('cruds.assignClassTeacher.fields.teacher_code') }}</label>
                <input class="form-control {{ $errors->has('teacher_code') ? 'is-invalid' : '' }}" type="text" name="teacher_code" id="teacher_code" value="{{ old('teacher_code', $assignClassTeacher->teacher_code) }}" required>
                @if($errors->has('teacher_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('teacher_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.teacher_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.assignClassTeacher.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $assignClassTeacher->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_code">{{ trans('cruds.assignClassTeacher.fields.student_code') }}</label>
                <input class="form-control {{ $errors->has('student_code') ? 'is-invalid' : '' }}" type="text" name="student_code" id="student_code" value="{{ old('student_code', $assignClassTeacher->student_code) }}" required>
                @if($errors->has('student_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.student_code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="class_id">{{ trans('cruds.assignClassTeacher.fields.class') }}</label>
                <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="class_id" id="class_id" required>
                    @foreach($classes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('class_id') ? old('class_id') : $assignClassTeacher->class->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('class'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.class_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection