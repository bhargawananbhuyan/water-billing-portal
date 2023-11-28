@extends('layouts.app')

@section('title', $consumer->name . "'s details")

@section('main')
    <div class="space-y-5">
        <h1 class="text-xl font-bold">{{ $consumer->name }}'s details</h1>

        <table class="base-row-table max-w-md">
            <tr>
                <th>Consumer ID</th>
                <td>{{ $consumer->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $consumer->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <a href="mailto:{{ $consumer->email }}" class="underline text-indigo-500">{{ $consumer->email }}</a>
                </td>
            </tr>
            <tr>
                <th>Registered on</th>
                <td>{{ $consumer->created_at }}</td>
            </tr>
        </table>

        <h2 class="text-lg font-semibold">Bills</h2>
        <p>
            <a href="{{ route('provider.add_bill_view', ['id' => $consumer->id]) }}" class="underline text-indigo-500">
                Click here
            </a> to add a new bill
        </p>
        @if (count($bills) > 0)
            <table class="base-table">
                <thead>
                    <tr>
                        <th>Bill ID</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->created_at }}</td>
                            <td>${{ $bill->amount }}</td>
                            <td>
                                <em>{{ ucwords($bill->status) }}</em>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
