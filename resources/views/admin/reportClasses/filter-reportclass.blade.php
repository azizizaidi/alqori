@extends('layouts.admin')
@section('content')

            
<div class="form-group">
                <label class="required" for="title">{{ trans('cruds.reportClass.fields.month') }}</label>
                <select name="month" class="form-control select2" style="width: 250px">
            <option value="">-- Select month --</option>
            @foreach ($reportClasses as $report)
                <option value="{{ $report->month }}">{{ $report->month }}</option>
                @endforeach
        </select>
</div>
            <a class="btn btn-xs btn-primary" href="{{ route('admin.report-classes.getreportclass', ['report' => $report->month])  }}">
                                        {{ trans('global.view') }}
                                    </a>
                                 

@endsection