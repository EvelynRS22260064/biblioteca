@extends('layout.admin')

@section('page-title', 'Categorías')
@section('page-description', 'Gestiona las categorías de los libros del bosque')

@section('content')
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8">
        <!-- Header con estilo del bosque -->
        <div class="mb-8 relative">
            <div class="absolute -top-4 -left-4 w-32 h-32 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <h1 class="font-story text-4xl md:text-5xl font-bold text-[#1f4a2a] mb-3 relative">
                <span class="inline-block mr-3">📚</span> 
                Categorías
            </h1>
            <p class="text-[#2d5a36] text-base max-w-3xl leading-relaxed">
                Gestiona las categorías de los libros del bosque encantado
            </p>
        </div>

            <div class="mb-6 flex justify-end">
            <a href="{{ route('categorias.create') }}"
            class="bg-[#3f7847] hover:bg-[#4c8f55] text-white px-6 py-3 rounded-full font-story flex items-center gap-2 border border-[#9bcf98] shadow-lg transition">
                <i class="fa-solid fa-plus"></i> Nueva categoría
            </a>
        </div>

        <!-- Tarjeta con la tabla (estilo pergamino) -->
        <div class="form-card overflow-hidden">
            <div class="p-6 border-b border-[#99bF8c]">
                <h2 class="font-story text-2xl font-bold text-[#1a4524] flex items-center gap-2">
                    <i class="fa-solid fa-tags"></i> Lista de Categorías
                </h2>
                <p class="text-[#34633e] text-sm">Categorías disponibles en el catálogo</p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full table-auto admin-table">
                    <thead>
                        <tr>
                            <th class='px-6 py-4 text-left'>ID</th>
                            <th class='px-6 py-4 text-left'>Nombre</th>
                            <th class='px-6 py-4 text-left'>Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#c3dfb5]">
                        @foreach($categorias as $categoria)
                        <tr class="hover:bg-[#e5f0db] transition">
                            <td class="px-6 py-4 font-medium text-[#1f4a2a]">{{ $categoria->id }}</td>
                            <td class="px-6 py-4 text-[#2d5a36]">{{ $categoria->nombre }}</td>
                            <td class="px-6 py-4">
                                <div class="flex gap-3 text-sm">
                                    <a href="#" class="text-[#2e693b] hover:text-[#1f4a2a] transition flex items-center gap-1">
                                        <i class="fa-solid fa-edit"></i> Editar
                                    </a>
                                    <a href="#" class="text-[#b85c5c] hover:text-[#a04545] transition flex items-center gap-1">
                                        <i class="fa-solid fa-trash"></i> Eliminar
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Si tienes paginación, la puedes poner aquí -->
            @if(isset($categorias) && method_exists($categorias, 'links'))
            <div class="p-6 border-t border-[#99bF8c]">
                {{ $categorias->links() }}
            </div>
            @endif
        </div>
    </div>
</div>
@endsection