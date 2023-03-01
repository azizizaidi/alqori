@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.fee.title') }}
    </div>

    <div class="card-body">

    <img src="{{ asset('vendor/invoices/akaunbank.jpeg') }}" class="img-thumbnail rounded mx-auto d-block" style="height:250px"alt="...">
    </br>
    <div class="alert alert-warning text-center" role="alert">

  ADD THIS REFERENCE:<b href="#" class="alert-link">BQ143JAN22</b>
</div>
    <form method="POST" action="{{ route("admin.report-classes.store") }}" enctype="multipart/form-data">
            @csrf
            
              <div class="form-group">
                <label class="required" for="registrar_id">{{ trans('cruds.feepay.fields.payer') }}</label>
                <select class="form-control select2 {{ $errors->has('registrar') ? 'is-invalid' : '' }}" name="registrar_id" id="registrar_id" required>
              
               
                </select>
               
                <span class="help-block">{{ trans('cruds.feepay.fields.payer_helper') }}</span>
            </div>

          
          
        
           
           
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.feepay.fields.image') }}</label>
                <input class="form-control {{ $errors->has('image') ? 'is-invalid' : '' }}" type="file" name="image" id="image" value="{{ old('image', '') }}"  required>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.total_hour_helper') }}</span>
            </div>

             
           
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.submit') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection