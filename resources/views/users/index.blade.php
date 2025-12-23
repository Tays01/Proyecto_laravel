@extends('layouts.app')

@section('title', 'Listado de Usuarios Internos')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-people me-2"></i>Gestión de Usuarios Internos
        </h1>
        <p class="text-muted mb-0 mt-2">Administra los usuarios del sistema</p>
    </div>
    <a href="{{ route('users.create') }}" class="btn btn-primary">
        <i class="bi bi-person-plus me-2"></i>Nuevo Usuario
    </a>
</div>

@if($users->count() > 0)
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th><i class="bi bi-hash me-2"></i>ID</th>
                            <th><i class="bi bi-person me-2"></i>Nombre</th>
                            <th><i class="bi bi-envelope me-2"></i>Correo</th>
                            <th><i class="bi bi-shield-check me-2"></i>Rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td><strong>#{{ $user->id }}</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="bi bi-person-fill text-primary"></i>
                                        </div>
                                        <span class="fw-semibold">{{ $user->nombre }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-muted">
                                        <i class="bi bi-envelope me-1"></i>{{ $user->correo }}
                                    </span>
                                </td>
                                <td>
                                    @if(strtolower($user->rol) == 'admin' || strtolower($user->rol) == 'administrador')
                                        <span class="badge bg-danger bg-opacity-10 text-danger">
                                            <i class="bi bi-shield-fill-check me-1"></i>{{ $user->rol }}
                                        </span>
                                    @elseif(strtolower($user->rol) == 'editor' || strtolower($user->rol) == 'editor')
                                        <span class="badge bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-pencil-square me-1"></i>{{ $user->rol }}
                                        </span>
                                    @else
                                        <span class="badge bg-info bg-opacity-10 text-info">
                                            <i class="bi bi-person-check me-1"></i>{{ $user->rol }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@else
    <div class="empty-state">
        <i class="bi bi-inbox"></i>
        <h3 class="mt-3 mb-2">No hay usuarios internos registrados</h3>
        <p class="text-muted mb-4">Comienza agregando tu primer usuario al sistema</p>
        <a href="{{ route('users.create') }}" class="btn btn-primary">
            <i class="bi bi-person-plus me-2"></i>Crear Primer Usuario
        </a>
    </div>
@endif
@endsection

