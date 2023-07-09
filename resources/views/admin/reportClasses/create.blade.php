@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.reportClass.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.report-classes.store") }}" enctype="multipart/form-data">
            @csrf
            
           
           <!-- <div class="form-group">
          
                <label class="required" for="month-input">{{ trans('cruds.reportClass.fields.month') }}</label>
                <input type="month" id="month" name="month" onchange="formatMonth()"
       min="2023-05" max="2023-05" required/>
                @if($errors->has('month'))
                    <div class="invalid-feedback">
                        {{ $errors->first('month') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.month_helper') }}</span>
            </div>-->


            <div class="form-group">
                <label class="required" for="registrar_id">{{ trans('cruds.reportClass.fields.registrar') }}</label>
                <select class="form-control select2" name="registrar_id"  required>
                <option value="">Select Class </option>
                @foreach($registrars as $key => $value)
                         <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
              
                </select>
              
            </div>

            <div class="form-group">
                <label class="required" for="class_names">{{ trans('cruds.reportClass.fields.classname') }}</label>
              
                <select name="class_names_id" class="form-control select2"style="width:250px">
                <option value="">Select Class </option>
              
              
                 
                </select>
            </div>
            
           
           
           
           
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.reportClass.fields.date') }}</label>
              
                <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', '') }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.date_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="total_hour">{{ trans('cruds.reportClass.fields.total_hour') }}</label>
               
                <select class="form-control select2 {{ $errors->has('total_hour') ? 'is-invalid' : '' }}" name="total_hour" id="total_hour" required>
               
               <option value="" >Please select</option>

               <option value="0" >{{ 0 }}</option>
               <option value="0.5" >{{ 0.5 }}</option>
               <option value="1" >{{ 1 }}</option>
                <option value="1.5" >{{ 1.5 }}</option>
                <option value="2" >{{ 2 }}</option>
                <option value="2.5" >{{ 2.5 }}</option>
                <option value="3" >{{ 3 }}</option>
                <option value="3.5" >{{ 3.5 }}</option>
                <option value="4" >{{ 4 }}</option>
                <option value="4.5" >{{ 4.5 }}</option>
                <option value="5" >{{ 5 }}</option>
                <option value="5.5" >{{ 5.5 }}</option>
                <option value="6" >{{ 6 }}</option>
                <option value="6.5" >{{ 6.5 }}</option>
                <option value="7" >{{ 7 }}</option>
                <option value="7.5" >{{ 7.5 }}</option>
                <option value="8" >{{ 8 }}</option>
                <option value="8.5" >{{ 8.5 }}</option>
                <option value="9" >{{ 9 }}</option>
                <option value="9.5" >{{ 9.5 }}</option>
                <option value="10" >{{ 10 }}</option>
                <option value="10.5" >{{ 10.5 }}</option>
                <option value="11" >{{ 11 }}</option>
                <option value="11.5" >{{ 11.5 }}</option>
                <option value="12" >{{ 12 }}</option>
                 <option value="12.5" >{{ 12.5 }}</option>
                <option value="13" >{{ 13 }}</option>
                <option value="13.5" >{{ 13.5 }}</option>
                <option value="14" >{{ 14 }}</option>
                <option value="14.5" >{{ 14.5 }}</option>
                <option value="15" >{{ 15 }}</option>

               
        
                 </select>
                @if($errors->has('total_hour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_hour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.total_hour_helper') }}</span>
            </div>

           


            <div class="form-group">
                <label class="" for="class_names_2">{{ trans('cruds.reportClass.fields.classname_2') }}</label>
                 
               <select name="class_names_id_2" class="form-control select2"style="width:250px">
               <option value="">Select Class </option>
               
                
                </select>
            </div>
                  
        
           
            <div class="form-group">
                <label class="" for="date_2">{{ trans('cruds.reportClass.fields.date_2') }}</label>
               
                <input class="form-control {{ $errors->has('date_2') ? 'is-invalid' : '' }}" type="text" name="date_2" id="date_2" value="{{ old('date_2', '') }}" >
                @if($errors->has('date_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="" for="total_hour_2">{{ trans('cruds.reportClass.fields.total_hour_2') }}</label>
        
                <select class="form-control select2{{ $errors->has('total_hour_2') ? 'is-invalid' : '' }}" name="total_hour_2" id="total_hour_2" >
               
               <option value="" >Please select</option>

              <option value="0" >{{ 0 }}</option>
               <option value="0.5" >{{ 0.5 }}</option>
               <option value="1" >{{ 1 }}</option>
                <option value="1.5" >{{ 1.5 }}</option>
                <option value="2" >{{ 2 }}</option>
                <option value="2.5" >{{ 2.5 }}</option>
                <option value="3" >{{ 3 }}</option>
                <option value="3.5" >{{ 3.5 }}</option>
                <option value="4" >{{ 4 }}</option>
                <option value="4.5" >{{ 4.5 }}</option>
                <option value="5" >{{ 5 }}</option>
                <option value="5.5" >{{ 5.5 }}</option>
                <option value="6" >{{ 6 }}</option>
                <option value="6.5" >{{ 6.5 }}</option>
                <option value="7" >{{ 7 }}</option>
                <option value="7.5" >{{ 7.5 }}</option>
                <option value="8" >{{ 8 }}</option>
                <option value="8.5" >{{ 8.5 }}</option>
                <option value="9" >{{ 9 }}</option>
                <option value="9.5" >{{ 9.5 }}</option>
                <option value="10" >{{ 10 }}</option>
                <option value="10.5" >{{ 10.5 }}</option>
                <option value="11" >{{ 11 }}</option>
                <option value="11.5" >{{ 11.5 }}</option>
                <option value="12" >{{ 12 }}</option>
                <option value="12.5" >{{ 12.5 }}</option>
                <option value="13" >{{ 13 }}</option>
                <option value="13.5" >{{ 13.5 }}</option>
                <option value="14" >{{ 14 }}</option>
                <option value="14.5" >{{ 14.5 }}</option>
                <option value="15" >{{ 15 }}</option>


               
        
                 </select>
                @if($errors->has('total_hour_2'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_hour_2') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reportClass.fields.total_hour_2_helper') }}</span>
            </div>


         
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



   <!-- <script type="text/javascript">
    jQuery(document).ready(function () {
    
        jQuery('select[name="class_names_id"]').on('change', function () {
            var classnameID = jQuery(this).val();
            if (classnameID) {
                jQuery.ajax({
                    url: '/admin/report-classes/getregistrar/' + classnameID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        jQuery('select[name="registrar_id"]').empty();
                        jQuery.each(data, function (key, value) {
                            $('select[name="registrar_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                });

                   
            } else {
                $('select[name="registrar_id"]').empty();
            }
        });
        
    });
</script>-->

<script type="text/javascript">
    jQuery(document).ready(function () {

        var baseUrl = window.location.origin;
        var apiUrl = baseUrl + '/admin/report-classes/getclass/';
        var apiUrl2 = baseUrl + '/admin/report-classes/getclass_2/';

        // Check if the web server environment uses '/public' path
        var isPublicPath = baseUrl.includes(':8000') ? false : true;

        if (isPublicPath) {
            apiUrl = baseUrl + '/public/admin/report-classes/getclass/';
            apiUrl2 = baseUrl + '/public/admin/report-classes/getclass_2/';
        }

    
    jQuery('select[name="registrar_id"]').on('change', function () {
        var registrarID = jQuery(this).val();
        if (registrarID) {
            jQuery.ajax({
                url: apiUrl + registrarID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('select[name="class_names_id"]').empty();
                    jQuery.each(data, function (key, value) {
                        $('select[name="class_names_id"]').append('<option value="' + key + '">' + value + '</option>');
                        
                    });
                    if ($('select[name="class_names_id"] option').length > 1) {
                        $('select[name="class_names_id"] option:last').remove();
                    } 
                }
            });
               
        } else {
            $('select[name="class_names_id"]').empty();
        }
    });

    jQuery('select[name="registrar_id"]').on('change', function () {
        var registrarID = jQuery(this).val();
        if (registrarID) {
            jQuery.ajax({
                url: apiUrl2 + registrarID,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                    jQuery('select[name="class_names_id_2"]').empty();
                    jQuery.each(data, function (key, value) {
                        $('select[name="class_names_id_2"]').append('<option value="' + key + '">' + value + '</option>');
                    });
                    if ($('select[name="class_names_id_2"] option').length <= 1) {
                        $('select[name="class_names_id_2"]').empty().parent().hide();
                        $('input[name="date_2"]').empty().parent().hide();
                        $('select[name="total_hour_2"]').empty().parent().hide();
                   
                    } else {
                        $('select[name="class_names_id_2"]').parent().show();
                        $('select[name="class_names_id_2"] option:first').remove();
                        $('input[name="date_2"]').parent().show();
                        $('select[name="total_hour_2"]').parent().show();
                     
                    }
                }
            });   
        } else {
            $('select[name="class_names_id_2"]').empty().parent().hide();
            $('input[name="date_2"]').empty().parent().hide();
            $('select[name="total_hour_2"]').empty().parent().hide();
          
        }
    });
    
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
      flatpickr('#date', {
    mode: "multiple",
    dateFormat: "d-m-Y",
    
});
    });
    document.addEventListener('DOMContentLoaded', function() {
      flatpickr('#date_2', {
    mode: "multiple",
    dateFormat: "d-m-Y"
});
    });
  </script>

   <script>
    function formatMonth() {
      var monthInput = document.getElementById('month-input');
      var value = monthInput.value;
      var formattedValue = value.split('-').reverse().join('-');
      monthInput.value = formattedValue;
    }
  </script>



@endsection