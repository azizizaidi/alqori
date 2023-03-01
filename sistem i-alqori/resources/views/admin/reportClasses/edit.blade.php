@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reportClass.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.report-classes.update", [$reportClass->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
        
            
             <div class="form-group">
                <label class="required" for="registrar_id">{{ trans('cruds.reportClass.fields.registrar') }}</label>
                <select class="form-control select2 {{ $errors->has('registrar') ? 'is-invalid' : '' }}" name="registrar_id" id="registrar_id" required>
              
                @foreach($registrars as $id => $registrar)
                           <option value="{{ $id }}" {{ (old('registrar_id') ? old('registrar_id') : $reportClass->registrar->id ?? '') == $id ? 'selected' : '' }}>{{ $registrar }}</option>
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
                <label class="required" for="class_names_id">{{ trans('cruds.reportClass.fields.classname') }}</label>
                <select class="form-control select2 {{ $errors->has('classname') ? 'is-invalid' : '' }}" name="class_names_id" id="class_names_id" required>
               
                @foreach($classnames as $id => $classname)
                           <option value="{{ $id }}"{{ (old('class_names_id') ? old('class_names_id') : $reportClass->class_name->id ?? '') == $id ? 'selected' : '' }} >{{ $classname }}</option>
                    @endforeach
                </select>
                @if($errors->has('classname'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classname') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.classname_helper') }}</span>
            </div>
        
           
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.reportClass.fields.date') }}</label>
                <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $reportClass->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="total_hour">{{ trans('cruds.reportClass.fields.total_hour') }}</label>
                <input class="form-control {{ $errors->has('total_hour') ? 'is-invalid' : '' }}" type="text" name="total_hour" id="total_hour" value="{{ old('total_hour', $reportClass->total_hour) }}"  required>
                @if($errors->has('total_hour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_hour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.total_hour_helper') }}</span>
            </div>

             
           
            <div class="form-group">
                <label class="" for="class_names_id_2">{{ trans('cruds.reportClass.fields.classname_2') }}</label>
                <select class="form-control select2 {{ $errors->has('classname_2') ? 'is-invalid' : '' }}" name="class_names_id_2" id="class_names_id_2" >
               
                @foreach($classnames as $id => $classname_2)
                           <option value="{{ $id }}"{{ (old('class_names_id_2') ? old('class_names_id_2') : $reportClass->class_name_2->id ?? '') == $id ? 'selected' : '' }} >{{ $classname_2 }}</option>
                    @endforeach
                </select>
                @if($errors->has('classname_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('classname_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.classname_2_helper') }}</span>
            </div>
        
           
            <div class="form-group">
                <label class="" for="date_2">{{ trans('cruds.reportClass.fields.date_2') }}</label>
                <input class="form-control {{ $errors->has('date_2') ? 'is-invalid' : '' }}" type="text" name="date_2" id="date_2" value="{{ old('date_2', $reportClass->date_2) }}" >
                @if($errors->has('date_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.date_2_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="total_hour_2">{{ trans('cruds.reportClass.fields.total_hour_2') }}</label>
                <input class="form-control {{ $errors->has('total_hour_2') ? 'is-invalid' : '' }}" type="text" name="total_hour_2" id="total_hour_2" value="{{ old('total_hour_2', $reportClass->total_hour_2) }}">
                @if($errors->has('total_hour_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_hour_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.total_hour_2_helper') }}</span>
            </div>
             <div class="form-group">
                <label class="" for="status">{{ trans('cruds.reportClass.fields.status') }}</label>
                <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="number" name="status" id="status" value="{{ old('status', $reportClass->status) }}">
                @if($errors->has('status'))
                
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.status_helper') }}</span>
            </div>
            <p class="text-danger">0=unpaid 1=paid</p>
             <div class="form-group">
                <label class="" for="note">{{ trans('cruds.reportClass.fields.note') }}</label>
                <input class="form-control {{ $errors->has('note') ? 'is-invalid' : '' }}" type="text" name="note" id="note" value="{{ old('note', $reportClass->note) }}">
                @if($errors->has('note'))
                    <div class="invalid-feedback">
                        {{ $errors->first('note') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.note_helper') }}</span>
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