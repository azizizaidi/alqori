@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.registerClass.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.register-classes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code_class">{{ trans('cruds.registerClass.fields.code_class') }}</label>
                <input class="form-control {{ $errors->has('code_class') ? 'is-invalid' : '' }}" type="text" name="code_class" id="code_class" value="{{ old('code_class', '') }}" required>
                @if($errors->has('code_class'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_class') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.registerClass.fields.code_class_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="class_type_id">{{ trans('cruds.registerClass.fields.class_type') }}</label>
                <select class="form-control select2 {{ $errors->has('class_type') ? 'is-invalid' : '' }}" name="class_type_id" id="class_type_id" required>
                    @foreach($class_types as $id => $entry)
                        <option value="{{ $id }}" {{ old('class_type_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('class_type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.registerClass.fields.class_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="class_name_id">{{ trans('cruds.registerClass.fields.class_name') }}</label>
                <select class="form-control select2 {{ $errors->has('class_name') ? 'is-invalid' : '' }}" name="class_name_id" id="class_name_id" required>
                    @foreach($class_names as $id => $entry)
                        <option value="{{ $id }}" {{ old('class_name_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('class_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.registerClass.fields.class_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="class_package_id">{{ trans('cruds.registerClass.fields.class_package') }}</label>
                <select class="form-control select2 {{ $errors->has('class_package') ? 'is-invalid' : '' }}" name="class_package_id" id="class_package_id" required>
                    @foreach($class_packages as $id => $entry)
                        <option value="{{ $id }}" {{ old('class_package_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('class_package'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_package') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.registerClass.fields.class_package_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="class_numer_id">{{ trans('cruds.registerClass.fields.class_numer') }}</label>
                <select class="form-control select2 {{ $errors->has('class_numer') ? 'is-invalid' : '' }}" name="class_numer_id" id="class_numer_id" required>
                    @foreach($class_numers as $id => $entry)
                        <option value="{{ $id }}" {{ old('class_numer_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('class_numer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class_numer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.registerClass.fields.class_numer_helper') }}</span>
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