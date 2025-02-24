@extends('layouts.homeland')

@section('content')

<div class="site-blocks-cover inner-page-cover overlay" style="background-image: url({{ asset('images/hero_bg_2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10">
                <h1 class="mb-2">Log In</h1>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <h3 class="h4 text-black widget-title mb-3">Login</h3>

                <!-- Mostrar mensaje de sesión si existe -->
                @if (session('message'))
                    <div class="alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif

                <form action="{{ route('login') }}" method="POST" class="form-contact-agent">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" autocomplete="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" autocomplete="current-password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" id="submit-btn" class="btn btn-primary btn-block">Login</button>
                    </div>
                </form>

                <p class="mt-3 text-center">Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </div>
        </div>
    </div>
</div>

@endsection
