@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="page-header">
    <h1 class="page-title">
        <i class="bi bi-pencil-square me-2"></i>Editar Producto
    </h1>
    <p class="text-muted mb-0 mt-2">Modifica la información del producto</p>
</div>

<div class="row">
    <div class="col-lg-8 offset-lg-2">
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-box me-2"></i>Información del Producto</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('products.update', $product->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="nombre" class="form-label fw-semibold">
                            <i class="bi bi-tag me-2 text-primary"></i>Nombre del Producto
                        </label>
                        <input type="text" class="form-control form-control-lg @error('nombre') is-invalid @enderror" 
                               id="nombre" name="nombre" value="{{ old('nombre', $product->nombre) }}" 
                               placeholder="Ingrese el nombre del producto" required>
                        @error('nombre')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="precio" class="form-label fw-semibold">
                            <i class="bi bi-currency-dollar me-2 text-success"></i>Precio
                        </label>
                        <div class="input-group">
                            <span class="input-group-text bg-light">$</span>
                            <input type="number" step="0.01" class="form-control form-control-lg @error('precio') is-invalid @enderror" 
                                   id="precio" name="precio" value="{{ old('precio', $product->precio) }}" 
                                   placeholder="0.00" required>
                            @error('precio')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="stock" class="form-label fw-semibold">
                            <i class="bi bi-stack me-2 text-info"></i>Stock
                        </label>
                        <input type="number" class="form-control form-control-lg @error('stock') is-invalid @enderror" 
                               id="stock" name="stock" value="{{ old('stock', $product->stock) }}" 
                               placeholder="Cantidad en inventario" required>
                        @error('stock')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Ingrese la cantidad disponible en inventario</small>
                    </div>
                    <div class="d-flex justify-content-between pt-3 border-top">
                        <a href="{{ route('products.index') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Cancelar
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-2"></i>Actualizar Producto
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

