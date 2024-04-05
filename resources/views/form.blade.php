@extends('template.app')
@section('content')
    <div class="container py-5">
        <div class="card">
            <div class="card-header border-0 bg-secondary-subtle">
                <h3 class="card-title">Formulario</h3>
            </div>
            <div class="card-body">
                <form action="{{ $user?->id ? route('user.update', $user?->id) : route('user.store') }}" method="POST" autocomplete="off">
                    @csrf

                    @php
                        $alert = Session::get('alert');
                    @endphp


                    @if($alert)
                        <div class="alert alert-{{$alert['type']}}">
                            {{ $alert['message'] }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-2">
                                <label for="email" class="form-label">Correo</label>
                                {{--
                                    1. if else
                                    2. (condición) ? true : false
                                    3. $name ?? 'N/A'
                                    4. condición ?: 'Es negativo'
                                --}}
                                <input type="email" class="form-control {{ !$errors->has('email') ?: 'is-invalid' }}" id="email" name="email" aria-describedby="emailHelp"
                                value="{{ old('email') ?? $user?->email}}">

                                @if ($errors->has('email'))
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                @else
                                    <div id="email" class="form-text">El correo debe terminar en: <b>@misena.edu.com</b></div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <div class="mb-2">
                                    <label for="password" class="form-label">Contraseña</label>
                                    {{--
                                        @class(['class1','class2','class3', 'color' => condición])
                                    --}}
                                    <input type="password" @class(['form-control', 'is-invalid' => $errors->has('password')]) class="form-control mb-3" id="password" name="password">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation" class="form-label">Confirmar contraseña</label>
                                    <input type="password" @class(['form-control', 'mb-2', 'is-invalid' => $errors->has('password')]) id="password_confirmation" name="password_confirmation">

                                    <ul class="list-group text-smaller">
                                        <li class="list-group-item py-1 px-2">La contraseña debe tener letras</li>
                                        <li class="list-group-item py-1 px-2">La contraseña debe tener numeros</li>
                                        <li class="list-group-item py-1 px-2">La contraseña debe tener simbolos</li>
                                        <li class="list-group-item py-1 px-2">La contraseña debe tener minimo 8 caracteres</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <x-form-input label="Cedula" type="number" name="document_number" :value="old('document_number') ?? $user?->personalInformation?->document_number"></x-form-input>

                            <div class="row">

                                <div class="col-md-6">
                                    <x-form-input type="text" label="Nombre" name="name" :value="old('name') ?? $user?->personalInformation?->name"></x-form-input>
                                    {{-- <label for="name" class="form-label">Nombre</label>
                                    <input type="text"  @class(['form-control',
                                    'is-valid' => old('name') && !$errors->has('name'),
                                    'is-invalid' => $errors->has('name')]) id="name" name="name" value="{{ old('name') ?? $user?->personalInformation?->name}}">

                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror --}}
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="last_name" class="form-label">Apellido</label>
                                    <input type="text" @class(['form-control',
                                        'is-valid' => old('last_name') && !$errors->has('last_name'),
                                        'is-invalid' => $errors->has('last_name')]) id="last_name" name="last_name" value="{{ old('last_name') ?? $user?->personalInformation?->last_name}}">
                                    @error('last_name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="date_born" class="form-label">Fecha de nacimiento</label>
                                <input type="date" @class(['form-control',
                                    'is-valid' => old('date_born') && !$errors->has('date_born'),
                                    'is-invalid' => $errors->has('date_born')]) id="date_born" name="date_born" value="{{ old('date_born') ?? $user?->personalInformation?->date_born}}">
                                @error('date_born') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="mb-4">
                                <label for="photo" class="form-label">Foto</label>
                                <input @class(['form-control',
                                    'is-valid' => old('photo') && !$errors->has('photo'),
                                    'is-invalid' => $errors->has('photo')]) type="file" id="formFile" name="photo">
                                @error('photo') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <div class="d-flex gap-3 align-items-center justify-content-center">
                        <a href="{{ route('home') }}">Atras</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
