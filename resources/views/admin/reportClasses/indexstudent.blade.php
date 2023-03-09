@extends('layouts.admin')
@section('content')
@can('report_class_create')



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
    <div class="card-header">
        {{ trans('cruds.invoiceStudent.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ReportClass">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th width="15">
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
                            {{ trans('cruds.reportClass.fields.phone') }}
                        </th>
                     
                       
                        <th>
                            {{ trans('cruds.reportClass.fields.fee_student') }}
                        </th> <th> {{'note'}}</th>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                        &nbsp;
                        </th>
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
                              <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
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
                                {{ $reportClass->registrar->name."". $reportClass->registrar->code  ?? '' }}
                            </td>
                              <td>
                                {{ $reportClass->month ?? '' }}
                            </td>
                          
                              <td>
                                {{ $reportClass->registrar->phone ?? '' }}
                            </td>
                            <td>
                                
                                RM{{ $reportClass->fee_student ?? '' }}
                            </td>  
                    <td> {{ $reportClass->note ?? '' }}</td>        <td>
                               
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.report-classes.showinvoice', $reportClass->id) }}">
                                        {{ trans('global.viewinvoice') }}
                                    </a>

                                    @if($reportClass->status != 1)                       
                               
                                    <a class="btn btn-xs btn-danger" href="{{ route('admin.toyyibpay.createBill', $reportClass->id) }}">
                                        {{ trans('global.pay') }}
                                    </a>
                                    @endif

                                @can('status_fee')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.report-classes.edit', $reportClass->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('report_class_delete')
                                    <form action="{{ route('admin.report-classes.destroy', $reportClass->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>
                           
                            <td>
                            @if($reportClass->status == 3)
                                <button  class="btn btn-outline-danger"  disabled>fail</button>
                                @elseif($reportClass->status == 2)
                                <button  class="btn btn-outline-warning"  disabled>pending</button>
                                @elseif($reportClass->status == 1)
                                <button  class="btn btn-outline-success " disabled>paid</button>
                                @elseif($reportClass->status == 0)
                                <button  class="btn btn-outline-primary " disabled>unpaid</button>
                               
                                @endif
                        </td>

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
    className: 'btn-danger',
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
    pageLength: 100,
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
@endsection