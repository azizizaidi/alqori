@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.stdntRgstr.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stdnt-rgstrs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.stdntRgstr.fields.id') }}
                        </th>
                        <td>
                            {{ $stdntRgstr->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stdntRgstr.fields.registrar') }}
                        </th>
                        <td>
                            {{ $stdntRgstr->registrar->code ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.stdntRgstr.fields.student') }}
                        </th>
                        <td>
                            {{ $stdntRgstr->student->code ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.stdnt-rgstrs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection