@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.stdntRgstr.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.stdnt-rgstrs.update", [$stdntRgstr->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="registrar_id">{{ trans('cruds.stdntRgstr.fields.registrar') }}</label>
                <select class="form-control select2 {{ $errors->has('registrar') ? 'is-invalid' : '' }}" name="registrar_id" id="registrar_id" required>
                    @foreach($registrars as $id => $entry)
                        <option value="{{ $id }}" {{ (old('registrar_id') ? old('registrar_id') : $stdntRgstr->registrar->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('registrar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('registrar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stdntRgstr.fields.registrar_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="student_id">{{ trans('cruds.stdntRgstr.fields.student') }}</label>
                <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student_id" required>
                    @foreach($students as $id => $entry)
                        <option value="{{ $id }}" {{ (old('student_id') ? old('student_id') : $stdntRgstr->student->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('student'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.stdntRgstr.fields.student_helper') }}</span>
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