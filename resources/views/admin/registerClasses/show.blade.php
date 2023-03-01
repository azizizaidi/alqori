@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.registerClass.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.register-classes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.registerClass.fields.id') }}
                        </th>
                        <td>
                            {{ $registerClass->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registerClass.fields.code_class') }}
                        </th>
                        <td>
                            {{ $registerClass->code_class }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registerClass.fields.class_type') }}
                        </th>
                        <td>
                            {{ $registerClass->class_type->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registerClass.fields.class_name') }}
                        </th>
                        <td>
                            {{ $registerClass->class_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registerClass.fields.class_package') }}
                        </th>
                        <td>
                            {{ $registerClass->class_package->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.registerClass.fields.class_numer') }}
                        </th>
                        <td>
                            {{ $registerClass->class_numer->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.register-classes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection