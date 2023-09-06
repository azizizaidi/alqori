@extends('layouts.admin')
@section('content')
<h2>Select Payment Amount</h2>

<form action="{{ route('admin.fees.pay.amount', ['selected_fee' => ':selected_fee']) }}" method="post">
    @csrf
    <select name="selected_fee" id="selected_fee" class="w-25 p-3">
        <option value="{{ $percentage30 }}">RM{{ $percentage30 }} (30%)</option>
        <option value="{{ $percentage50 }}">RM{{ $percentage50 }} (50%)</option>
        <option value="{{ $percentage70 }}">RM{{ $percentage70 }} (70%)</option>
        <option value="{{ $percentage100 }}">RM{{ $percentage100 }} (100%)</option>
    </select><br>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-8"type="submit">Pay Now</button>
</form>


   
@endsection