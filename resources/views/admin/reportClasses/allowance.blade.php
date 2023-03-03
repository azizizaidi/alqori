@extends('layouts.admin')
@section('content')


@can('report_class_delete')
<div class="card">
    <div class="card-header">
      {{ trans('global.allowance') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="dtBasicExample "class=" table table-bordered table-striped table-hover datatable datatable-allowance ">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th width="10">

                        </th> 
                      
                        <th>
                            {{ trans('cruds.reportClass.fields.teacher') }}
                        </th>
                        <th>
                            {{ trans('cruds.reportClass.fields.month') }}
                        </th>
                      
                      
                                         
                        <th>
                            {{ trans('cruds.reportClass.fields.allowance') }}
                        </th>
                        <th>
                            {{'allowance note'}}
                        </th>
                            <th>
                            {{'action'}}
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
                       </td>
                      <td>
                                  
                      </td>
                         <td>
                                  
                      </td>
                     
                     
                      
                     
                      
                       
                    </tr>
                </thead>
                <tbody>
              
                
                    @foreach($teachers as $teacher)
                    
                        <tr data-entry-id="">
                           
                           <td>
                           
                          </td>
                            
                            <td>
                            {{ $teacher->id ?? '' }}
                          
                            </td>
                            <td>
                            {{ $teacher->name ?? '' }}
                            </td>
                            <td>
                            {{ $teacher->month ?? '' }}
                            </td>
                         
                            
                            <td>
                               
                           RM{{ $teacher->alw ?? '' }}
                           </td>
                           <td>
                           {{ $teacher->allowance_note ?? '' }}
                           </td>
                           <td>
                               <a class="btn btn-xs btn-info" href="{{ route('admin.edit_allowance',$teacher->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                           </td>
                        

                        </tr>
                    
                          
                  
                    @endforeach
                   
                </tbody>
            </table>
           
        </div>
    </div>
</div>

@endcan



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)


  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-allowance:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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