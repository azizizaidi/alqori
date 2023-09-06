@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.classPackage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.class-packages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="batch">{{ trans('cruds.classPackage.fields.batch') }}</label>
                <input class="form-control {{ $errors->has('batch') ? 'is-invalid' : '' }}" type="number" name="batch" id="batch" value="{{ old('batch', '') }}" required>
                @if($errors->has('batch'))
                    <div class="invalid-feedback">
                        {{ $errors->first('batch') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.classPackage.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.classPackage.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.classPackage.fields.name_helper') }}</span>
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