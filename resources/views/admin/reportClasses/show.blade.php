@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reportClass.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.report-classes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reportClass.fields.id') }}
                        </th>
                        <td>
                            {{ $reportClass->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportClass.fields.teacher') }}
                        </th>
                        <td>
                            {{ $reportClass->created_by->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportClass.fields.registrar') }}
                        </th>
                        <td>
                            {{ $reportClass->registrar->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportClass.fields.date') }}
                        </th>
                        <td>
                            {{ $reportClass->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reportClass.fields.total_hour') }}
                        </th>
                        <td>
                            {{ $reportClass->total_hour }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.report-classes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection