<div>
    <select wire:model="month">
        <option value="">Select a month</option>
        <!-- You may want to dynamically generate these options -->
        @foreach($months as $month)
            <option value="{{ $month }}">{{ $month }}</option>
        @endforeach
        <!-- and so on -->
    </select>
    <div wire:loading wire:target="selectedMonth">
        Loading...
    </div>

    <div wire:loading.remove>
    @if ($selectedMonth)

    <button wire:click="selectAll" class="btn btn-primary">Select All</button>
    <button wire:click="downloadCSV" class="btn btn-success">Download CSV</button>

            <table id="data" class="table table-bordered rounded table-striped table-hover">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.reportClass.fields.id') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.teacher') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.registrar') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.month') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.created_at') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.classname') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.date') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.total_hour') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.classname_2') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.date_2') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.total_hour_2') }}</th>
                        <th>{{ trans('cruds.reportClass.fields.allowance') }}</th>
                        <th>&nbsp;</th>
                        @can('report_class_edit')
                            <th>{{ trans('cruds.reportClass.fields.note') }}</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportclasses as $reportclass)
                        <tr>
                            <td><input type="checkbox" wire:model="selectedItems" value="{{ $reportclass->id }}"></td>
                            <td>{{ $reportclass->id }}</td>
                            <td>{{ optional($reportclass->created_by)->name }}</td>
                            <td>{{ optional($reportclass->registrar)->name }}</td>
                            <td>{{ $reportclass->month }}</td>
                            <td>{{ $reportclass->created_at }}</td>
                            <td>{{ optional($reportclass->class_name)->name }}</td>
                            <td>{{ $reportclass->date }}</td>
                            <td>{{ $reportclass->total_hour }}</td>
                            <td>{{ optional($reportclass->class_name_2)->name }}</td>
                            <td>{{ $reportclass->date_2 }}</td>
                            <td>{{ $reportclass->total_hour_2 }}</td>
                            <td>{{ $reportclass->allowance }}</td>
                            <td></td>
                            @can('report_class_edit')
                                <td>{{ $reportclass->note }}</td>
                            @endcan
                            @can('report_class_delete')
                            <td>
                               <button wire:click="confirmDelete({{ $reportclass->id }})" class="btn btn-danger">Delete</button>
                            </td>
                                @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if($confirmingDelete)
    <div class="modal fade show" tabindex="-1" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirm Delete</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" wire:click="cancelDelete">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this record?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" wire:click="cancelDelete">Cancel</button>
                    <button type="button" class="btn btn-danger" wire:click="delete">Delete</button>
                </div>
            </div>
        </div>
    </div>
@endif
            
    {{ $reportclasses->links() }}


        @endif
    </div>
    
</div>
