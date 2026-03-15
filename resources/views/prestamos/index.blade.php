@extends('layout.admin')<!--Hacerlos mas bonito al terminarlo-->

@section('content')
<div class="p-4 sm:p-8">
    <h1 class = "font-story text-3xl md:text-4xl font-bold text-[#1f4a2a] mb-6">Prestamos</h1>
    
    <a href="#" class="bg-[#1f4a2a] text-white px-4 py-2 rounded-md hover:bg-[#16341e] transition duration-300">Crear Prestamo</a> 
    
    <div class="mt-6">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Usuario</th>
                    <th class="py-2 px-4 border-b">Libro</th>
                    <th class="py-2 px-4 border-b">Fecha de Préstamo</th>
                    <th class="py-2 px-4 border-b">Fecha de Devolución</th>
                    <th class="py-2 px-4 border-b">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection
