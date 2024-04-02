@extends('template.app')
@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header border-0 bg-secondary-subtle">
                <h3 class="card-title">Usuarios</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Cedula</th>
                                <th>Nombre Completo</th>
                                <th>Correo</th>
                                <th>Celular</th>
                                <th>Dirección</th>
                                <th>Fecha nacimiento</th>
                                <th>Edad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>{{ $user->email }}</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td>N/A</td>
                                    <td></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">No hay usuarios</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
