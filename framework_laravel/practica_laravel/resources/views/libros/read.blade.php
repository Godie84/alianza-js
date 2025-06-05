@extends('layouts.app')
@section('content')
    <div class="col-md-12 mt-4">
        <h1>Listado de libros</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nombre del libro</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($libros as $libro)
                    <tr>
                        <td>{{ $libro->nombre }}</td>
                        <td>{{ $libro->descripcion }}</td>
                        <td>{{ $libro->autor }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $libro->id }}">Actualizar</button>
                            @include('libros.actualizar')
                        </td>
                    </tr>
                @endforeach
                @if ($libros->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">No hay libros disponibles</td>
                    </tr>
                @endif
            </tbody>
        </table>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
    </div>
@endsection
