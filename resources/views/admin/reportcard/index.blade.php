@extends('layouts.admin')
@section('content')
@can('report_card_create')


<div class="card text-white bg-success " style="width: 18rem;">
  
  <div class="card-body">
    <h5 class="card-title">RM</h5>
    <p class="card-text">Total Allowance This Month</p>
   
  </div>
</div>


    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="{{ route('admin.report-classes.create') }}">
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
        {{ trans('cruds.reportClass.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ReportClass">
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
                            {{ trans('cruds.reportClass.fields.allowance') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                              
                            </select>
                        </td>
                     
                        <td>
                            <select class="search">
                                <option value>{{ trans('global.all') }}</option>
                                
                            </select>
                        </td>
                        
                       
                        <td>
                            <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                        </td>
                     
                        <td>
                        </td>
                    </tr>
                </thead>
                <tbody>
                   
                        <tr data-entry-id="">
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
                                @can('report_card_show')
                                    <a class="btn btn-xs btn-primary" href="">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('report_card_edit')
                                    <a class="btn btn-xs btn-info" href="">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('report_card_delete')
                                    <form action="{{ route('admin.report-classes.destroy', $reportClass->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="py-0.5 px-1.5 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-xs dark:focus:ring-offset-gray-800" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                 
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