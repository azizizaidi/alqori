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
                            <td></td>
                            <td>{{ $reportclass->id }}</td>
                            <td>{{ optional($reportclass->teacher)->name }}</td>
        <td>{{ optional($reportclass->registrar)->name }}</td>
                            <td>{{ $reportclass->month }}</td>
                            <td>{{ $reportclass->created_at }}</td>
                            <td>{{ $reportclass->classname }}</td>
                            <td>{{ $reportclass->date }}</td>
                            <td>{{ $reportclass->total_hour }}</td>
                            <td>{{ $reportclass->classname_2 }}</td>
                            <td>{{ $reportclass->date_2 }}</td>
                            <td>{{ $reportclass->total_hour_2 }}</td>
                            <td>{{ $reportclass->allowance }}</td>
                            <td></td>
                            @can('report_class_edit')
                                <td>{{ $reportclass->note }}</td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
    {{ $reportclasses->links() }}


        @endif
    </div>
    
</div>
