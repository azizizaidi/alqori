@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{( 'Add Receipt') }}
    </div>

    <div class="card-body">

   
    </br>
   
    <form method="POST" action="{{ route("admin.fees.store.receipt") }}" enctype="multipart/form-data">
            @csrf
            
              <div class="form-group">
                <label class="required" for="paid_by_id">{{ ('Payer') }}</label>
                <select class="form-control select2 {{ $errors->has('paidby') ? 'is-invalid' : '' }}" name="paid_by_id" id="paid_by_id" required>
               @foreach($registrars as $id => $entry)
                        <option value="{{ $id }}" {{ old('paid_by_id') == $id ? 'selected' : '' }}>{{ $entry}}</option>
                    @endforeach
               
                </select>
               
           
            </div>

           <div class="form-group">
                <label class="required" for="amount_paid">{{ ('Amount Paid') }}</label>
                <input class="form-control {{ $errors->has('amount_paid') ? 'is-invalid' : '' }}" type="text" name="amount_paid" id="amount_paid" value="{{ old('amount_paid', '') }}"  required>
                @if($errors->has('amount_paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount_paid') }}
                    </div>
                @endif
             
            </div>
          
        
           
           
            <div class="form-group">
                <label class="required" for="receipt_paid">{{ ('Receipt Paid') }}</label>
                <input class="form-control {{ $errors->has('receipt_paid') ? 'is-invalid' : '' }}" type="text" name="receipt_paid" id="receipt_paid" value="{{ old('receipt_paid', '') }}"  required>
                @if($errors->has('receipt_paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('receipt_paid') }}
                    </div>
                @endif
          
            </div>
          
             
           
            <div class="form-group">
            <button type="submit" class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
            {{ trans('global.submit') }}
</button>
            </div>
        </form>
    </div>
</div>



@endsection