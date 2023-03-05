@extends('layouts.admin')
@section('content')
@can('report_class_create')


<div>
<canvas id="myChart" style="width:100%;max-width:700px"></canvas>
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




<div class="card border shadow p-1" >
    <div class="card-header">
        {{ trans('cruds.reportClass.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="table "class=" table table-bordered rounded  table-striped table-hover datatable datatable-ReportClass" >
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reportClass.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reportClass.fields.teacher') }}
                        </th>
                      
                        <th>
                            {{ trans('cruds.reportClass.fields.registrar') }}
                        </th>
                        <th>
                            {{ trans('cruds.reportClass.fields.month') }}
                        </th>
                           <th>
                            {{ trans('cruds.reportClass.fields.created_at') }}
                        </th>
                         <th>
                            {{ trans('cruds.reportClass.fields.classname') }}
                        </th>
                          <th>
                            {{ trans('cruds.reportClass.fields.date') }}
                        </th>
                         <th>
                            {{ trans('cruds.reportClass.fields.total_hour') }}
                        </th>
                             <th>
                            {{ trans('cruds.reportClass.fields.classname_2') }}
                        </th>
                          <th>
                            {{ trans('cruds.reportClass.fields.date_2') }}
                        </th>
                         <th>
                            {{ trans('cruds.reportClass.fields.total_hour_2') }}
                        </th>
                      
                      
                        <th>
                            {{ trans('cruds.reportClass.fields.allowance') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                          @can('report_class_edit')
                         
                            <th> 
                              {{ trans('cruds.reportClass.fields.note') }}
                           
                            </th>
                            @endcan
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                           
                        </td>
                        <td>
                             <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                     
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                         <td>
                         <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            
                        </td>
                        <td>
                        </td>
                         <td>
                 
                        </td>
                         <td>
                 
                        </td>
                           <td>
                        </td>
                         <td>
                 
                        </td>
                         <td>
                 
                        </td>
                        <td>
                            
                        </td>
                     
                        <td>
                        </td>
                          @can('report_class_edit')
                        
                            <td>
                                
                            </td>
                            @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportClasses as $key => $reportClass)
                    
                        <tr data-entry-id="{{ $reportClass->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $reportClass->id ?? '' }}
                            </td>
                            <td>
                                {{ $reportClass->created_by->name ?? '' }}
                            </td>
                           
                            <td>
                                {{ $reportClass->registrar->name ?? '' }}&nbsp;
                                 {{ $reportClass->registrar->code ?? '' }}
                            </td>
                            <td>
                              {{ $reportClass->month ?? '' }}
                        </td>
                         <td>
                              {{ $reportClass->created_at->addHours(8) ?? '' }}
                        </td>
                         <td>
                              {{ $reportClass->class_name->name ?? '' }}
                        </td>
                          <td>
                            {{ $reportClass->date ?? '' }}
                        </td>
                            <td>
                            {{ $reportClass->total_hour ?? '' }}
                        </td>
                         <td>
                              {{ $reportClass->class_name_2->name ?? '' }}
                        </td>
                          <td>
                            {{ $reportClass->date_2 ?? '' }}
                        </td>
                            <td>
                            {{ $reportClass->total_hour_2 ?? '' }}
                        </td>
                           
                            <td>
                                RM{{$reportClass->allowance ?? '' }}
                            </td>
                            <td>
                                <!--@can('report_class_show')
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.report-classes.show', $reportClass->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan-->

                                @can('report_class_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.report-classes.edit', $reportClass->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('report_class_edit')
                                 <a class="btn btn-xs btn-primary" href="{{ route('admin.report-classes.showinvoice', $reportClass->id) }}">
                                        {{ trans('global.viewinvoice') }}
                                    </a>
                                    @endcan
                                   @can('report_class_delete')  
                                    <form action="{{ route('admin.report-classes.destroy', $reportClass->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                       
                                       <input type="submit" class="btn btn-xs btn-danger rounded" value="{{ trans('global.delete') }}">
                                    </form>
                                     
                                @endcan
                               
                            </td>
                             @can('report_class_edit')
                            
                       
                            <td>
                                 {{ $reportClass->note ?? '' }}
                            </td>
                             
                            @endcan

                        </tr>
                          
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent


<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('report_class_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.report-classes.massDestroy') }}",
    className: 'btn-danger rounded ',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-ReportClass:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})





</script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var xAllowance = ['mar22','apr22','may22','jun22','jul22','ogs22','sep22','oct22','nov22','dec22','jan23','feb23'];




var alwteachermar22 = <?php echo $reportClasses->where('month','mar2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteacherapr22 = <?php echo $reportClasses->where('month','apr2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteachermay22 = <?php echo $reportClasses->where('month','may2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteacherjun22 = <?php echo $reportClasses->where('month','june2022')->whereNull('deleted_at')->sum('allowance') ?? ''?>;
var alwteacherjul22 = <?php echo $reportClasses->where('month','jul2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteacherogs22 = <?php echo $reportClasses->where('month','ogs2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteachersep22 = <?php echo $reportClasses->where('month','sep2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteacheroct22 = <?php echo $reportClasses->where('month','oct2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteachernov22 = <?php echo $reportClasses->where('month','nov2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteacherdec22 = <?php echo $reportClasses->where('month','dec2022')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteacherjan23 = <?php echo $reportClasses->where('month','jan2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;
var alwteacherfeb23 = <?php echo $reportClasses->where('month','feb2023')->whereNull('deleted_at')->sum('allowance') ?? ''; ?>;

new Chart("myChart", {
  type: "line",
  data: {
    labels: xAllowance,
    datasets: [{
      fill: false,
      lineTension: 0,
      backgroundColor: "rgba(255, 99, 71, 1)",
      borderColor: "rgba(255, 108, 49, 0.3)",
      data: [alwteachermar22,alwteacherapr22,alwteachermay22,alwteacherjun22,alwteacherjul22,alwteacherogs22,alwteachersep22,alwteacheroct22,alwteachernov22,alwteacherdec22,alwteacherjan23,alwteacherfeb23],
      label:'Total Allowance',
    }
  ]
  },
  options: {
    maintainAspectRatio:false,
    legend: {
      display: true,
      
    },
    scales: {
      yAxes: [{ticks: {min: 0, max:6000}}],
    }
  }
});
</script>
@endsection