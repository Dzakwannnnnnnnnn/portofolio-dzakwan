@extends('layouts.layout')
@section('content')

<div class="login-wrapper">
    <div class="login-card">
        <!-- Session Status -->
        @if (session('status'))
        <div class="login-error">{{ session('status') }}</div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
        <div class="login-error">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                autocomplete="username" placeholder="Masukkan email Anda">

            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="current-password"
                placeholder="Masukkan password">

            <div class="login-remember">
                <input id="remember_me" type="checkbox" name="remember">
                <label for="remember_me">Remember me</label>
            </div>

            @if (Route::has('password.request'))
            <a class="login-link" href="{{ route('password.request') }}">Forgot your password?</a>
            @endif

            <button type="submit" class="login-btn">Log in</button>
        </form>
    </div>
</div>
@endsection