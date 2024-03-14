@extends('template.app')
@section('content')
    <div class="container py-5">
        <div class="card card-body shadow mx-auto" style="max-width: 500px">
            <h3 class="text-center text-primary fw-bold mb-5"  >REGISTRARME</h3>
            <form method="POST" action="{{ route('authenticate') }}">
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}">¿Ya estas registrado?</a>
                    <button type="submit" class="btn btn-primary">Registrarme</button>
                </div>
            </form>
        </div>
    </div>
@endsection
