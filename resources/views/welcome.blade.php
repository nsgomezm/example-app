@extends('template.app')
@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Bienvenido, {{ $user->name }}</h3>
            </div>
            <div class="card-body">
                {{ auth()->user()->name }}
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, beatae cumque et fuga fugit harum minima, molestiae nostrum numquam omnis quas sequi tempore tenetur. Assumenda distinctio eius error nesciunt quae.
            </div>
            <div class="card-footer">
                <a type="button" class="btn btn-primary"  href="{{ route('logout') }}">
                    Cerrar sesión
                </a>
            </div>
        </div>
    </div>
@endsection
