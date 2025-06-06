<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Título de la Página') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h1>Productos</h1>
                        <a href="{{ route('products.create') }}" class="btn btn-primary">Crear Nuevo Producto</a>
                    </div>

                    {{-- Mensajes de éxito --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th width="280px">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ Str::limit($product->description, 50) }}</td> {{-- Limita la descripción --}}
                                    <td>${{ number_format($product->price, 2) }}</td>
                                    <td>
                                        {{-- El botón "Mostrar" y "Editar" son visibles para todos los que puedan "ver" o "editar" productos --}}
                                        <a class="btn btn-info btn-sm"
                                            href="{{ route('products.show', $product->id) }}">Mostrar</a>

                                        @can('edit product')
                                            {{-- Solo si el usuario puede editar --}}
                                            <a class="btn btn-primary btn-sm"
                                                href="{{ route('products.edit', $product->id) }}">Editar</a>
                                        @endcan

                                        {{-- El formulario y el botón de eliminar solo serán visibles si el usuario tiene el permiso 'delete product' --}}
                                        @can('delete product')
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?')">Eliminar</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay productos para mostrar.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- Enlaces de paginación --}}
                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
