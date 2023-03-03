@extends('layouts.admin')
@section('content')
@can('edit_allowance')
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reportClass.fields.allowance_note') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.update_allowance", [$teacher->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        
            
           
            <div class="form-group">
                <label class="required" for="allowance_note">{{ trans('cruds.reportClass.fields.allowance_note') }}</label>
                <input class="form-control {{ $errors->has('allowance_note') ? 'is-invalid' : '' }}" type="text" name="allowance_note" id="allowance_note" value="{{ old('allowance_note', $teacher->allowance_note) }}" required>
                @if($errors->has('allowance_note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('allowance_note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.allowance_note_helper') }}</span>
            </div>
        
       
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>


@endcan
@endsection