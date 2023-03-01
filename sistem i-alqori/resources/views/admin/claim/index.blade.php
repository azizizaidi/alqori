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
<div class="card">
    <div class="card-header">
        {{ trans('cruds.claim.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Claim">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.claim.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.claim.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.claim.fields.image') }}
                        </th>
                        <th>
                            {{ trans('cruds.claim.fields.amount') }}
                        </th>
                        <th>
                            {{ trans('cruds.claim.fields.created_at') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($claims as $key => $claim)
                        <tr data-entry-id="{{ $claim->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $claim->id ?? '' }}
                            </td>
                            <td>
                                {{ $claim->name ?? '' }}
                            </td>
                            <td>
                               <img src="{{ url('Image/'.$claim->image) }}"
 style="height: 100px; width: 150px;">
                            </td>
                            <td>
                               RM{{ $claim->amount ?? '' }}
                            </td>
                            <td>
                                {{ $claim->created_at ?? '' }}
                            </td>
                            <td>
                                @can('claim_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('adminclaim.show', $claim->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan


                                @can('claim_delete')
                                    <form action="{{ route('admin.claim.destroy', $claim->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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