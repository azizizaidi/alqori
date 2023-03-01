@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.registrar.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.registrars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.registrar.fields.id') }}
                        </th>
                        <td>
                            {{ $registrar->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registrar.fields.code') }}
                        </th>
                        <td>
                            {{ $registrar->code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registrar.fields.phone') }}
                        </th>
                        <td>
                            {{ $registrar->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registrar.fields.address') }}
                        </th>
                        <td>
                            {{ $registrar->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registrar.fields.registrar') }}
                        </th>
                        <td>
                            {{ $registrar->registrar->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.registrars.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection