@extends('layouts.main')

@section('title', 'Login')


@section('main_content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-header bg-dark text-white">
                    <h4 class="mb-0"><i class="fas fa-lock me-2"></i> Login</h4>
                </div>
                <div class="card-body">
                    
                    <form action="{{ route('login.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" 
                                       placeholder="name@example.com" required value="{{ old('email') }}">
                            </div>
                            @error('email')
                                <div class="text-danger small">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input type="password" name="password" class="form-control" 
                                       placeholder="Enter password" required>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-dark">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </div>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3 py-2">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
                <div class="card-footer text-center py-3">
                    <span class="text-muted small">Don't have an account?</span>
                    <a href="{{ route('register') }}" class="text-decoration-none small">Register here</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection