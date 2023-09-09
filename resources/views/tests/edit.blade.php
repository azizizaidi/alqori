@extends('layouts.app')

@section('title', __('test.edit'))

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        @if (request('action') == 'delete' && $test)
        @can('delete', $test)
            <div class="card">
                <div class="card-header">{{ __('test.delete') }}</div>
                <div class="card-body">
                    <label class="form-label text-primary">{{ __('test.name') }}</label>
                    <p>{{ $test->name }}</p>
                    <label class="form-label text-primary">{{ __('test.description') }}</label>
                    <p>{{ $test->description }}</p>
                    {!! $errors->first('test_id', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                </div>
                <hr style="margin:0">
                <div class="card-body text-danger">{{ __('test.delete_confirm') }}</div>
                <div class="card-footer">
                    <form method="POST" action="{{ route('tests.destroy', $test) }}" accept-charset="UTF-8" onsubmit="return confirm(&quot;{{ __('app.delete_confirm') }}&quot;)" class="del-form float-right" style="display: inline;">
                        {{ csrf_field() }} {{ method_field('delete') }}
                        <input name="test_id" type="hidden" value="{{ $test->id }}">
                        <button type="submit" class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">{{ __('app.delete_confirm_button') }}</button>
                    </form>
                    <a href="{{ route('tests.edit', $test) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                </div>
            </div>
        @endcan
        @else
        <div class="card">
            <div class="card-header">{{ __('test.edit') }}</div>
            <form method="POST" action="{{ route('tests.update', $test) }}" accept-charset="UTF-8">
                {{ csrf_field() }} {{ method_field('patch') }}
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">{{ __('test.name') }} <span class="form-required">*</span></label>
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $test->name) }}" required>
                        {!! $errors->first('name', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label for="description" class="form-label">{{ __('test.description') }}</label>
                        <textarea id="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" rows="4">{{ old('description', $test->description) }}</textarea>
                        {!! $errors->first('description', '<span class="invalid-feedback" role="alert">:message</span>') !!}
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" value="{{ __('test.update') }}" class="btn btn-success">
                    <a href="{{ route('tests.show', $test) }}" class="btn btn-link">{{ __('app.cancel') }}</a>
                    @can('delete', $test)
                        <a href="{{ route('tests.edit', [$test, 'action' => 'delete']) }}" id="del-test-{{ $test->id }}" class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800 float-right">{{ __('app.delete') }}</a>
                    @endcan
                </div>
            </form>
        </div>
    </div>
</div>
@endif
@endsection
