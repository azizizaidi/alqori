@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.assignClassTeacher.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.assign-class-teachers.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="teacher_id">{{ trans('cruds.assignClassTeacher.fields.teacher') }}</label>
                <select class="form-control select2 {{ $errors->has('teacher') ? 'is-invalid' : '' }}" name="teacher_id" id="teacher_id" required>
                    @foreach($teachers as $id => $entry)
                        <option value="{{ $id }}" {{ old('teacher_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                <label class="required" for="registrar_id">{{ trans('cruds.assignClassTeacher.fields.registrar') }}</label>
                <select class="form-control select2 {{ $errors->has('registrar') ? 'is-invalid' : '' }}" name="registrar_id" id="registrar_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ old('registrar_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('registrar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('registrar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="assign_class_code">{{ trans('cruds.assignClassTeacher.fields.assign_class_code') }}</label>
                <input class="form-control {{ $errors->has('assign_class_code') ? 'is-invalid' : '' }}" type="text" name="assign_class_code" id="assign_class_code" value="{{ old('assign_class_code', '') }}" required>
                @if($errors->has('assign_class_code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('assign_class_code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.assign_class_code_helper') }}</span>
            </div>
            
            
            <div class="form-group">
                <label class="required" for="classes">{{ trans('cruds.assignClassTeacher.fields.class') }}</label>
                <select class="form-control select2 {{ $errors->has('classes') ? 'is-invalid' : '' }}" name="classes[]" id="classes" multiple required>
                    @foreach($classes as $id => $entry)
                        <option value="{{ $id }}" {{ in_array($id, old('classes', [])) ? 'selected' : '' }}>{{ $entry }}</option>
                      
                    @endforeach
                </select>
                @if($errors->has('classes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.class_helper') }}</span>
            </div>

              
            <div class="form-group">
                <label class="required" for="classpackage">{{ trans('cruds.assignClassTeacher.fields.classpackage') }}</label>
                <select class="form-control select2 {{ $errors->has('classpackage') ? 'is-invalid' : '' }}" name="classpackage[]" id="classpackage" required>
                    @foreach($classpackage as $id => $entry)
                        <option value="{{ $id }}" {{ in_array($id, old('classpackage', [])) ? 'selected' : '' }}>{{ $entry }}</option>
                      
                    @endforeach
                </select>
                @if($errors->has('classpackage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classpackage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.assignClassTeacher.fields.classpackage_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection