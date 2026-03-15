@extends('layout.admin')

@section('page-title', '🌿 Las ramas del gran árbol')
@section('page-description', 'Organiza los senderos del conocimiento en el bosque encantado')

@section('content')
{{-- PÁGINA: Admin - Listado de categorías --}}
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8">
        {{-- SECCIÓN: Encabezado de página (MEJORADO) --}}
        <div class="mb-8 relative">
            <div class="absolute -top-4 -left-4 w-32 h-32 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-[#8bb682]/20 rounded-full blur-2xl"></div>
            
            {{-- Título principal --}}
            <h1 class="font-story text-4xl md:text-5xl lg:text-6xl font-bold text-[#1f4a2a] mb-4 relative leading-tight">
                <span class="inline-block mr-3 transform hover:rotate-12 transition-transform duration-300">🌳</span> 
                El Gran Árbol de las <br class="hidden sm:block">
                <span class="relative">
                    Categorías
                    <span class="absolute -bottom-2 left-0 w-full h-2 bg-[#b7d6a5]/30 rounded-full blur-sm"></span>
                </span>
            </h1>
            
            {{-- Descripción mágica --}}
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">"</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">Supervisa y organiza las categorías de los libros en el bosque encantado. 
                    Como las ramas de un árbol, cada categoría sostiene historias únicas. </span>
                    <span class="block mt-2 text-sm text-[#5b8c5a]">
                        <i class="fa-solid fa-feather mr-1"></i> Crea nuevas, edita las existentes o poda las que ya no florecen.
                    </span>
                </p>
            </div>
            
            {{-- Decoración de íconos --}}
            <div class="flex gap-2 mt-4 text-[#8bb682]">
                <i class="fa-solid fa-tree text-xs"></i>
                <i class="fa-solid fa-tree text-xs"></i>
                <i class="fa-solid fa-tree text-xs"></i>
                <span class="text-xs text-[#5b8c5a] mx-2">✦</span>
                <i class="fa-solid fa-leaf text-xs"></i>
                <i class="fa-solid fa-leaf text-xs"></i>
                <i class="fa-solid fa-leaf text-xs"></i>
            </div>
        </div>

        {{-- SECCIÓN: Mensajes de sesión --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-[#d8ecd0] border-2 border-[#5b9c5a] text-[#1f4a2a] rounded-xl flex items-center gap-3 shadow-lg transform hover:scale-[1.02] transition">
                <div class="w-10 h-10 bg-[#3f7847] rounded-full flex items-center justify-center text-white">
                    <i class="fa-solid fa-leaf"></i>
                </div>
                <span class="flex-1 font-story">{{ session('success') }}</span>
                <i class="fa-solid fa-sparkles text-[#5b9c5a] opacity-50"></i>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 bg-[#f8e1e1] border-2 border-[#b85c5c] text-[#b85c5c] rounded-xl flex items-center gap-3 shadow-lg">
                <div class="w-10 h-10 bg-[#b85c5c] rounded-full flex items-center justify-center text-white">
                    <i class="fa-solid fa-exclamation-circle"></i>
                </div>
                <span class="flex-1">{{ session('error') }}</span>
            </div>
        @endif

        {{-- SECCIÓN: Botón de acción --}}
        <div class="mb-8 flex justify-end">
            <a href="{{ route('categorias.create') }}" 
               class="group relative bg-[#3f7847] hover:bg-[#4c8f55] text-white px-8 py-4 rounded-full font-story flex items-center gap-3 border-2 border-[#9bcf98] shadow-xl transition-all hover:shadow-2xl hover:-translate-y-1">
                <span class="absolute -left-2 -top-2 text-lg opacity-50 group-hover:opacity-100 transition">🌱</span>
                <i class="fa-solid fa-plus bg-white/20 p-1 rounded-full"></i>
                <span class="text-lg">Sembrar nueva categoría</span>
                <i class="fa-solid fa-seedling opacity-70 group-hover:opacity-100 transition"></i>
            </a>
        </div>

        {{-- SECCIÓN: Tabla de categorías --}}
        <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#3f7847] via-[#8bb682] to-[#3f7847]"></div>
            
            {{-- Encabezado de tabla --}}
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-tree text-[#3f7847] text-3xl"></i> 
                    <span>El Catálogo de las Ramas</span>
                </h2>
                <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-feather text-[#8bb682]"></i>
                    Las categorías que dan vida a nuestro bosque de historias
                </p>
            </div>

            {{-- Tabla de datos --}}
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto admin-table">
                    <thead>
                        <tr class="bg-[#d8ecd0]">
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-hashtag text-[#3f7847]"></i>
                                    <span>ID</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-tag text-[#3f7847]"></i>
                                    <span>Nombre del Sendero</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-wand-sparkles text-[#3f7847]"></i>
                                    <span>Acciones Mágicas</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#c3dfb5]">
                        @forelse($categorias as $categoria)
                        <tr class="hover:bg-[#e5f0db] transition group">
                            <td class="px-6 py-4 font-medium text-[#1f4a2a]">
                                <span class="bg-white px-3 py-1 rounded-full border border-[#8bb682]">
                                    {{ $categoria->id }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-leaf text-[#8bb682] group-hover:text-[#3f7847] transition"></i>
                                    <span class="text-[#2d5a36] font-medium">{{ $categoria->nombre }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                {{-- ACCIONES: Editar y Eliminar --}}
                                <div class="flex gap-4 text-sm">
                                    {{-- Botón Editar --}}
                                    <a href="{{ route('categorias.edit', $categoria->id) }}" 
                                       class="group/edit relative text-[#2e693b] hover:text-[#1f4a2a] transition flex items-center gap-1 px-3 py-1 rounded-full hover:bg-white/50">
                                        <i class="fa-solid fa-pen-to-square group-hover/edit:rotate-12 transition"></i>
                                        <span class="relative">
                                            Editar
                                            <span class="absolute -bottom-1 left-0 w-0 group-hover/edit:w-full h-0.5 bg-[#2e693b] transition-all"></span>
                                        </span>
                                    </a>
                                    
                                    {{-- Botón Eliminar --}}
                                    <form action="{{ route('categorias.destroy', $categoria->id) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('¿Estás seguro de eliminar la categoría {{ $categoria->nombre }}? Esta acción no se puede deshacer.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="group/delete relative text-[#b85c5c] hover:text-[#a04545] transition flex items-center gap-1 px-3 py-1 rounded-full hover:bg-white/50">
                                            <i class="fa-solid fa-trash group-hover/delete:scale-110 transition"></i>
                                            <span class="relative">
                                                Eliminar
                                                <span class="absolute -bottom-1 left-0 w-0 group-hover/delete:w-full h-0.5 bg-[#b85c5c] transition-all"></span>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        {{-- Mensaje cuando no hay datos --}}
                        <tr>
                            <td colspan="3" class="px-6 py-12 text-center text-[#5b8c5a]">
                                <div class="flex flex-col items-center gap-3">
                                    <i class="fa-solid fa-tree text-4xl opacity-30"></i>
                                    <p class="font-story text-xl">El bosque de categorías está vacío</p>
                                    <p class="text-sm">¡Sé el primero en plantar una semilla!</p>
                                    <a href="{{ route('categorias.create') }}" class="mt-2 text-[#3f7847] hover:text-[#1f4a2a] underline decoration-dotted">
                                        <i class="fa-solid fa-seedling"></i> Crear primera categoría
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- SECCIÓN: Paginación --}}
            @if(isset($categorias) && $categorias->hasPages())
            <div class="p-6 border-t border-[#99bF8c] bg-gradient-to-b from-[#fafff2] to-[#e5f0db]">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-[#5b8c5a] font-story flex items-center gap-3 bg-white/50 px-4 py-2 rounded-full border border-[#8bb682]">
                        <i class="fa-solid fa-feather text-[#8bb682]"></i>
                        Mostrando {{ $categorias->firstItem() }} - {{ $categorias->lastItem() }} de {{ $categorias->total() }} senderos
                        <i class="fa-solid fa-feather text-[#8bb682]"></i>
                    </p>
                    
                    <div class="flex gap-2">
                        {{-- Botón Anterior --}}
                        @if($categorias->onFirstPage())
                            <span class="w-10 h-10 rounded-full border-2 border-[#c3dfb5] text-[#b7d6a5] flex items-center justify-center cursor-not-allowed bg-white/50">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $categorias->previousPageUrl() }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#3f7847] hover:text-white hover:border-[#3f7847] transition-all flex items-center justify-center bg-white shadow-md hover:shadow-xl">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        @endif

                        {{-- Números de página --}}
                        @foreach(range(1, $categorias->lastPage()) as $page)
                            @if($page == $categorias->currentPage())
                                <span class="w-10 h-10 rounded-full bg-[#3f7847] text-white border-2 border-[#9bcf98] flex items-center justify-center font-story font-bold shadow-lg transform scale-110">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $categorias->url($page) }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#e5f0db] hover:border-[#3f7847] transition-all flex items-center justify-center font-story bg-white hover:shadow-md">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Botón Siguiente --}}
                        @if($categorias->hasMorePages())
                            <a href="{{ $categorias->nextPageUrl() }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#3f7847] hover:text-white hover:border-[#3f7847] transition-all flex items-center justify-center bg-white shadow-md hover:shadow-xl">
                                <i class="fa-solid fa-chevron-right"></i>
                            </a>
                        @else
                            <span class="w-10 h-10 rounded-full border-2 border-[#c3dfb5] text-[#b7d6a5] flex items-center justify-center cursor-not-allowed bg-white/50">
                                <i class="fa-solid fa-chevron-right"></i>
                            </span>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>

        {{-- SECCIÓN: Decoración del bosque --}}
        <div class="mt-10 text-center relative">
            <div class="absolute left-1/2 -translate-x-1/2 -top-5 w-20 h-20 bg-[#b7d6a5]/20 rounded-full blur-2xl"></div>
            <div class="flex justify-center gap-4 text-[#8bb682] text-xl">
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-leaf hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-feather hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-seedling hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
            </div>
            <p class="text-xs text-[#8bb682] mt-3 italic font-story">
                "Cada categoría es una rama que sostiene historias por descubrir"
            </p>
        </div>
    </div>
</div>
@endsection