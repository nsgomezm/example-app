@extends('template.app')
@section('content')
    <div class="container py-5">
        <div class="card card-body shadow mx-auto" style="max-width: 500px">
            <h3 class="text-center text-primary fw-bold mb-5">REGISTRARME</h3>
            <form method="POST" action="{{ route('store') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email"  name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Repetir contraseña</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="confirm-password" name="password_confirmation" required>
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}">¿Ya estas registrado?</a>
                    <button type="submit" class="btn btn-primary">Registrarme</button>
                </div>
            </form>
        </div>
    </div>
@endsection
