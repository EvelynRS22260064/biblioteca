@extends('layout.admin')

@section('page-title', 'Editar Categoría')
@section('page-description', 'Modifica los detalles de la categoría del bosque')

@section('content')
{{-- PÁGINA: Admin - Editar categoría --}}
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8">
        {{-- SECCIÓN: Encabezado de página --}}
        <div class="mb-8 relative">
            <div class="absolute -top-4 -left-4 w-32 h-32 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <h1 class="font-story text-4xl md:text-5xl font-bold text-[#1f4a2a] mb-3 relative">
                <span class="inline-block mr-3">🍂</span>
                Editar Categoría
            </h1>
            <p class="text-[#2d5a36] text-base max-w-3xl leading-relaxed">
                Modifica los detalles de la categoría del bosque encantado
            </p>
        </div>

        {{-- SECCIÓN: Formulario de edición --}}
        <div class="form-card overflow-hidden max-w-2xl mx-auto">
            {{-- Encabezado del formulario --}}
            <div class="p-6 border-b border-[#99bF8c]">
                <h2 class="font-story text-2xl font-bold text-[#1a4524] flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square"></i> Editar Categoría
                </h2>
                <p class="text-[#34633e] text-sm">Actualiza el nombre de la categoría en el catálogo</p>
            </div>

            {{-- FORMULARIO: Actualizar categoría --}}
            <form action="{{ route('categorias.update', $categoria->id) }}" method="POST" class="p-6">
                @csrf 
                @method('PUT')

                {{-- Campo: Nombre de categoría --}}
                <div class="mb-6">
                    <label for="nombre" class="form-label">Nombre de la categoría:</label>
                    <div class="relative">
                        <i class="fa-solid fa-tag absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                        <input type="text" 
                               name="nombre" 
                               id="nombre" 
                               value="{{ $categoria->nombre }}" 
                               class="form-input pl-12" 
                               placeholder="Ej. Literatura, Ciencia Ficción, Fantasía..." 
                               required>
                    </div>
                    {{-- Mostrar error de validación --}}
                    @error('nombre')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- SECCIÓN: Botones de acción --}}
                <div class="flex items-center justify-between gap-4 mt-8">
                    {{-- Botón: Actualizar --}}
                    <button type="submit" class="btn-primary flex-1">
                        <i class="fa-solid fa-save mr-2"></i> Actualizar categoría
                    </button>
                    {{-- Botón: Cancelar (volver al listado) --}}
                    <a href="{{ route('categorias.index') }}" 
                       class="btn-admin-secondary flex items-center gap-2 px-6 py-3">
                        <i class="fa-solid fa-times"></i> Cancelar
                    </a>
                </div>
            </form>
        </div>

        {{-- SECCIÓN: Decoración adicional --}}
        <div class="mt-8 text-center">
            <p class="text-sm text-[#8bb682]">
                <i class="fa-solid fa-leaf"></i>
                <i class="fa-solid fa-leaf mx-2"></i>
                <i class="fa-solid fa-leaf"></i>
            </p>
        </div>
    </div>
</div>
@endsection