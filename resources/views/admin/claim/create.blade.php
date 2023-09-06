@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.claim.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.claim.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.claim.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.claim.fields.name_helper') }}</span>
            </div>
             <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.claim.fields.image') }}</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" id="image" value="{{ old('image', '') }}" required>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.claim.fields.image_helper') }}</span>
            </div>
             <div class="form-group">
                <label class="required" for="amount">{{ trans('cruds.claim.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" name="amount" id="amount" min="0.00" max="10000.00" step="0.01" value="{{ old('amount', '') }}" required>
                @if($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.claim.fields.amount_helper') }}</span>
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