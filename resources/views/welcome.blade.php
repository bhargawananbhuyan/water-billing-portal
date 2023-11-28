@extends('layouts.app')

@section('title', 'Home')

@section('main')
    <div class="text-center">
        <p class="text-6xl mb-5">
            💧
        </p>
        <h1 class="text-2xl font-bold mb-1">Hi {{ Auth::user()->name ?? 'there' }} 👋</h1>
        <p>Welcome to Water Management Portal</p>
    </div>
@endsection
