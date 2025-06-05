@extends('layouts.app')
@section('content')
<div class="container d-flex justify-content-center align-items-center mt-4" style="min-height: 50vh;">
        <div class="row">
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title">Eliminar un libro</h5>
                    <form method="POST" action="{{ route('libros.destroy') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Id libro</label>
                            <input id="IdLibro" class="form-control" type="text" name="IdLibro" required>
                        </div>
                        <button type="submit" class="form-control btn btn-primary">Eliminar</button>
                    </form>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
