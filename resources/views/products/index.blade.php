@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
    <div>
        <h1 class="page-title">
            <i class="bi bi-box-seam me-2"></i>Gestión de Productos
        </h1>
        <p class="text-muted mb-0 mt-2">Administra el inventario de productos</p>
    </div>
    <a href="{{ route('products.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-circle me-2"></i>Nuevo Producto
    </a>
</div>

@if($products->count() > 0)
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th><i class="bi bi-hash me-2"></i>ID</th>
                            <th><i class="bi bi-box me-2"></i>Nombre</th>
                            <th><i class="bi bi-currency-dollar me-2"></i>Precio</th>
                            <th><i class="bi bi-stack me-2"></i>Stock</th>
                            <th class="text-center"><i class="bi bi-gear me-2"></i>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><strong>#{{ $product->id }}</strong></td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                                            <i class="bi bi-box text-primary"></i>
                                        </div>
                                        <span class="fw-semibold">{{ $product->nombre }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-success bg-opacity-10 text-success">
                                        ${{ number_format($product->precio, 2) }}
                                    </span>
                                </td>
                                <td>
                                    @if($product->stock > 10)
                                        <span class="badge bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-check-circle me-1"></i>{{ $product->stock }}
                                        </span>
                                    @elseif($product->stock > 0)
                                        <span class="badge bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-exclamation-triangle me-1"></i>{{ $product->stock }}
                                        </span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger">
                                            <i class="bi bi-x-circle me-1"></i>Agotado
                                        </span>
                                    @endif
                                </td>
                                <td class="text-center action-buttons">
                                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning" title="Editar">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" 
                                                onclick="return confirm('¿Está seguro de eliminar este producto?')" 
                                                title="Eliminar">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
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
        <h3 class="mt-3 mb-2">No hay productos registrados</h3>
        <p class="text-muted mb-4">Comienza agregando tu primer producto al sistema</p>
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-2"></i>Crear Primer Producto
        </a>
    </div>
@endif
@endsection

