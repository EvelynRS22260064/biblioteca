@extends('layout.admin')

@section('page-title', '📖 Registrar un Nuevo Viaje de Libro')
@section('page-description', 'Registra el flujo de libros entre los habitantes del bosque')

@section('content')
{{-- PÁGINA: Admin - Buscar usuario para préstamo --}}
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8 max-w-4xl">
        {{-- SECCIÓN: Encabezado principal --}}
        <div class="mb-12 relative">
            <div class="absolute -top-4 -left-4 w-40 h-40 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#8bb682]/20 rounded-full blur-2xl"></div>
            
            <h1 class="font-story text-5xl md:text-6xl lg:text-7xl font-bold text-[#1f4a2a] mb-4 relative leading-tight">
                <span class="inline-block mr-3 transform hover:rotate-12 transition-transform duration-300">📖</span>
                <span class="relative">
                    El Gran
                    <span class="absolute -bottom-2 left-0 w-full h-2 bg-[#b7d6a5]/30 rounded-full blur-sm"></span>
                </span>
                <br>Libro de Préstamos
            </h1>
            
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">✧</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">Registra el flujo de libros entre los habitantes del bosque encantado. 
                    Cada préstamo es un nuevo viaje que emprende un libro hacia otras manos.</span>
                </p>
            </div>
            
            <div class="flex gap-3 mt-4 text-[#8bb682]">
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <span class="text-xs text-[#5b8c5a] mx-2">✦</span>
                <i class="fa-solid fa-book-open text-sm"></i>
                <i class="fa-solid fa-book-open text-sm"></i>
                <i class="fa-solid fa-book-open text-sm"></i>
            </div>
        </div>

        {{-- SECCIÓN: Mensaje de error --}}
        @if(session('error'))
            <div class="mb-6 p-4 bg-[#f8e1e1] border-2 border-[#b85c5c] text-[#b85c5c] rounded-xl flex items-center gap-3 shadow-lg">
                <div class="w-10 h-10 bg-[#b85c5c] rounded-full flex items-center justify-center text-white flex-shrink-0">
                    <i class="fa-solid fa-exclamation-circle"></i>
                </div>
                <span class="flex-1">{{ session('error') }}</span>
                <i class="fa-solid fa-leaf text-[#b85c5c] opacity-50"></i>
            </div>
        @endif

        {{-- SECCIÓN: Formulario de búsqueda --}}
        <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative mb-8">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#3f7847] via-[#8bb682] to-[#3f7847]"></div>
            
            {{-- Encabezado del formulario --}}
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-magnifying-glass text-[#3f7847] text-3xl"></i>
                    <span>El Conjuro de Búsqueda</span>
                </h2>
                <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-leaf text-[#8bb682]"></i>
                    Encuentra al habitante que llevará un libro a su hogar
                </p>
            </div>

            {{-- FORMULARIO: Buscar usuario --}}
            <form action="{{ route('prestamos.buscar_usuario') }}" method="POST" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Campo: ID Usuario --}}
                    <div>
                        <label for="usuario_id" class="form-label flex items-center gap-2">
                            <i class="fa-solid fa-hashtag text-[#3f7847]"></i>
                            Número de Identidad
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-id-card absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <input
                                type="text"
                                id="usuario_id"
                                name="usuario_id"
                                class="form-input w-full pl-12"
                                placeholder="ID del habitante"
                                value="{{ old('usuario_id') }}"
                            >
                        </div>
                    </div>

                    {{-- Campo: Nombre Usuario --}}
                    <div>
                        <label for="usuario_nombre" class="form-label flex items-center gap-2">
                            <i class="fa-solid fa-user text-[#3f7847]"></i>
                            Nombre del Habitante
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-leaf absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <input
                                type="text"
                                id="usuario_nombre"
                                name="usuario_nombre"
                                class="form-input w-full pl-12"
                                placeholder="Nombre del habitante"
                                value="{{ old('usuario_nombre') }}"
                            >
                        </div>
                    </div>
                </div>

                {{-- DECORACIÓN: Separador --}}
                <div class="relative my-8">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-[#c3dfb5]"></div>
                    </div>
                    <div class="relative flex justify-center">
                        <span class="bg-[#fafff2] px-6 py-2 rounded-full text-sm text-[#5b8c5a] font-story border border-[#b7d6a5]">
                            <i class="fa-solid fa-feather mr-2"></i>
                            <i class="fa-solid fa-feather mr-2"></i>
                            <i class="fa-solid fa-feather"></i>
                        </span>
                    </div>
                </div>

                {{-- SECCIÓN: Botones de acción --}}
                <div class="flex flex-col sm:flex-row gap-4">
                    {{-- Botón: Buscar --}}
                    <button
                        type="submit"
                        class="btn-primary flex-1 flex items-center justify-center gap-3 py-4 text-lg"
                    >
                        <i class="fa-solid fa-search"></i>
                        <span>Buscar en el Bosque</span>
                        <i class="fa-solid fa-sparkles opacity-70"></i>
                    </button>

                    {{-- Botón: Crear nuevo préstamo directo --}}
                    <a
                        href="{{ route('prestamos.create') }}"
                        class="group relative bg-white hover:bg-gray-50 text-[#5b8c5a] border-2 border-[#c3dfb5] px-8 py-4 rounded-full font-story flex items-center justify-center gap-2 transition-all hover:border-[#3f7847] hover:text-[#1f4a2a] flex-1"
                    >
                        <i class="fa-solid fa-plus-circle group-hover:rotate-90 transition-transform"></i>
                        <span>Crear Nuevo Préstamo</span>
                    </a>
                </div>
            </form>
            
            {{-- DECORACIÓN: Sello --}}
            <div class="absolute bottom-4 right-4 opacity-10 pointer-events-none">
                <i class="fa-solid fa-book text-6xl text-[#1f4a2a] rotate-12"></i>
            </div>
        </div>

        {{-- SECCIÓN: Resultado de búsqueda --}}
        @isset($usuario)
            <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative">
                <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                    <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                        <i class="fa-solid fa-user-check text-[#3f7847] text-3xl"></i>
                        <span>Habitante Encontrado</span>
                    </h2>
                    <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                        <i class="fa-solid fa-leaf text-[#8bb682]"></i>
                        Los espíritus del bosque han guiado tu búsqueda
                    </p>
                </div>

                <div class="p-8">
                    {{-- Tarjetas de información del usuario --}}
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- ID --}}
                        <div class="bg-[#e5f0db] p-6 rounded-xl border border-[#8bb682] text-center">
                            <i class="fa-solid fa-hashtag text-3xl text-[#3f7847] mb-2"></i>
                            <p class="text-xs text-[#5b8c5a] font-story">Número de Identidad</p>
                            <p class="text-2xl font-bold text-[#1f4a2a]">{{ $usuario->id }}</p>
                        </div>
                        
                        {{-- Nombre --}}
                        <div class="bg-[#e5f0db] p-6 rounded-xl border border-[#8bb682] text-center">
                            <i class="fa-solid fa-user text-3xl text-[#3f7847] mb-2"></i>
                            <p class="text-xs text-[#5b8c5a] font-story">Nombre del Habitante</p>
                            <p class="text-xl font-bold text-[#1f4a2a]">{{ $usuario->name }}</p>
                        </div>
                        
                        {{-- Email --}}
                        <div class="bg-[#e5f0db] p-6 rounded-xl border border-[#8bb682] text-center">
                            <i class="fa-solid fa-envelope text-3xl text-[#3f7847] mb-2"></i>
                            <p class="text-xs text-[#5b8c5a] font-story">Correo Mágico</p>
                            <p class="text-sm font-bold text-[#1f4a2a] break-all">{{ $usuario->email }}</p>
                        </div>
                    </div>
                    
                    {{-- SECCIÓN: Acciones para préstamo --}}
                    <div class="mt-6 flex justify-center">
                        <a href="{{ route('prestamos.create', ['usuario_id' => $usuario->id]) }}"
                        class="btn-primary flex items-center gap-3 py-4 px-8 text-lg">
                            <i class="fa-solid fa-book-open"></i>
                            <span>Registrar Préstamo para este Habitante</span>
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                
                {{-- DECORACIÓN: Sello --}}
                <div class="absolute bottom-4 left-4 opacity-10 pointer-events-none">
                    <i class="fa-solid fa-leaf text-6xl text-[#1f4a2a] -rotate-12"></i>
                </div>
            </div>
        @endisset

        {{-- SECCIÓN: Mensaje inspirador --}}
        <div class="mt-8 text-center relative">
            <div class="absolute left-1/2 -translate-x-1/2 -top-5 w-20 h-20 bg-[#b7d6a5]/20 rounded-full blur-2xl"></div>
            <div class="flex justify-center gap-4 text-[#8bb682] text-xl">
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-book-open hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-arrow-right-arrow-left hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
            </div>
            <p class="text-sm text-[#8bb682] mt-3 italic font-story">
                "Un libro que viaja es un árbol que extiende sus raíces hacia nuevos horizontes"
            </p>
        </div>
    </div>
</div>
@endsection