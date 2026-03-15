@extends('layout.admin')

@section('page-title', '🌿 Los Habitantes del Bosque')
@section('page-description', 'Gestiona los lectores y guardianes del claro encantado')

@section('content')
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8">
        <!-- Header con estilo del bosque MEJORADO -->
        <div class="mb-12 relative">
            <div class="absolute -top-4 -left-4 w-40 h-40 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#8bb682]/20 rounded-full blur-2xl"></div>
            
            <h1 class="font-story text-5xl md:text-6xl lg:text-7xl font-bold text-[#1f4a2a] mb-4 relative leading-tight">
                <span class="inline-block mr-3 transform hover:rotate-12 transition-transform duration-300">👥</span> 
                Los <span class="relative">
                    Habitantes
                    <span class="absolute -bottom-2 left-0 w-full h-2 bg-[#b7d6a5]/30 rounded-full blur-sm"></span>
                </span>
                <br>del Bosque
            </h1>
            
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">✧</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">Gestiona los lectores y guardianes que habitan nuestro claro encantado. 
                    Cada miembro es una parte importante del bosque, cuidando y disfrutando de las historias que resguardamos.</span>
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

        <!-- Botón Crear Usuario MEJORADO -->
        <div class="mb-8 flex justify-end">
            <a href="{{ route('usuarios.create') }}"
            class="group relative bg-[#3f7847] hover:bg-[#4c8f55] text-white px-8 py-4 rounded-full font-story flex items-center gap-3 border-2 border-[#9bcf98] shadow-xl transition-all hover:shadow-2xl hover:-translate-y-1">
                <span class="absolute -left-2 -top-2 text-lg opacity-50 group-hover:opacity-100 transition">🌱</span>
                <i class="fa-solid fa-plus bg-white/20 p-2 rounded-full"></i>
                <span class="text-lg">Nuevo habitante</span>
                <i class="fa-solid fa-seedling opacity-70 group-hover:opacity-100 transition"></i>
            </a>
        </div>

        <!-- Tabla de Usuarios con estilo form-card -->
        <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#3f7847] via-[#8bb682] to-[#3f7847]"></div>
            
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-people-group text-[#3f7847] text-3xl"></i> 
                    <span>El Censo del Claro</span>
                </h2>
                <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-feather text-[#8bb682]"></i>
                    Todos los habitantes registrados en nuestro bosque encantado
                </p>
            </div>

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
                                    <i class="fa-solid fa-user text-[#3f7847]"></i>
                                    <span>Nombre del habitante</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-envelope text-[#3f7847]"></i>
                                    <span>Correo mágico</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-crown text-[#3f7847]"></i>
                                    <span>Tipo de habitante</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-wand-sparkles text-[#3f7847]"></i>
                                    <span>Acciones mágicas</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#c3dfb5]">
                        @forelse($usuarios as $usuario)
                        <tr class="hover:bg-[#e5f0db] transition group">
                            <td class="px-6 py-4">
                                <span class="bg-white px-3 py-1 rounded-full border border-[#8bb682] text-[#1f4a2a] font-medium">
                                    {{ $usuario->id }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-leaf text-[#8bb682] group-hover:text-[#3f7847] transition"></i>
                                    <span class="text-[#2d5a36] font-medium">{{ $usuario->name }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1">
                                    <i class="fa-solid fa-feather text-[#8bb682] text-xs"></i>
                                    <span class="text-[#2d5a36]">{{ $usuario->email }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @if($usuario->tipo_usuario == 'admin')
                                    <span class="badge" style="background: #d8ecd0; color: #1f4029; border: 1px solid #5b9c5a; padding: 0.25rem 1rem; border-radius: 30px 4px 30px 4px; display: inline-flex; align-items: center; gap: 0.25rem;">
                                        <i class="fa-solid fa-crown text-[#5b9c5a] text-xs"></i>
                                        Guardián del bosque
                                    </span>
                                @elseif($usuario->tipo_usuario == 'bibliotecario')
                                    <span class="badge" style="background: #f0e6d2; color: #8b5a2b; border: 1px solid #c2a15b; padding: 0.25rem 1rem; border-radius: 30px 4px 30px 4px; display: inline-flex; align-items: center; gap: 0.25rem;">
                                        <i class="fa-solid fa-feather text-[#c2a15b] text-xs"></i>
                                        Cuidador de libros
                                    </span>
                                @else
                                    <span class="badge" style="background: #e5f0db; color: #2d5a36; border: 1px solid #8bb682; padding: 0.25rem 1rem; border-radius: 30px 4px 30px 4px; display: inline-flex; align-items: center; gap: 0.25rem;">
                                        <i class="fa-solid fa-leaf text-[#8bb682] text-xs"></i>
                                        Lector del bosque
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex gap-2">
                                    <a href="{{ route('usuarios.edit', $usuario->id) }}"
                                    class="group/edit relative text-[#2e693b] hover:text-[#1f4a2a] transition flex items-center gap-1 px-3 py-1 rounded-full hover:bg-white/50 border border-transparent hover:border-[#2e693b]">
                                        <i class="fa-solid fa-pen-to-square group-hover/edit:rotate-12 transition"></i>
                                        <span class="relative">
                                            Editar
                                            <span class="absolute -bottom-1 left-0 w-0 group-hover/edit:w-full h-0.5 bg-[#2e693b] transition-all"></span>
                                        </span>
                                    </a>
                                    
                                    <form action="#"
                                    method="POST"
                                    class="inline"
                                    onsubmit="return confirm('¿Estás seguro de eliminar al habitante {{ $usuario->name }}? Esta acción no se puede deshacer.');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="group/delete relative text-[#b85c5c] hover:text-[#a04545] transition flex items-center gap-1 px-3 py-1 rounded-full hover:bg-white/50 border border-transparent hover:border-[#b85c5c]">
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
                        <tr>
                            <td colspan="5" class="px-6 py-16 text-center">
                                <div class="flex flex-col items-center gap-4 text-[#8bb682]">
                                    <i class="fa-solid fa-tree text-5xl opacity-30"></i>
                                    <p class="font-story text-2xl">El bosque está en silencio...</p>
                                    <p class="text-sm">No hay habitantes registrados aún</p>
                                    <a href="#" class="mt-2 text-[#3f7847] hover:text-[#1f4a2a] underline decoration-dotted flex items-center gap-2">
                                        <i class="fa-solid fa-seedling"></i>
                                        Registrar el primer habitante
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Paginación (si existe) -->
            @if(isset($usuarios) && method_exists($usuarios, 'hasPages') && $usuarios->hasPages())
            <div class="p-6 border-t border-[#99bF8c] bg-gradient-to-b from-[#fafff2] to-[#e5f0db]">
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <p class="text-sm text-[#5b8c5a] font-story flex items-center gap-3 bg-white/50 px-4 py-2 rounded-full border border-[#8bb682]">
                        <i class="fa-solid fa-feather text-[#8bb682]"></i>
                        Mostrando {{ $usuarios->firstItem() ?? 1 }} - {{ $usuarios->lastItem() ?? count($usuarios) }} de {{ $usuarios->total() ?? count($usuarios) }} habitantes
                        <i class="fa-solid fa-feather text-[#8bb682]"></i>
                    </p>
                    
                    <div class="flex gap-2">
                        {{-- Botón Anterior --}}
                        @if($usuarios->onFirstPage())
                            <span class="w-10 h-10 rounded-full border-2 border-[#c3dfb5] text-[#b7d6a5] flex items-center justify-center cursor-not-allowed bg-white/50">
                                <i class="fa-solid fa-chevron-left"></i>
                            </span>
                        @else
                            <a href="{{ $usuarios->previousPageUrl() }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#3f7847] hover:text-white hover:border-[#3f7847] transition-all flex items-center justify-center bg-white shadow-md hover:shadow-xl">
                                <i class="fa-solid fa-chevron-left"></i>
                            </a>
                        @endif

                        {{-- Números de página --}}
                        @foreach(range(1, $usuarios->lastPage()) as $page)
                            @if($page == $usuarios->currentPage())
                                <span class="w-10 h-10 rounded-full bg-[#3f7847] text-white border-2 border-[#9bcf98] flex items-center justify-center font-story font-bold shadow-lg transform scale-110">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $usuarios->url($page) }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#e5f0db] hover:border-[#3f7847] transition-all flex items-center justify-center font-story bg-white hover:shadow-md">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach

                        {{-- Botón Siguiente --}}
                        @if($usuarios->hasMorePages())
                            <a href="{{ $usuarios->nextPageUrl() }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#3f7847] hover:text-white hover:border-[#3f7847] transition-all flex items-center justify-center bg-white shadow-md hover:shadow-xl">
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

        <!-- Decoración del bosque mejorada -->
        <div class="mt-10 text-center relative">
            <div class="absolute left-1/2 -translate-x-1/2 -top-5 w-20 h-20 bg-[#b7d6a5]/20 rounded-full blur-2xl"></div>
            <div class="flex justify-center gap-4 text-[#8bb682] text-xl">
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-leaf hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-users hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-seedling hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
            </div>
            <p class="text-xs text-[#8bb682] mt-3 italic font-story">
                "Cada habitante es una historia viva en nuestro bosque encantado"
            </p>
        </div>
    </div>
</div>
@endsection