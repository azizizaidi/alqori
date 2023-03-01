@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.invoice.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.invoices.update", [$invoice->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="student">{{ trans('cruds.invoice.fields.student') }}</label>
                <input class="form-control {{ $errors->has('student') ? 'is-invalid' : '' }}" type="text" name="student" id="student" value="{{ old('student', $invoice->student) }}">
                @if($errors->has('student'))
                    <div class="invalid-feedback">
                        {{ $errors->first('student') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.student_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="registrar">{{ trans('cruds.invoice.fields.registrar') }}</label>
                <input class="form-control {{ $errors->has('registrar') ? 'is-invalid' : '' }}" type="text" name="registrar" id="registrar" value="{{ old('registrar', $invoice->registrar) }}">
                @if($errors->has('registrar'))
                    <div class="invalid-feedback">
                        {{ $errors->first('registrar') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.registrar_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="teacher">{{ trans('cruds.invoice.fields.teacher') }}</label>
                <input class="form-control {{ $errors->has('teacher') ? 'is-invalid' : '' }}" type="text" name="teacher" id="teacher" value="{{ old('teacher', $invoice->teacher) }}">
                @if($errors->has('teacher'))
                    <div class="invalid-feedback">
                        {{ $errors->first('teacher') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.teacher_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="class">{{ trans('cruds.invoice.fields.class') }}</label>
                <input class="form-control {{ $errors->has('class') ? 'is-invalid' : '' }}" type="text" name="class" id="class" value="{{ old('class', $invoice->class) }}">
                @if($errors->has('class'))
                    <div class="invalid-feedback">
                        {{ $errors->first('class') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.class_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="total_hour">{{ trans('cruds.invoice.fields.total_hour') }}</label>
                <input class="form-control {{ $errors->has('total_hour') ? 'is-invalid' : '' }}" type="text" name="total_hour" id="total_hour" value="{{ old('total_hour', $invoice->total_hour) }}">
                @if($errors->has('total_hour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('total_hour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.total_hour_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="amount_fee">{{ trans('cruds.invoice.fields.amount_fee') }}</label>
                <input class="form-control {{ $errors->has('amount_fee') ? 'is-invalid' : '' }}" type="text" name="amount_fee" id="amount_fee" value="{{ old('amount_fee', $invoice->amount_fee) }}">
                @if($errors->has('amount_fee'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_fee') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.amount_fee_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="date_class">{{ trans('cruds.invoice.fields.date_class') }}</label>
                <input class="form-control {{ $errors->has('date_class') ? 'is-invalid' : '' }}" type="text" name="date_class" id="date_class" value="{{ old('date_class', $invoice->date_class) }}">
                @if($errors->has('date_class'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_class') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.date_class_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="fee_perhour">{{ trans('cruds.invoice.fields.fee_perhour') }}</label>
                <input class="form-control {{ $errors->has('fee_perhour') ? 'is-invalid' : '' }}" type="text" name="fee_perhour" id="fee_perhour" value="{{ old('fee_perhour', $invoice->fee_perhour) }}">
                @if($errors->has('fee_perhour'))
                    <div class="invalid-feedback">
                        {{ $errors->first('fee_perhour') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.invoice.fields.fee_perhour_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection