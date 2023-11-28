@extends('layouts.app')

@section('title', 'Consumers')

@section('main')
    <div class="space-y-5">
        <h1 class="text-xl font-bold">Consumers</h1>

        @if (count($consumers) > 0)
            <table class="base-table">
                <thead>
                    <tr>
                        <th>Consumer ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consumers as $consumer)
                        <tr>
                            <td>{{ $consumer->id }}</td>
                            <td>{{ $consumer->name }}</td>
                            <td>
                                <a href="{{ route('provider.single_consumer_view', ['id' => $consumer->id]) }}">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No consumers found.</p>
        @endif
    </div>
@endsection
