@extends('layout.admin')

@section('page-title', '📚 El Registro de los Libros Viajeros')
@section('page-description', 'Supervisa el movimiento de ejemplares entre los habitantes del claro')

@section('content')
{{-- PÁGINA: Admin - Listado de préstamos --}}
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8 max-w-7xl">
        {{-- SECCIÓN: Encabezado principal --}}
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

            {{-- SECCIÓN: Mensajes de sesión --}}
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <strong class="font-bold">¡Éxito!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <strong class="font-bold">¡Error!</strong>
                    <span class="block sm:inline">{{ session('error') }}</span>
                </div>
            @endif
            
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">✧</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">
                        Supervisa el movimiento de ejemplares entre los habitantes del claro encantado.
                        Cada libro viajero lleva consigo historias que florecen en nuevos hogares.
                    </span>
                </p>
            </div>
        </div>

        {{-- SECCIÓN: Botón de acción --}}
        <div class="mb-8 flex justify-end">
            <a href="{{ route('prestamos.create') }}"
            class="group relative bg-[#3f7847] hover:bg-[#4c8f55] text-white px-8 py-4 rounded-full font-story flex items-center gap-3 border-2 border-[#9bcf98] shadow-xl transition-all hover:shadow-2xl hover:-translate-y-1">
                <i class="fa-solid fa-plus bg-white/20 p-2 rounded-full"></i>
                <span class="text-lg">Registrar Nuevo Viaje</span>
            </a>
        </div>

        {{-- SECCIÓN: Tabla de préstamos --}}
        <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative">
            {{-- Encabezado de tabla --}}
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-list text-[#3f7847] text-3xl"></i> 
                    Historial de Libros Viajeros
                </h2>
            </div>

            {{-- Tabla de datos --}}
            <div class="overflow-x-auto">
                <table class="min-w-full admin-table">
                    <thead>
                        <tr class="bg-[#d8ecd0]">
                            <th class="px-6 py-4 text-left">ID</th>
                            <th class="px-6 py-4 text-left">Habitante</th>
                            <th class="px-6 py-4 text-left">Libro Viajero</th>
                            <th class="px-6 py-4 text-left">Partida</th>
                            <th class="px-6 py-4 text-left">Retorno</th>
                            <th class="px-6 py-4 text-left">Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-[#c3dfb5]">

                        @forelse($prestamos as $prestamo)

                        <tr class="hover:bg-[#e5f0db] transition group">
                            <td class="px-6 py-4">{{ $prestamo->id }}</td>

                            <td class="px-6 py-4">
                                {{ $prestamo->usuario->name ?? 'Desconocido' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $prestamo->libro->titulo ?? 'Desconocido' }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $prestamo->fecha_prestamo ?? 'N/A' }}
                            </td>

                            <td class="px-6 py-4">
                                @if($prestamo->fecha_devolucion)
                                    {{ $prestamo->fecha_devolucion }}
                                @else
                                    Pendiente
                                @endif
                            </td>

                            <td class="px-6 py-4">
                                {{-- ACCIONES: Editar y Eliminar --}}
                                <div class="flex gap-2">
                                    <a href="{{ route('prestamos.edit', $prestamo->id) }}"
                                    class="text-[#2e693b] hover:text-[#1f4a2a]">
                                    Editar
                                    </a>

                                    <form action="{{ route('prestamos.destroy', $prestamo->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('¿Eliminar préstamo?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="text-red-600">
                                            Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>

                        @empty
                        {{-- Mensaje cuando no hay datos --}}
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-[#5b8c5a]">
                                No hay préstamos registrados
                            </td>
                        </tr>
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection