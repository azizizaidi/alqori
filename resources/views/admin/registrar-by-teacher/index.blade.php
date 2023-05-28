@extends('layouts.admin')
@section('content')
@can('claim_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.claim.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.claim.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card border shadow p-1">
    <div class="card-header">
        {{ trans('cruds.registrarbyteacher.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
        <table id="table" class="table table-bordered rounded table-striped table-hover datatable datatable-ReportClass">
    <thead>
        <tr>
            
            <th>{{ trans('cruds.registrarbyteacher.fields.id') }}</th>
            <th>{{ trans('cruds.registrarbyteacher.fields.registrar') }}</th>
            <th>{{ trans('cruds.registrarbyteacher.fields.classname') }}</th>
            <th>{{ trans('cruds.registrarbyteacher.fields.allowanceperhour') }}</th>
            <th>{{ trans('cruds.registrarbyteacher.fields.total_hour') }}</th>
            <th>{{ trans('cruds.registrarbyteacher.fields.total_allowance') }}</th>
           
          
        </tr>
        <tr>
            
            <td>
            </td>
            <td>
                <input class="search" type="text" placeholder="{{ trans('global.search') }}">
            </td>
            <td>
                <input class="search" type="text" placeholder="{{ trans('global.search') }}">
            </td>
            <td></td>
            <td></td>
            <td></td>
          
        
        </tr>
    </thead>
    <tbody>
        @php
        $totalAllowanceSum = 0;
        @endphp
        @foreach($registrars as $key => $registrar)
        <tr data-entry-id="{{ $registrar->id }}">
          
            <td>{{ $registrar->id ?? '' }}</td>
            <td>
                {{ $registrar->registrar->name ?? '' }}&nbsp; {{ $registrar->registrar->code ?? '' }}
            </td>
            <td style="display: flex; justify-content: right;">
                <table style="text-align: center;">
                    @foreach($registrar->classes as $class)
                    <tr>
                        <td>{{ $class->name }}</td>
                    </tr>
                    @endforeach
                </table>
            </td>
            <td>
                <table>
                    @foreach($registrar->classes as $class)
                    <tr>
                        <td>RM{{ $class->allowanceperhour }}</td>
                    </tr>
                    @endforeach
                </table>
            </td>
            <td style="display: flex; justify-content: center;">
                <table>
                    @foreach($registrar->classes as $class)
                    @foreach($registrar->classpackage as $classpackage)
                    <tr>
                        <td>
                            @if(str_contains($classpackage->name, 'COMBO'))
                            {{ $classpackage->total_hour / 2 }}
                            @else
                            {{ $classpackage->total_hour }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                </table>
            </td>
            <td>
                <table>
                    @php
                    $totalAllowance = 0;
                    @endphp
                    @foreach($registrar->classes as $class)
                    @foreach($registrar->classpackage as $classpackage)
                    <tr>
                        <td>
                            @if(str_contains($classpackage->name, 'COMBO'))
                            @php
                            $allowance = $classpackage->total_hour / 2 * $class->allowanceperhour;
                                $totalAllowance += $allowance;
                                @endphp
                            @else
                                @php
                                $allowance = $classpackage->total_hour * $class->allowanceperhour;
                                $totalAllowance += $allowance;
                                @endphp
                            @endif
                            RM{{ $allowance }}
                        </td>
                    </tr>
                    @endforeach
                    @endforeach
                    <!--<tr>
                        <p>Total Allowance: RM{{ $totalAllowance }}</p>
                    </tr>-->
                </table>
            </td>
          
        </tr>

        @php
        $totalAllowanceSum += $totalAllowance;
        @endphp
        @endforeach
        <tr>
            <td colspan="5" align="right"><strong>Sum of Total Allowance: </strong></td>
            <td colspan="5" align="left"><strong> RM{{ $totalAllowanceSum }}</strong></td>
        </tr>
    </tbody>
</table>



</div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('user_alert_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.user-alerts.massDestroy') }}",
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
  let table = $('.datatable-UserAlert:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection