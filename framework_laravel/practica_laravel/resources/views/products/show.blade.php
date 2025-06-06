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
                        <h1>Detalles del Producto</h1>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary">Volver a la Lista</a>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            {{ $product->name }}
                        </div>
                        <div class="card-body">
                            <p><strong>Descripción:</strong> {{ $product->description }}</p>
                            <p><strong>Precio:</strong> ${{ number_format($product->price, 2) }}</p>
                            <p><strong>Creado el:</strong> {{ $product->created_at->format('d/m/Y H:i') }}</p>
                            <p><strong>Última actualización:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
