@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reportClass.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        
            
             <div class="form-group">
                <label class="required" for="registrar_id">{{ trans('cruds.reportClass.fields.registrar') }}</label>
                <select class="form-control select2 {{ $errors->has('registrar_id') ? 'is-invalid' : '' }}" name="registrar_id" id="registrar_id" required>
              
                @foreach($teacher as $id => $teach)
                           <option value="{{ $id }}" {{ (old('registrar_id') ? old('registrar_id') : $teach->id ?? '') == $id ? 'selected' : '' }}>{{ $teach->date }}</option>
                    @endforeach
                </select>
                @if($errors->has('registrar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('registrar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.registrar_helper') }}</span>
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