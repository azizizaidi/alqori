@extends('layouts.admin')
@section('content')
@can('report_class_create')


<div class="card text-white bg-primary " style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">RM{{ $reportClasses->sum('allowance') ?? '' }}</h5>
    <p class="card-text">Total Allowance This Month</p>
   
  </div>
</div>


    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.report-classes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reportClass.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'ReportClass', 'route' => 'admin.report-classes.parseCsvImport'])
        </div>
    </div>
@endcan


<div class="card">
    

    <div class="card-body">
        <div class="d-flex justify-content-center ">
        <a href="{{ route('admin.fees.create', $response->id) }}" class="btn btn-success ">Manual Transaction</a>
        <a href="{{ route('admin.toyyibpay.createBill', $response->id) }}" class="btn btn-info">Toyyibpay</a>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
   

</script>
@endsection