@extends('layouts.admin')
@section('content')

<a class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-purple-500 text-white hover:bg-purple-600 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800" href="{{ route('admin.fees.add.receipt') }}">
                {{ 'Add Receipt' }}
            </a>
<br><br>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.fee.title') }}
    </div>

    <div class="card-body">
        <p>
        <livewire:history-payment-table/>
        </p>
    </div>
</div>



@endsection