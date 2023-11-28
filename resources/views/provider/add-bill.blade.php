@extends('layouts.app')

@section('title', 'Add a bill')

@section('main')
    <div class="space-y-5">
        <h1 class="text-xl font-bold">Add a bill</h1>

        <form action="{{ route('provider.add_bill', ['id' => Request::route('id')]) }}" method="post" class="base-form">
            @csrf
            <div>
                <label for="amount">Amount</label>
                <input type="number" name="amount" id="amount" value="{{ old('amount') }}">
                @error('amount')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <button type="submit">Add</button>
        </form>
    </div>
@endsection
