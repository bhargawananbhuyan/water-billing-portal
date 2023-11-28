@extends('layouts.app')

@section('title', 'Bills')

@section('main')
    <div class="space-y-5">
        <h1 class="text-xl font-bold">Bills</h1>

        @if (count($bills) > 0)
            <table class="base-table">
                <thead>
                    <tr>
                        <th>Bill ID</th>
                        <th>Provider</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Action/Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->provider->name }}</td>
                            <td>{{ $bill->created_at }}</td>
                            <td>${{ $bill->amount }}</td>
                            <td>
                                @if ($bill->status === 'unpaid')
                                    <form action="{{ route('consumer.update_bill', ['id' => $bill->id]) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <button type="submit"
                                            class="text-xs font-medium border border-indigo-500 text-indigo-500 rounded-md px-3 py-1.5">Pay</button>
                                    </form>
                                @else
                                    <em>{{ ucwords($bill->status) }}</em>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No bills found.</p>
        @endif
    </div>
@endsection
