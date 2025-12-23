@extends('layouts.app')

@section('title', 'Crear Usuario Interno')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="bi bi-person-plus me-2"></i>Crear Nuevo Usuario Interno
    </h1>
    <p class="text-muted mb-0 mt-2">Completa el formulario para agregar un nuevo usuario</p>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-person me-2"></i>Información del Usuario</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="nombre" class="form-label fw-semibold">
                            <i class="bi bi-person me-2 text-primary"></i>Nombre Completo
                        </label>
                        <input type="text" class="form-control form-control-lg @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" 
                               placeholder="Ingrese el nombre completo" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="correo" class="form-label fw-semibold">
                            <i class="bi bi-envelope me-2 text-info"></i>Correo Electrónico
                        </label>
                        <input type="email" class="form-control form-control-lg @error('correo') is-invalid @enderror" 
                               id="correo" name="correo" value="{{ old('correo') }}" 
                               placeholder="usuario@ejemplo.com" required>
                        @error('correo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">El correo debe ser único en el sistema</small>
                    </div>
                    <div class="mb-4">
                        <label for="rol" class="form-label fw-semibold">
                            <i class="bi bi-shield-check me-2 text-warning"></i>Rol
                        </label>
                        <input type="text" class="form-control form-control-lg @error('rol') is-invalid @enderror" 
                               id="rol" name="rol" value="{{ old('rol') }}" 
                               placeholder="Ej: Administrador, Editor, Usuario" required>
                        @error('rol')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Ejemplos: Administrador, Editor, Usuario, Supervisor</small>
                    </div>
                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Guardar Usuario
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

