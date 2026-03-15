@extends('layout.admin')

@section('content')

<div class="container mx-auto px-4 py-8">

    <h1 class="text-3xl font-bold text-center mb-6">Selecciona el Libro para Prestar</h1>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="relative max-w-3xl mx-auto">

            <div class="mt-6">
                <h2 class="text-2xl font-bold text-center mb-4">Usuario Encontrado</h2>

                <div class="bg-white shadow-md rounded-lg p-6">
                    <p class="text-gray-700 text-lg mb-2"><strong>Nombre:</strong> {{ $usuario->name }}</p>
                    <p class="text-gray-700 text-lg mb-2"><strong>Email:</strong> {{ $usuario->email }}</p>
                    <p class="text-gray-700 text-lg mb-2"><strong>ID Usuario:</strong> {{ $usuario->id }}</p>
                </div>
            </div>

            <form action="{{ route('prestamos.store') }}" method="POST">
                @csrf

                <label for="libro_id" class="block text-gray-700 font-semibold mb-2">
                    Libro:
                </label>

                <select name="libro_id" id="libro_id"
                    class="w-full border border-gray-300 rounded-md p-2 mb-4">

                    <option value="">Selecciona un libro</option>

                    @foreach($libros as $libro)
                        <option value="{{ $libro->id }}">
                            {{ $libro->nombre }} - {{ $libro->autor }}
                        </option>
                    @endforeach

                </select>

                <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">

                <div class="flex justify-end">

                    <input type="submit"
                        value="Registrar Préstamo"
                        class="btn-primary py-3 px-6 text-lg">

                    <a href="{{ route('prestamos.index') }}"
                        class="btn-secondary py-3 px-6 text-lg ml-4">
                        Cancelar
                    </a>

                </div>

            </form>

        </div>
    </div>

</div>

@endsection