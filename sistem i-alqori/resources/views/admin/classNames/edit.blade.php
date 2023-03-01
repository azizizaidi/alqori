@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.className.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.class-names.update", [$className->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.className.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $className->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.className.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="feeperhour">{{ trans('cruds.className.fields.feeperhour') }}</label>
                <input class="form-control {{ $errors->has('feeperhour') ? 'is-invalid' : '' }}" type="number" name="feeperhour" id="feeperhour" value="{{ old('feeperhour', $className->feeperhour) }}" required>
                @if($errors->has('feeperhour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('feeperhour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.className.fields.feeperhour_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="allowanceperhour">{{ trans('cruds.className.fields.allowanceperhour') }}</label>
                <input class="form-control {{ $errors->has('allowanceperhour') ? 'is-invalid' : '' }}" type="number" name="allowanceperhour" id="allowanceperhour" value="{{ old('allowanceperhour', $className->allowanceperhour) }}" required>
                @if($errors->has('allowanceperhour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('allowanceperhour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.className.fields.allowanceperhour_helper') }}</span>
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