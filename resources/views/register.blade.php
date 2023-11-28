@extends('layouts.app')

@section('title', 'Register')

@section('main')
    <div class="space-y-5">
        <h1 class="text-xl font-bold">Register</h1>

        <p>
            <a href="{{ route('register', ['as' => 'provider']) }}" class="underline text-indigo-500">
                Click here
            </a> to register as a Provider.
        </p>

        <form action="{{ route('register') }}" method="post" class="base-form">
            @csrf
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}">
                @error('name')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}">
                @error('email')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                @error('password')
                    <small>{{ $message }}</small>
                @enderror
            </div>
            <div>
                <label for="password_confirmation">Confirm password</label>
                <input type="password" name="password_confirmation" id="password_confirmation">
            </div>
            <input type="hidden" name="role" value="{{ Request::get('as') ?? 'consumer' }}">
            <button type="submit">Register</button>
        </form>

        <p>
            Already registered? <a href="{{ route('login') }}" class="underline text-indigo-500">Login</a>
        </p>
    </div>
@endsection
