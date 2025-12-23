@extends('layouts.app')

@section('title', 'Listado de Categorías')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="bi bi-tags me-2"></i>Gestión de Categorías
    </h1>
    <p class="text-muted mb-0 mt-2">Administra las categorías de productos</p>
</div>

<div class="row">
    <div class="col-lg-8 mb-4">
        @if($categories->count() > 0)
            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                                <tr>
                                    <th><i class="bi bi-hash me-2"></i>ID</th>
                                    <th><i class="bi bi-tag me-2"></i>Nombre</th>
                                    <th><i class="bi bi-file-text me-2"></i>Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td><strong>#{{ $category->id }}</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                                                    <i class="bi bi-tag-fill text-primary"></i>
                                                </div>
                                                <span class="fw-semibold">{{ $category->nombre }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="text-muted">
                                                {{ $category->descripcion ?? 'Sin descripción' }}
                                            </span>
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
                <h3 class="mt-3 mb-2">No hay categorías registradas</h3>
                <p class="text-muted mb-4">Comienza agregando tu primera categoría</p>
            </div>
        @endif
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>Registrar Nueva Categoría</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label fw-semibold">
                            <i class="bi bi-tag me-2 text-primary"></i>Nombre
                        </label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre') }}" 
                               placeholder="Nombre de la categoría" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label fw-semibold">
                            <i class="bi bi-file-text me-2 text-info"></i>Descripción
                        </label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" 
                                  id="descripcion" name="descripcion" rows="3" 
                                  placeholder="Descripción de la categoría (opcional)">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-check-circle me-2"></i>Registrar Categoría
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

