@extends('layout.admin')

@section('page-title', 'Inicio')
@section('page-description', 'Panel principal del bosque encantado')

@section('content')
<div class="p-4 sm:p-8">
    <!-- Panel de Estadísticas (4 tarjetas principales) -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Tarjeta 1: Total de libros -->
        <div class="book-card p-6 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-[#b7d6a5]/30 rounded-bl-full -z-0"></div>
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-3">
                    <p class="text-[#5b8c5a] text-sm font-medium font-story">🌳 Total de libros</p>
                    <i class="fa-solid fa-book text-2xl text-[#b7d6a5] group-hover:text-[#5b8c5a] transition"></i>
                </div>
                <p class="text-4xl font-bold text-[#1f4a2a] mb-2">1,247</p>
                <p class="text-[#3f7847] text-xs flex items-center gap-1 bg-[#e5f0db] px-3 py-1 rounded-full inline-flex">
                    <i class="fa-solid fa-arrow-up text-xs"></i> 5.2% desde la última luna
                </p>
            </div>
        </div>

        <!-- Tarjeta 2: Libros prestados -->
        <div class="book-card p-6 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-[#f0dbb0]/30 rounded-bl-full -z-0"></div>
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-3">
                    <p class="text-[#5b8c5a] text-sm font-medium font-story">🍂 Libros prestados</p>
                    <i class="fa-solid fa-exchange-alt text-2xl text-[#f0dbb0] group-hover:text-[#b8860b] transition"></i>
                </div>
                <p class="text-4xl font-bold text-[#1f4a2a] mb-2">189</p>
                <p class="text-[#b8860b] text-xs flex items-center gap-1 bg-[#f5e6d3] px-3 py-1 rounded-full inline-flex">
                    <i class="fa-solid fa-arrow-down text-xs"></i> 2.1% desde el mes pasado
                </p>
            </div>
        </div>

        <!-- Tarjeta 3: Usuarios activos -->
        <div class="book-card p-6 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-[#a8d5a8]/30 rounded-bl-full -z-0"></div>
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-3">
                    <p class="text-[#5b8c5a] text-sm font-medium font-story">🌿 Lectores activos</p>
                    <i class="fa-solid fa-users text-2xl text-[#a8d5a8] group-hover:text-[#3f7847] transition"></i>
                </div>
                <p class="text-4xl font-bold text-[#1f4a2a] mb-2">543</p>
                <p class="text-[#3f7847] text-xs flex items-center gap-1 bg-[#e5f0db] px-3 py-1 rounded-full inline-flex">
                    <i class="fa-solid fa-arrow-up text-xs"></i> 12.7% desde el mes pasado
                </p>
            </div>
        </div>

        <!-- Tarjeta 4: Devoluciones pendientes -->
        <div class="book-card p-6 relative overflow-hidden group">
            <div class="absolute top-0 right-0 w-24 h-24 bg-[#d4a5a5]/30 rounded-bl-full -z-0"></div>
            <div class="relative z-10">
                <div class="flex justify-between items-start mb-3">
                    <p class="text-[#5b8c5a] text-sm font-medium font-story">⏳ Devoluciones pendientes</p>
                    <i class="fa-solid fa-clock text-2xl text-[#d4a5a5] group-hover:text-[#b85c5c] transition"></i>
                </div>
                <p class="text-4xl font-bold text-[#1f4a2a] mb-2">24</p>
                <p class="text-[#b85c5c] text-xs flex items-center gap-1 bg-[#f8e1e1] px-3 py-1 rounded-full inline-flex">
                    <i class="fa-solid fa-arrow-up text-xs"></i> 3.4% desde ayer
                </p>
            </div>
        </div>
    </div>

    <!-- Sección de Acceso Rápido / Atajos -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="admin-card p-5 flex items-center gap-4">
            <div class="w-12 h-12 bg-[#3f7847] rounded-full flex items-center justify-center text-white text-xl">
                <i class="fa-solid fa-book-open"></i>
            </div>
            <div>
                <h3 class="font-story font-bold text-[#1f4a2a]">Nuevo libro</h3>
                <p class="text-xs text-[#5b8c5a]">Agregar ejemplar al catálogo</p>
            </div>
            <a href="{{ route('libros.create') }}" class="ml-auto text-[#3f7847] hover:text-[#1f4a2a]">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="admin-card p-5 flex items-center gap-4">
            <div class="w-12 h-12 bg-[#b8860b] rounded-full flex items-center justify-center text-white text-xl">
                <i class="fa-solid fa-users"></i>
            </div>
            <div>
                <h3 class="font-story font-bold text-[#1f4a2a]">Nuevo lector</h3>
                <p class="text-xs text-[#5b8c5a]">Registrar habitante del bosque</p>
            </div>
            <a href="#" class="ml-auto text-[#3f7847] hover:text-[#1f4a2a]">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="admin-card p-5 flex items-center gap-4">
            <div class="w-12 h-12 bg-[#5b8c5a] rounded-full flex items-center justify-center text-white text-xl">
                <i class="fa-solid fa-chart-line"></i>
            </div>
            <div>
                <h3 class="font-story font-bold text-[#1f4a2a]">Reportes</h3>
                <p class="text-xs text-[#5b8c5a]">Estadísticas del claro</p>
            </div>
            <a href="#" class="ml-auto text-[#3f7847] hover:text-[#1f4a2a]">
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Sección principal: Grimorio de Libros -->
    <div class="form-card overflow-hidden mb-8">
        <div class="p-6 border-b border-[#99bF8c] flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="font-story text-2xl font-bold text-[#1a4524] flex items-center gap-2">
                    <i class="fa-solid fa-book-open"></i> Grimorio de Libros
                </h2>
                <p class="text-[#34633e] text-sm">Lista completa de ejemplares en el claro</p>
            </div>
            <a href="{{ route('libros.create') }}" class="bg-[#3f7847] hover:bg-[#4c8f55] text-white px-6 py-3 rounded-full font-story flex items-center gap-2 border border-[#9bcf98] shadow-lg transition">
                <i class="fa-solid fa-plus"></i> Agregar libro
            </a>
            </div>
        
        <!-- Tabla responsive -->
        <div class="overflow-x-auto">
            <table class="w-full text-left admin-table">
                <thead>
                    <tr>
                        <th class="px-6 py-4">Título del libro</th>
                        <th class="px-6 py-4">Autor del pergamino</th>
                        <th class="px-6 py-4">ISBN (Número mágico)</th>
                        <th class="px-6 py-4">Categoría</th>
                        <th class="px-6 py-4">Disponibilidad</th>
                        <th class="px-6 py-4">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#c3dfb5]">
                    @forelse($libros ?? [] as $libro)
                    <tr class="hover:bg-[#e5f0db] transition">
                        <td class="px-6 py-4 font-medium text-[#1f4a2a]">{{ $libro->nombre ?? 'Sin título' }}</td>
                        <td class="px-6 py-4">{{ $libro->autor ?? 'Desconocido' }}</td>
                        <td class="px-6 py-4 font-mono text-xs">{{ $libro->isbn ?? 'N/A' }}</td>
                        <td class="px-6 py-4">
                            @if(isset($libro->categoria) && $libro->categoria)
                                <span class="badge badge-success">{{ $libro->categoria->nombre }}</span>
                            @else
                                <span class="badge badge-warning">Sin categoría</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            @if(($libro->estado ?? 'disponible') == 'disponible')
                                <span class="flex items-center gap-1 text-[#3f7847] font-bold">
                                    <i class="fa-solid fa-leaf text-xs"></i> Disponible
                                </span>
                            @else
                                <span class="flex items-center gap-1 text-[#b8860b] font-bold">
                                    <i class="fa-solid fa-hourglass-half"></i> Prestado
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex gap-3 text-sm">
                                <a href="{{ route('libros.edit', $libro->id) }}" class="text-[#2e693b] hover:text-[#1f4a2a] transition flex items-center gap-1">
                                    <i class="fa-solid fa-edit"></i> Editar
                                </a>
                                <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar libro?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-[#b85c5c] hover:text-[#a04545] transition flex items-center gap-1">
                                        <i class="fa-solid fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center text-[#5b8c5a]">
                            <i class="fa-solid fa-leaf text-3xl mb-2 block"></i>
                            <p class="font-story text-lg">No hay libros en el catálogo</p>
                            <a href="{{ route('libros.create') }}" class="text-[#3f7847] hover:text-[#1f4a2a] underline decoration-dotted mt-2 inline-block">
                                Agrega el primer libro
                            </a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
       <!-- Paginación con estilo bosque -->
@if(isset($libros) && $libros->hasPages())
<div class="p-6 border-t border-[#99bF8c]">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
        <p class="text-xs text-[#5b8c5a] font-story flex items-center gap-2">
            <i class="fa-solid fa-leaf text-[#8bb682]"></i>
            Mostrando {{ $libros->firstItem() }} - {{ $libros->lastItem() }} de {{ $libros->total() }} libros
            <i class="fa-solid fa-leaf text-[#8bb682]"></i>
        </p>
        
        <div class="flex gap-2">
            {{-- Botón Anterior --}}
            @if($libros->onFirstPage())
                <span class="w-9 h-9 rounded-full border border-[#c3dfb5] text-[#b7d6a5] flex items-center justify-center cursor-not-allowed">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </span>
            @else
                <a href="{{ $libros->previousPageUrl() }}" class="w-9 h-9 rounded-full border border-[#8bb682] text-[#1f4a2a] hover:bg-[#e5f0db] hover:border-[#3f7847] transition flex items-center justify-center">
                    <i class="fa-solid fa-chevron-left text-xs"></i>
                </a>
            @endif

            {{-- Números de página --}}
            @foreach(range(1, $libros->lastPage()) as $page)
                @if($page == $libros->currentPage())
                    <span class="w-9 h-9 rounded-full bg-[#3f7847] text-white border border-[#9bcf98] flex items-center justify-center font-story font-bold shadow-md">
                        {{ $page }}
                    </span>
                @else
                    <a href="{{ $libros->url($page) }}" class="w-9 h-9 rounded-full border border-[#8bb682] text-[#1f4a2a] hover:bg-[#e5f0db] hover:border-[#3f7847] transition flex items-center justify-center font-story">
                        {{ $page }}
                    </a>
                @endif
            @endforeach

            {{-- Botón Siguiente --}}
            @if($libros->hasMorePages())
                <a href="{{ $libros->nextPageUrl() }}" class="w-9 h-9 rounded-full border border-[#8bb682] text-[#1f4a2a] hover:bg-[#e5f0db] hover:border-[#3f7847] transition flex items-center justify-center">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </a>
            @else
                <span class="w-9 h-9 rounded-full border border-[#c3dfb5] text-[#b7d6a5] flex items-center justify-center cursor-not-allowed">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </span>
            @endif
        </div>
    </div>
</div>
@endif

    <!-- Actividad Reciente y Categorías Populares -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="admin-card p-6">
            <h3 class="font-story text-xl font-bold text-[#1f4a2a] mb-4 flex items-center gap-2">
                <i class="fa-solid fa-clock"></i> Actividad reciente
            </h3>
            <div class="space-y-4">
                <div class="flex items-start gap-3 pb-3 border-b border-[#c3dfb5]">
                    <div class="w-8 h-8 bg-[#3f7847]/20 rounded-full flex items-center justify-center text-[#3f7847]">
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-[#1f4a2a]"><span class="font-bold">María González</span> prestó <span class="font-story italic">"Cien años de soledad"</span></p>
                        <p class="text-xs text-[#5b8c5a]">Hace 15 minutos</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 pb-3 border-b border-[#c3dfb5]">
                    <div class="w-8 h-8 bg-[#b8860b]/20 rounded-full flex items-center justify-center text-[#b8860b]">
                        <i class="fa-solid fa-rotate-left"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-[#1f4a2a]"><span class="font-bold">Carlos Ruiz</span> devolvió <span class="font-story italic">"1984"</span></p>
                        <p class="text-xs text-[#5b8c5a]">Hace 2 horas</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 bg-[#5b8c5a]/20 rounded-full flex items-center justify-center text-[#5b8c5a]">
                        <i class="fa-solid fa-user-plus"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm text-[#1f4a2a]"><span class="font-bold">Ana Martínez</span> se registró como nueva lectora</p>
                        <p class="text-xs text-[#5b8c5a]">Hace 3 horas</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-card p-6">
            <h3 class="font-story text-xl font-bold text-[#1f4a2a] mb-4 flex items-center gap-2">
                <i class="fa-solid fa-chart-pie"></i> Categorías populares
            </h3>
            <div class="space-y-3">
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-[#1f4a2a]">Literatura</span>
                        <span class="text-[#5b8c5a]">45%</span>
                    </div>
                    <div class="w-full bg-[#c3dfb5] rounded-full h-2">
                        <div class="bg-[#3f7847] h-2 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-[#1f4a2a]">Ciencia Ficción</span>
                        <span class="text-[#5b8c5a]">30%</span>
                    </div>
                    <div class="w-full bg-[#c3dfb5] rounded-full h-2">
                        <div class="bg-[#b8860b] h-2 rounded-full" style="width: 30%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1">
                        <span class="text-[#1f4a2a]">Fantasía</span>
                        <span class="text-[#5b8c5a]">25%</span>
                    </div>
                    <div class="w-full bg-[#c3dfb5] rounded-full h-2">
                        <div class="bg-[#5b8c5a] h-2 rounded-full" style="width: 25%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection