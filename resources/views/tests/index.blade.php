@extends('layouts.app')

@section('title', __('test.list'))

@section('content')
<div class="mb-3">
    <div class="float-right">
        @can('create', new App\Models\Test)
            <a href="{{ route('tests.create') }}" class="btn btn-success">{{ __('test.create') }}</a>
        @endcan
    </div>
    <h1 class="page-title">{{ __('test.list') }} <small>{{ __('app.total') }} : {{ $tests->total() }} {{ __('test.test') }}</small></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <form method="GET" action="" accept-charset="UTF-8" class="form-inline">
                    <div class="form-group">
                        <label for="q" class="form-label">{{ __('test.search') }}</label>
                        <input placeholder="{{ __('test.search_text') }}" name="q" type="text" id="q" class="form-control mx-sm-2" value="{{ request('q') }}">
                    </div>
                    <input type="submit" value="{{ __('test.search') }}" class="btn btn-secondary">
                    <a href="{{ route('tests.index') }}" class="btn btn-link">{{ __('app.reset') }}</a>
                </form>
            </div>
            <table class="table table-sm table-responsive-sm table-hover">
                <thead>
                    <tr>
                        <th class="text-center">{{ __('app.table_no') }}</th>
                        <th>{{ __('test.name') }}</th>
                        <th>{{ __('test.description') }}</th>
                        <th class="text-center">{{ __('app.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $key => $test)
                    <tr>
                        <td class="text-center">{{ $tests->firstItem() + $key }}</td>
                        <td>{!! $test->name_link !!}</td>
                        <td>{{ $test->description }}</td>
                        <td class="text-center">
                            @can('view', $test)
                                <a href="{{ route('tests.show', $test) }}" id="show-test-{{ $test->id }}">{{ __('app.show') }}</a>
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="card-body">{{ $tests->appends(Request::except('page'))->render() }}</div>
        </div>
    </div>
</div>
@endsection
