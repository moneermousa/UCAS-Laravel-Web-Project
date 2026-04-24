@extends('layouts.main')

@section('title', 'Register')


@section('main_content')
<div class="container-fluid bg-light min-vh-100 d-flex align-items-center justify-content-center">
    <div class="row w-100 justify-content-center">
        <div class="col-md-5 col-lg-4">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                
                <div class="card-header bg-dark text-white py-3 border-0 d-flex align-items-center">
                    <i class="fas fa-user-plus fs-4 me-2"></i>
                    <h4 class="mb-0 fw-bold">Create Account</h4>
                </div>

                <div class="card-body p-4 bg-white">
                    <form action="{{ route('register.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">Full Name</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                                <input type="text" name="name" class="form-control bg-light border-start-0" 
                                       placeholder="Your Name" required value="{{ old('name') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">Email Address</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control bg-light border-start-0" 
                                       placeholder="name@example.com" required value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">Phone</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-phone text-muted"></i></span>
                                <input type="text" name="phone" class="form-control bg-light border-start-0" 
                                       placeholder="Phone Number" required value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-secondary small fw-bold">Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-key text-muted"></i></span>
                                <input type="password" name="password" class="form-control bg-light border-start-0" 
                                       placeholder="Choose password" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label text-secondary small fw-bold">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-check-double text-muted"></i></span>
                                <input type="password" name="password_confirmation" class="form-control bg-light border-start-0" 
                                       placeholder="Repeat password" required>
                            </div>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-dark py-2 fw-bold shadow-sm">
                                <i class="fas fa-user-check me-2"></i> Register Now
                            </button>
                        </div>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger mt-3 py-2 border-0 shadow-sm">
                            <ul class="mb-0 small">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>

                <div class="card-footer bg-light border-0 py-3 text-center">
                    <span class="text-muted small">Already have an account? </span>
                    <a href="{{ route('login') }}" class="text-primary text-decoration-none small fw-bold">Login here</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection