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
                <button class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" type="submit">
                    {{ trans('global.submit') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection