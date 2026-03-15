@extends('layout.admin')

@section('page-title', 'Nueva Categoría')
@section('page-description', 'Agrega una nueva categoría al catálogo del bosque')

@section('content')
{{-- PÁGINA: Admin - Crear nueva categoría --}}
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8">
        {{-- SECCIÓN: Encabezado de página --}}
        <div class="mb-8 relative">
            <div class="absolute -top-4 -left-4 w-32 h-32 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <h1 class="font-story text-4xl md:text-5xl font-bold text-[#1f4a2a] mb-3 relative flex items-center gap-3">
                <span class="text-5xl">🌿</span> 
                <span>Nueva Categoría</span>
            </h1>
            <p class="text-[#2d5a36] text-base max-w-3xl leading-relaxed pl-2">
                Agrega una nueva categoría al catálogo del bosque encantado
            </p>
        </div>

        {{-- SECCIÓN: Formulario de creación --}}
        <div class="form-card overflow-hidden max-w-2xl mx-auto">
            {{-- Encabezado del formulario --}}
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl font-bold text-[#1a4524] flex items-center gap-2">
                    <i class="fa-solid fa-tag text-[#3f7847]"></i> 
                    <span>Detalles de la categoría</span>
                </h2>
                <p class="text-[#34633e] text-sm mt-1">
                    <i class="fa-solid fa-leaf mr-1 text-[#8bb682]"></i>
                    Completa los campos para crear una nueva categoría
                </p>
            </div>

            {{-- FORMULARIO: Crear categoría --}}
            <form action="{{ route('categorias.store') }}" method="POST" class="p-8">
                @csrf
                
                {{-- Campo: Nombre de categoría --}}
                <div class="mb-8">
                    <label for="nombre" class="form-label flex items-center gap-2">
                        <i class="fa-solid fa-pen-fancy text-[#3f7847]"></i>
                        Nombre de la categoría:
                    </label>
                    <div class="relative">
                        <i class="fa-solid fa-tag absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a] text-lg"></i>
                        <input type="text"
                            name="nombre"
                            id="nombre"
                            class="form-input pl-12 pr-4 py-4 text-lg" 
                            placeholder="Ej. Fantasía, Ciencia Ficción, Terror Cósmico..." 
                            required
                            value="{{ old('nombre') }}">
                    </div>
                    {{-- Mostrar error de validación --}}
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                    
                    <p class="text-xs text-[#8bb682] mt-3 flex items-center gap-2">
                        <i class="fa-solid fa-info-circle"></i>
                        El nombre debe ser único y descriptivo
                    </p>
                </div>

                {{-- DECORACIÓN: Separador visual --}}
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-[#c3dfb5]"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="bg-[#fafff2] px-6 py-2 rounded-full text-sm text-[#5b8c5a] font-story border border-[#b7d6a5]">
                            <i class="fa-solid fa-leaf mr-2"></i>
                            <i class="fa-solid fa-leaf mr-2"></i>
                            <i class="fa-solid fa-leaf"></i>
                        </span>
                    </div>
                </div>

                {{-- SECCIÓN: Botones de acción --}}
                <div class="flex items-center justify-between gap-4 mt-8">
                    {{-- Botón: Guardar --}}
                    <button type="submit" class="btn-primary flex-1 flex items-center justify-center gap-3 py-4 text-lg">
                        <i class="fa-solid fa-save"></i>
                        <span>Guardar categoría</span>
                        <i class="fa-solid fa-sparkles opacity-70"></i>
                    </button>
                    
                    {{-- Botón: Cancelar (volver al listado) --}}
                    <a href="{{ route('categorias.index') }}" 
                    class="bg-white hover:bg-gray-50 text-[#5b8c5a] border-2 border-[#c3dfb5] px-8 py-4 rounded-full font-story flex items-center gap-2 transition-all hover:border-[#b85c5c] hover:text-[#b85c5c] group">
                        <i class="fa-solid fa-times group-hover:rotate-90 transition-transform"></i>
                        <span>Cancelar</span>
                    </a>
                </div>
            </form>
            
            {{-- DECORACIÓN: Sello de hoja --}}
            <div class="absolute bottom-4 right-4 opacity-10 pointer-events-none">
                <i class="fa-solid fa-leaf text-6xl text-[#1f4a2a] rotate-12"></i>
            </div>
        </div>

        {{-- SECCIÓN: Mensaje inspirador --}}
        <div class="mt-8 text-center">
            <p class="text-sm text-[#8bb682] italic font-story">
                <i class="fa-solid fa-quote-left mr-2 opacity-50"></i>
                Cada categoría es un nuevo sendero en el bosque de historias
                <i class="fa-solid fa-quote-right ml-2 opacity-50"></i>
            </p>
            <div class="flex justify-center gap-2 mt-3 text-[#b7d6a5]">
                <i class="fa-solid fa-tree"></i>
                <i class="fa-solid fa-tree"></i>
                <i class="fa-solid fa-tree"></i>
            </div>
        </div>
    </div>
</div>
@endsection