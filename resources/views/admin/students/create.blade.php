@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.student.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.student.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ old('student_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.student_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="registrar_id">{{ trans('cruds.student.fields.registrar') }}</label>
                <select class="form-control select2 {{ $errors->has('registrar') ? 'is-invalid' : '' }}" name="registrar_id" id="registrar_id" required>
              
                @foreach($registrars as $id => $registrar)
                           <option value="{{ $id }}" >{{ $registrar }}</option>
                    @endforeach
                </select>
                @if($errors->has('registrar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('registrar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.registrar_helper') }}</span>
            </div>
        
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.student.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="age_stage">{{ trans('cruds.student.fields.age_stage') }}</label>
                <input class="form-control {{ $errors->has('age_stage') ? 'is-invalid' : '' }}" type="text" name="age_stage" id="age_stage" value="{{ old('age_stage', '') }}" required>
                @if($errors->has('age_stage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('age_stage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.age_stage_helper') }}</span>
            </div>
            <div class="form-group">
                <label  for="note">{{ trans('cruds.student.fields.notes') }}</label>
             <textarea class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}"  name="note" id="note" value="{{ old('note', '') }}">
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                 </textarea>
                 <span class="help-block">{{ trans('cruds.student.fields.note_helper') }}</span>
         
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