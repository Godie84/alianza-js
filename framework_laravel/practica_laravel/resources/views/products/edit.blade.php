{{-- resources/views/products/edit.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Contenido principal de tu vista de edición --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>Editar Producto</h1>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Ups!</strong> Hubo algunos problemas.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nombre" value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción:</label>
                            <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción">{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio:</label>
                            <input type="number" step="0.01" name="price" class="form-control" placeholder="Precio" value="{{ old('price', $product->price) }}">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock:</label>
                            <input type="number" name="stock" class="form-control" placeholder="Stock" value="{{ old('stock', $product->stock) }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Actualizar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
