@extends('layout.admin')

@section('page-title', '✨ El Retorno del Libro Viajero ✨')
@section('page-description', 'Modifica el viaje del libro que regresa a nuestro claro')

@section('content')
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8">
        <!-- Header con estilo del bosque -->
        <div class="mb-12 relative">
            <div class="absolute -top-4 -left-4 w-40 h-40 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#8bb682]/20 rounded-full blur-2xl"></div>
            
            <h1 class="font-story text-5xl md:text-6xl lg:text-7xl font-bold text-[#1f4a2a] mb-4 relative leading-tight">
                <span class="inline-block mr-3 transform hover:rotate-12 transition-transform duration-300">✍️</span> 
                El <span class="relative">
                    Pergamino
                    <span class="absolute -bottom-2 left-0 w-full h-2 bg-[#b7d6a5]/30 rounded-full blur-sm"></span>
                </span>
                <br>del Retorno
            </h1>
            
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">✧</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">Modifica el viaje del libro que regresa a nuestro claro
                    Cada registro es una historia que se escribe en el gran libro del bosque. Ajusta las fechas del periplo y los caminantes que lo llevaron.</span>
                </p>
            </div>
            
            <div class="flex gap-3 mt-4 text-[#8bb682]">
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <span class="text-xs text-[#5b8c5a] mx-2">✦</span>
                <i class="fa-solid fa-feather text-sm"></i>
                <i class="fa-solid fa-feather text-sm"></i>
                <i class="fa-solid fa-feather text-sm"></i>
            </div>
        </div>

        <!-- Tarjeta principal estilo form-card -->
        <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative max-w-2xl mx-auto">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#3f7847] via-[#8bb682] to-[#3f7847]"></div>
            
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-feather text-[#3f7847] text-3xl"></i> 
                    <span>Editar el Viaje</span>
                </h2>
                <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-leaf text-[#8bb682]"></i>
                    Ajusta los detalles del libro viajero
                </p>
            </div>

            <div class="p-6">
                <form action="{{ route('prestamos.update', $prestamo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Habitante -->
                    <div class="mb-6">
                        <label class="form-label flex items-center gap-2 mb-3">
                            <i class="fa-solid fa-user text-[#3f7847]"></i>
                            Caminante del bosque
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-leaf absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <select name="usuario_id" class="form-input pl-12 appearance-none bg-white cursor-pointer" required>
                                <option value="">-- Elige un habitante --</option>
                                @foreach($usuarios as $usuario)
                                    <option value="{{ $usuario->id }}" {{ $prestamo->usuario_id == $usuario->id ? 'selected' : '' }}>
                                        🧙 {{ $usuario->name }} (ID: {{ $usuario->id }})
                                    </option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-[#5b8c5a] pointer-events-none"></i>
                        </div>
                    </div>

                    <!-- Libro Viajero -->
                    <div class="mb-6">
                        <label class="form-label flex items-center gap-2 mb-3">
                            <i class="fa-solid fa-book-open text-[#3f7847]"></i>
                            Grimorio viajero
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <select name="libro_id" class="form-input pl-12 appearance-none bg-white cursor-pointer" required>
                                <option value="">-- Elige un grimorio --</option>
                                @foreach($libros as $libro)
                                    <option value="{{ $libro->id }}" {{ $prestamo->libro_id == $libro->id ? 'selected' : '' }} 
                                        @if($libro->estatus == 'I' && $prestamo->libro_id != $libro->id) disabled @endif>
                                        📖 {{ $libro->nombre }} - ✍️ {{ $libro->autor }} 
                                        @if($libro->estatus == 'I') (En viaje) @endif
                                    </option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-[#5b8c5a] pointer-events-none"></i>
                        </div>
                        <p class="text-xs text-[#8bb682] mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-info-circle"></i>
                            Los grimorios que ya emprendieron viaje aparecen deshabilitados
                        </p>
                    </div>

                    <!-- Fecha de Partida -->
                    <div class="mb-6">
                        <label class="form-label flex items-center gap-2 mb-3">
                            <i class="fa-solid fa-calendar-day text-[#3f7847]"></i>
                            Fecha de partida
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-calendar-alt absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <input type="datetime-local" name="fecha_prestamo" 
                                value="{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('Y-m-d\TH:i') }}"
                                class="form-input pl-12" required>
                        </div>
                    </div>

                    <!-- Fecha de Retorno -->
                    <div class="mb-8">
                        <label class="form-label flex items-center gap-2 mb-3">
                            <i class="fa-solid fa-calendar-check text-[#3f7847]"></i>
                            Fecha de retorno
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-rotate-left absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <input type="datetime-local" name="fecha_devolucion" 
                                value="{{ $prestamo->fecha_devolucion ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('Y-m-d\TH:i') : '' }}"
                                class="form-input pl-12">
                        </div>
                        <p class="text-xs text-[#8bb682] mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-feather"></i>
                            Dejar vacío si el grimorio aún no ha regresado al claro
                        </p>
                    </div>

                    <!-- Separador decorativo -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-[#c3dfb5]"></div>
                        </div>
                        <div class="relative flex justify-center">
                            <span class="bg-[#fafff2] px-6 py-2 rounded-full text-sm text-[#5b8c5a] font-story border border-[#b7d6a5]">
                                <i class="fa-solid fa-leaf mr-2"></i>
                                <i class="fa-solid fa-feather mr-2"></i>
                                <i class="fa-solid fa-leaf"></i>
                            </span>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col sm:flex-row justify-end gap-4">
                        <a href="{{ route('prestamos.index') }}" 
                           class="btn-secondary flex items-center justify-center gap-2 py-3 px-6">
                            <i class="fa-solid fa-times"></i>
                            Cancelar viaje
                        </a>
                        
                        <button type="submit" 
                                class="btn-primary flex items-center justify-center gap-2 py-3 px-6">
                            <i class="fa-solid fa-save"></i>
                            Registrar retorno
                            <i class="fa-solid fa-sparkles opacity-70"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Sello decorativo -->
            <div class="absolute bottom-4 right-4 opacity-10 pointer-events-none">
                <i class="fa-solid fa-tree text-6xl text-[#1f4a2a] rotate-12"></i>
            </div>
        </div>

        <!-- Mensaje inspirador -->
        <div class="mt-8 text-center">
            <div class="flex justify-center gap-3 text-[#b7d6a5]">
                <i class="fa-solid fa-tree"></i>
                <i class="fa-solid fa-book-open"></i>
                <i class="fa-solid fa-feather"></i>
                <i class="fa-solid fa-tree"></i>
            </div>
            <p class="text-sm text-[#8bb682] italic font-story mt-3">
                <i class="fa-solid fa-quote-left mr-2 opacity-50"></i>
                Cada libro que regresa trae consigo nuevas historias por contar
                <i class="fa-solid fa-quote-right ml-2 opacity-50"></i>
            </p>
        </div>
    </div>
</div>
@endsection