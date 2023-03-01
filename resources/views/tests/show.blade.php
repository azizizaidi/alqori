@extends('layouts.app')

@section('title', __('test.detail'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('test.detail') }}</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>{{ __('test.name') }}</td><td>{{ $test->name }}</td></tr>
                        <tr><td>{{ __('test.description') }}</td><td>{{ $test->description }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                @can('update', $test)
                    <a href="{{ route('tests.edit', $test) }}" id="edit-test-{{ $test->id }}" class="btn btn-warning">{{ __('test.edit') }}</a>
                @endcan
                <a href="{{ route('tests.index') }}" class="btn btn-link">{{ __('test.back_to_index') }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
