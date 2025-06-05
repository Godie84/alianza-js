@extends('layouts.app')
@section('content')
    <div class="container d-flex justify-content-center align-items-center mt-4" style="min-height: 50vh;">
        <div class="row">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Registrar un libro</h5>
                    <form method="POST" action="{{ route('libros.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion</label>
                            <input id="descripcion" class="form-control" type="text" name="descripcion" required>
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <input id="autor" class="form-control" type="text" name="autor" required>
                        </div>
                        <button type="submit" class="form-control btn btn-primary">Guardar</button>
                    </form>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
