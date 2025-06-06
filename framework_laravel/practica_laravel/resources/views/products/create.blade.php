{{-- resources/views/products/create.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Producto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>Crear Nuevo Producto</h1>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                    </div>

                    {{-- Mostrar errores de validación --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf {{-- Token CSRF para seguridad --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre:</label>
                            <input type="text" name="name" class="form-control" placeholder="Nombre del producto"
                                value="{{ old('name') }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción:</label>
                            <textarea class="form-control" style="height:150px" name="description" placeholder="Descripción del producto">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Precio:</label>
                            <input type="number" step="0.01" name="price" class="form-control"
                                placeholder="Precio del producto" value="{{ old('price') }}">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock:</label>
                            <input type="number" name="stock" class="form-control" placeholder="Cantidad en stock"
                                value="{{ old('stock') }}">
                        </div>
                        <button type="submit" class="btn btn-success">Guardar Producto</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
