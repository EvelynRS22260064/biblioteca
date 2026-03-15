@extends('layout.admin')

@section('page-title', '🌿 El Ritual del Préstamo')
@section('page-description', 'Entrega un libro a un habitante del bosque')

@section('content')
{{-- PÁGINA: Admin - Crear préstamo (usuario seleccionado) --}}
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8">
        {{-- SECCIÓN: Encabezado principal --}}
        <div class="mb-12 relative">
            <div class="absolute -top-4 -left-4 w-40 h-40 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#8bb682]/20 rounded-full blur-2xl"></div>
            
            {{-- Título H1 diferente al page-title --}}
            <h1 class="font-story text-5xl md:text-6xl lg:text-7xl font-bold text-[#1f4a2a] mb-4 relative leading-tight">
                <span class="inline-block mr-3 transform hover:rotate-12 transition-transform duration-300">📖</span> 
                El <span class="relative">
                    Pergamino
                    <span class="absolute -bottom-2 left-0 w-full h-2 bg-[#b7d6a5]/30 rounded-full blur-sm"></span>
                </span>
                <br>del Préstamo
            </h1>
            
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">✧</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">Entrega un libro a un habitante del bosque</span> y registra el ritual en nuestro gran libro de préstamos. Cada libro prestado es una historia que viaja a un nuevo hogar.
                </p>
            </div>
            
            <div class="flex gap-3 mt-4 text-[#8bb682]">
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <span class="text-xs text-[#5b8c5a] mx-2">✦</span>
                <i class="fa-solid fa-leaf text-sm"></i>
                <i class="fa-solid fa-leaf text-sm"></i>
                <i class="fa-solid fa-leaf text-sm"></i>
            </div>
        </div>

        {{-- SECCIÓN: Tarjeta principal --}}
        <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative max-w-4xl mx-auto">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#3f7847] via-[#8bb682] to-[#3f7847]"></div>
            
            {{-- Encabezado: Información del usuario --}}
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-leaf text-[#3f7847] text-3xl"></i> 
                    <span>Habitante Encontrado</span>
                </h2>
                <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-feather text-[#8bb682]"></i>
                    Estos son los datos del lector que llevará el libro
                </p>
            </div>

            {{-- SECCIÓN: Datos del usuario --}}
            <div class="p-6 bg-[#fafff2] border-b border-[#99bF8c]">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    {{-- Nombre --}}
                    <div class="bg-white p-4 rounded-xl border border-[#8bb682] shadow-md flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#3f7847] rounded-full flex items-center justify-center text-white">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <div>
                            <p class="text-xs text-[#5b8c5a] font-story">Nombre del habitante</p>
                            <p class="text-[#1f4a2a] font-bold">{{ $usuario->name }}</p>
                        </div>
                    </div>
                    
                    {{-- Email --}}
                    <div class="bg-white p-4 rounded-xl border border-[#8bb682] shadow-md flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#5b9c5a] rounded-full flex items-center justify-center text-white">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <p class="text-xs text-[#5b8c5a] font-story">Correo mágico</p>
                            <p class="text-[#1f4a2a] font-bold text-sm">{{ $usuario->email }}</p>
                        </div>
                    </div>
                    
                    {{-- ID --}}
                    <div class="bg-white p-4 rounded-xl border border-[#8bb682] shadow-md flex items-center gap-3">
                        <div class="w-10 h-10 bg-[#8bb682] rounded-full flex items-center justify-center text-white">
                            <i class="fa-solid fa-id-card"></i>
                        </div>
                        <div>
                            <p class="text-xs text-[#5b8c5a] font-story">ID del habitante</p>
                            <p class="text-[#1f4a2a] font-bold">#{{ $usuario->id }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SECCIÓN: Formulario de préstamo --}}
            <div class="p-6">
                <form action="{{ route('prestamos.store') }}" method="POST">
                    @csrf
                    
                    {{-- Campo: Selección de libro --}}
                    <div class="mb-6">
                        <label for="libro_id" class="form-label flex items-center gap-2 mb-3">
                            <i class="fa-solid fa-book-open text-[#3f7847]"></i>
                            Selecciona el grimorio a prestar:
                        </label>
                        
                        <div class="relative">
                            <i class="fa-solid fa-search absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <select name="libro_id" id="libro_id"
                                    class="form-input pl-12 appearance-none bg-white cursor-pointer">
                                <option value="" class="text-gray-400">-- Elige un libro del catálogo --</option>
                                @foreach($libros as $libro)
                                    <option value="{{ $libro->id }}" class="py-2">
                                        📖 {{ $libro->nombre }} - ✍️ {{ $libro->autor }}
                                    </option>
                                @endforeach
                            </select>
                            <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-[#5b8c5a] pointer-events-none"></i>
                        </div>
                        
                        @error('libro_id')
                            <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                                <i class="fa-solid fa-exclamation-circle"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Campo oculto: usuario_id --}}
                    <input type="hidden" name="usuario_id" value="{{ $usuario->id }}">

                    {{-- DECORACIÓN: Separador --}}
                    <div class="relative my-8">
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

                    {{-- SECCIÓN: Botones de acción --}}
                    <div class="flex flex-col sm:flex-row justify-end gap-4">
                        {{-- Botón: Cancelar --}}
                        <a href="{{ route('prestamos.index') }}" 
                           class="btn-secondary flex items-center justify-center gap-2 py-3 px-6">
                            <i class="fa-solid fa-times"></i>
                            Cancelar ritual
                        </a>
                        
                        {{-- Botón: Registrar --}}
                        <button type="submit" 
                                class="btn-primary flex items-center justify-center gap-2 py-3 px-6">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                            Registrar Préstamo
                            <i class="fa-solid fa-sparkles opacity-70"></i>
                        </button>
                    </div>
                </form>
            </div>
            
            {{-- DECORACIÓN: Sello --}}
            <div class="absolute bottom-4 right-4 opacity-10 pointer-events-none">
                <i class="fa-solid fa-tree text-6xl text-[#1f4a2a] rotate-12"></i>
            </div>
        </div>

        {{-- SECCIÓN: Mensaje inspirador --}}
        <div class="mt-10 text-center relative">
            <div class="absolute left-1/2 -translate-x-1/2 -top-5 w-20 h-20 bg-[#b7d6a5]/20 rounded-full blur-2xl"></div>
            <div class="flex justify-center gap-4 text-[#8bb682] text-xl">
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-book-open hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-feather hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-leaf hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
            </div>
            <p class="text-sm text-[#8bb682] mt-3 italic font-story max-w-2xl mx-auto">
                <i class="fa-solid fa-quote-left mr-2 opacity-50"></i>
                Un libro prestado es una semilla de conocimiento que florece en otro corazón
                <i class="fa-solid fa-quote-right ml-2 opacity-50"></i>
            </p>
        </div>
    </div>
</div>
@endsection