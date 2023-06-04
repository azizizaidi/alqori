@extends('layouts.admin')
@section('content')
<form id="calculate-form" method="POST">
        @csrf
        <select name="type">
            <option value="">Select Type</option>
            <option value="student">Yuran</option>
            <option value="teacher">Elaun</option>
        </select>
        <select name="mode">
            <option value="">Select Mode</option>
            <option value="physical">Fizikal</option>
            <option value="online">Online</option>
        </select>
        <select name="category1">
    <option value="">Select Category 1</option>
    <option value="quran">Quran</option>
    <option value="fardhu_ain">Fardhu Ain</option>
</select>
<select name="category2">
    <option value="">None</option>
    <option value="quran">Quran</option>
    <option value="fardhu_ain">Fardhu Ain</option>
</select>
        <input type="number" name="hours" placeholder="Hours">
        <button type="submit">Calculate</button>
    </form>

    <h1 id="result">Total: RM </h1>

@endsection
@section('scripts')
@parent
<script type="text/javascript">
        $(document).ready(function() {

          

            $('#calculate-form').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: '/admin/result',
        method: 'post',
        data: $(this).serialize(),
        success: function(data) {
            $('#result').text('Total: RM ' + data.total);
        }
    });
});

        });
    </script>
@endsection