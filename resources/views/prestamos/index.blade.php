@extends('layout.admin')

@section('page-title', '📚 El Registro de los Libros Viajeros')
@section('page-description', 'Supervisa el movimiento de ejemplares entre los habitantes del claro')

@section('content')
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        <!-- Header con estilo del bosque MEJORADO -->
        <div class="mb-12 relative">
            <div class="absolute -top-4 -left-4 w-40 h-40 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#8bb682]/20 rounded-full blur-2xl"></div>
            
            <h1 class="font-story text-5xl md:text-6xl lg:text-7xl font-bold text-[#1f4a2a] mb-4 relative leading-tight">
                <span class="inline-block mr-3 transform hover:rotate-12 transition-transform duration-300">📋</span> 
                <span class="relative">
                    Bitácora
                    <span class="absolute -bottom-2 left-0 w-full h-2 bg-[#b7d6a5]/30 rounded-full blur-sm"></span>
                </span>
                <br>de Préstamos Encantados
            </h1>
            
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">✧</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">Supervisa el movimiento de ejemplares entre los habitantes del claro encantado. 
                    Cada libro viajero lleva consigo historias que florecen en nuevos hogares.</span>
                </p>
            </div>
            
            <div class="flex gap-3 mt-4 text-[#8bb682]">
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <span class="text-xs text-[#5b8c5a] mx-2">✦</span>
                <i class="fa-solid fa-arrow-right-arrow-left text-sm"></i>
                <i class="fa-solid fa-arrow-right-arrow-left text-sm"></i>
                <i class="fa-solid fa-arrow-right-arrow-left text-sm"></i>
            </div>
        </div>

        <!-- Botón de crear con estilo mejorado -->
        <div class="mb-8 flex justify-end">
            <a href="{{ route('prestamos.create') }}" 
               class="group relative bg-[#3f7847] hover:bg-[#4c8f55] text-white px-8 py-4 rounded-full font-story flex items-center gap-3 border-2 border-[#9bcf98] shadow-xl transition-all hover:shadow-2xl hover:-translate-y-1">
                <span class="absolute -left-2 -top-2 text-lg opacity-50 group-hover:opacity-100 transition">📖</span>
                <i class="fa-solid fa-plus bg-white/20 p-2 rounded-full"></i>
                <span class="text-lg">Registrar Nuevo Viaje</span>
                <i class="fa-solid fa-feather opacity-70 group-hover:opacity-100 transition"></i>
            </a>
        </div>

        <!-- Tarjeta con la tabla estilo pergamino -->
        <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#3f7847] via-[#8bb682] to-[#3f7847]"></div>
            
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-list text-[#3f7847] text-3xl"></i> 
                    <span>Historial de Libros Viajeros</span>
                </h2>
                <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-leaf text-[#8bb682]"></i>
                    Todos los movimientos registrados en el bosque encantado
                </p>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full admin-table">
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
                                    <i class="fa-solid fa-user text-[#3f7847]"></i>
                                    <span>Habitante</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-book text-[#3f7847]"></i>
                                    <span>Libro Viajero</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-calendar text-[#3f7847]"></i>
                                    <span>Partida</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-calendar-check text-[#3f7847]"></i>
                                    <span>Retorno</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-wand-sparkles text-[#3f7847]"></i>
                                    <span>Acciones</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#c3dfb5]">
                        @forelse($prestamos ?? [] as $prestamo)
                        <tr class="hover:bg-[#e5f0db] transition group">
                            <td class="px-6 py-4">
                                <span class="bg-white px-3 py-1 rounded-full border border-[#8bb682] text-[#1f4a2a] font-medium">
                                    {{ $prestamo->id }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-leaf text-[#8bb682] group-hover:text-[#3f7847] transition"></i>
                                    <span class="text-[#2d5a36]">{{ $prestamo->usuario->name ?? 'Desconocido' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-book-open text-[#8bb682] text-xs"></i>
                                    <span class="text-[#2d5a36]">{{ $prestamo->libro->titulo ?? 'Desconocido' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-feather text-[#8bb682] text-xs"></i>
                                    <span>{{ $prestamo->fecha_prestamo ?? 'N/A' }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if(isset($prestamo->fecha_devolucion))
                                    <span class="text-[#2e693b]">{{ $prestamo->fecha_devolucion }}</span>
                                @else
                                    <span class="text-[#b8860b] flex items-center gap-1">
                                        <i class="fa-solid fa-hourglass-half"></i> Pendiente
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('prestamos.edit', $prestamo->id) }}" 
                                       class="group/edit relative text-[#2e693b] hover:text-[#1f4a2a] transition flex items-center gap-1 px-3 py-1 rounded-full hover:bg-white/50">
                                        <i class="fa-solid fa-pen-to-square group-hover/edit:rotate-12 transition"></i>
                                        <span>Editar</span>
                                    </a>
                                    
                                    <form action="{{ route('prestamos.destroy', $prestamo->id) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este préstamo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="group/delete relative text-[#b85c5c] hover:text-[#a04545] transition flex items-center gap-1 px-3 py-1 rounded-full hover:bg-white/50">
                                            <i class="fa-solid fa-trash group-hover/delete:scale-110 transition"></i>
                                            <span>Eliminar</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-[#5b8c5a]">
                                <div class="flex flex-col items-center gap-3">
                                    <i class="fa-solid fa-tree text-4xl opacity-30"></i>
                                    <p class="font-story text-xl">El bosque está en silencio...</p>
                                    <p class="text-sm">No hay libros viajando en este momento</p>
                                    <a href="{{ route('prestamos.create') }}" class="mt-2 text-[#3f7847] hover:text-[#1f4a2a] underline decoration-dotted">
                                        <i class="fa-solid fa-seedling"></i> Registrar el primer viaje
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación (si existe) -->
            @if(isset($prestamos) && method_exists($prestamos, 'hasPages') && $prestamos->hasPages())
            <div class="p-6 border-t border-[#99bF8c] bg-gradient-to-b from-[#fafff2] to-[#e5f0db]">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-[#5b8c5a] font-story flex items-center gap-3 bg-white/50 px-4 py-2 rounded-full border border-[#8bb682]">
                        <i class="fa-solid fa-feather text-[#8bb682]"></i>
                        Mostrando {{ $prestamos->firstItem() ?? 1 }} - {{ $prestamos->lastItem() ?? count($prestamos) }} de {{ $prestamos->total() ?? count($prestamos) }} viajes
                        <i class="fa-solid fa-feather text-[#8bb682]"></i>
                    </p>
                    
                    <div class="flex gap-2">
                        {{ $prestamos->links() }}
                    </div>
                </div>
            </div>
            @endif
            
            <!-- Sello decorativo -->
            <div class="absolute bottom-4 right-4 opacity-10 pointer-events-none">
                <i class="fa-solid fa-arrow-right-arrow-left text-6xl text-[#1f4a2a] rotate-12"></i>
            </div>
        </div>

        <!-- Mensaje inspirador -->
        <div class="mt-8 text-center relative">
            <div class="absolute left-1/2 -translate-x-1/2 -top-5 w-20 h-20 bg-[#b7d6a5]/20 rounded-full blur-2xl"></div>
            <div class="flex justify-center gap-4 text-[#8bb682] text-xl">
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-arrow-right-arrow-left hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-book-open hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
            </div>
            <p class="text-sm text-[#8bb682] mt-3 italic font-story">
                "Cada libro que prestamos es una historia que emprende un viaje"
            </p>
        </div>
    </div>
</div>
@endsection