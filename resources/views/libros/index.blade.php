<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>🌿 Grimorio de Libros - Biblioteca del Bosque Encantado</title>
    
    {{-- CSS: Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>
    
    {{-- ICONOS: Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    {{-- FUENTES: Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        /* ===== VARIABLES DEL BOSQUE ===== */
        :root {
            --verde-oscuro: #1a3b23;
            --verde-bosque: #23552e;
            --verde-hoja: #3f7847;
            --verde-claro: #5b9c5a;
            --verde-sutil: #8bb682;
            --verde-palido: #d8ecd0;
            --verde-crema: #fafff2;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #e8f2e0;
            min-height: 100vh;
            position: relative;
        }
        
        .font-story {
            font-family: 'Cormorant Garamond', serif;
        }

        /* ===== FONDO DEL BOSQUE ===== */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M30 0 L30 60 M0 30 L60 30" stroke="%2390b883" stroke-width="0.5" opacity="0.1"/%3E%3C/svg%3E');
            background-size: 60px 60px;
            opacity: 0.2;
            z-index: -2;
        }

        /* ===== TARJETA ESTILO PERGAMINO MEJORADA ===== */
        .form-card {
            background: rgba(250, 250, 240, 0.95);
            backdrop-filter: blur(4px);
            border: 2px solid var(--verde-sutil);
            border-radius: 40px 12px 40px 12px;
            box-shadow: 0 20px 30px -15px #1f4029, 0 0 0 1px #b7d6a5 inset;
            position: relative;
            overflow: hidden;
        }
        
        .form-card::before {
            content: '🌿';
            position: absolute;
            top: -10px;
            left: -10px;
            font-size: 40px;
            opacity: 0.1;
            transform: rotate(-15deg);
            pointer-events: none;
        }
        
        .form-card::after {
            content: '🍂';
            position: absolute;
            bottom: -10px;
            right: -10px;
            font-size: 40px;
            opacity: 0.1;
            transform: rotate(15deg);
            pointer-events: none;
        }

        /* ===== TABLA ESTILO BOSQUE MEJORADA ===== */
        .table-container {
            background: rgba(250, 250, 240, 0.95);
            border: 2px solid var(--verde-sutil);
            border-radius: 40px 12px 40px 12px;
            box-shadow: 0 20px 30px -15px #1f4029, 0 0 0 1px #b7d6a5 inset;
            overflow: hidden;
        }
        
        .admin-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        
        .admin-table th {
            background: #d8ecd0;
            color: #1f4029;
            font-family: 'Cormorant Garamond', serif;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
            padding: 1rem 1.5rem;
            border-bottom: 2px solid #8bb682;
            text-align: left;
        }
        
        .admin-table td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #c3dfb5;
            color: #2d5a36;
        }
        
        .admin-table tr:last-child td {
            border-bottom: none;
        }
        
        .admin-table tbody tr:hover {
            background: rgba(200, 225, 190, 0.3);
            transition: background 0.3s ease;
        }

        /* ===== BOTONES MEJORADOS ===== */
        .btn-primary {
            background: #3f7847;
            border: 1px solid #9bcf98;
            color: #f6ffe7;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 40px 10px 40px 10px;
            box-shadow: 0 5px 0 #1b4823, 0 6px 12px #2e6137;
            transition: all 0.1s ease-out;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        
        .btn-primary:hover {
            background: #4c8f55;
            transform: translateY(-2px);
            box-shadow: 0 7px 0 #1b4823, 0 10px 18px #2a5b33;
            color: white;
        }

        .btn-edit {
            color: #2e693b;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            border-radius: 30px 4px 30px 4px;
            background: rgba(46, 105, 59, 0.1);
            border: 1px solid transparent;
        }
        
        .btn-edit:hover {
            color: #1f4a2a;
            background: rgba(46, 105, 59, 0.2);
            border-color: #2e693b;
            transform: translateY(-1px);
        }
        
        .btn-delete {
            color: #b85c5c;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.25rem 0.75rem;
            border-radius: 30px 4px 30px 4px;
            background: rgba(184, 92, 92, 0.1);
            border: 1px solid transparent;
        }
        
        .btn-delete:hover {
            color: #a04545;
            background: rgba(184, 92, 92, 0.2);
            border-color: #b85c5c;
            transform: translateY(-1px);
        }

        /* ===== BADGES ===== */
        .badge {
            padding: 0.25rem 1rem;
            border-radius: 30px 4px 30px 4px;
            font-size: 0.75rem;
            font-weight: 600;
            font-family: 'Cormorant Garamond', serif;
            display: inline-block;
        }
        
        .badge-categoria {
            background: #d8ecd0;
            color: #1f4029;
            border: 1px solid #5b9c5a;
        }

        /* ===== ANIMACIONES ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        .fa-leaf, .fa-tree, .fa-book-open {
            animation: float 3s ease-in-out infinite;
        }
        
        .fa-tree {
            animation-delay: 1s;
        }
        
        .fa-book-open {
            animation-delay: 2s;
        }
    </style>
</head>
<body class="antialiased">
    <div class="container mx-auto px-4 py-12 max-w-7xl relative">
        {{-- DECORACIÓN: Hojas flotantes --}}
        <div class="fixed top-20 left-10 text-4xl opacity-10 pointer-events-none animate-pulse">🌿</div>
        <div class="fixed bottom-20 right-10 text-4xl opacity-10 pointer-events-none animate-pulse">🍂</div>
        <div class="fixed top-40 right-20 text-4xl opacity-10 pointer-events-none animate-pulse">📖</div>
        
        {{-- SECCIÓN: Encabezado principal --}}
        <div class="mb-12 relative">
            <div class="absolute -top-4 -left-4 w-40 h-40 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#8bb682]/20 rounded-full blur-2xl"></div>
            
            <h1 class="font-story text-5xl md:text-6xl lg:text-7xl font-bold text-[#1f4a2a] mb-4 relative leading-tight">
                <span class="inline-block mr-3 transform hover:rotate-12 transition-transform duration-300">📜</span> 
                El Gran <span class="relative">
                    Grimorio
                    <span class="absolute -bottom-2 left-0 w-full h-2 bg-[#b7d6a5]/30 rounded-full blur-sm"></span>
                </span>
            </h1>
            
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">✧</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">Lista completa de ejemplares que habitan en nuestro claro encantado. 
                    Cada libro es un árbol que guarda historias ancestrales esperando ser descubiertas por los lectores del bosque.</span>
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

        {{-- SECCIÓN: Botón de acción --}}
        <div class="mb-8 flex justify-end">
            <a href="{{ route('libros.create') }}" 
               class="group relative bg-[#3f7847] hover:bg-[#4c8f55] text-white px-8 py-4 rounded-full font-story flex items-center gap-3 border-2 border-[#9bcf98] shadow-xl transition-all hover:shadow-2xl hover:-translate-y-1">
                <span class="absolute -left-2 -top-2 text-lg opacity-50 group-hover:opacity-100 transition">📖</span>
                <i class="fa-solid fa-plus bg-white/20 p-2 rounded-full"></i>
                <span class="text-lg">Escribir nuevo grimorio</span>
                <i class="fa-solid fa-feather opacity-70 group-hover:opacity-100 transition"></i>
            </a>
        </div>

        {{-- SECCIÓN: Tabla de libros --}}
        <div class="table-container border-2 border-[#8bb682] shadow-2xl relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#3f7847] via-[#8bb682] to-[#3f7847]"></div>
            
            {{-- Encabezado de tabla --}}
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-book-skull text-[#3f7847] text-3xl"></i> 
                    <span>Los Pergaminos del Claro</span>
                </h2>
                <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-feather text-[#8bb682]"></i>
                    Todos los ejemplares mágicos que resguardamos en nuestra biblioteca
                </p>
            </div>

            {{-- Tabla de datos --}}
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr class="bg-[#d8ecd0]">
                            <th class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-heading text-[#3f7847]"></i>
                                    <span>Título del libro</span>
                                </div>
                            </th>
                            <th class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-user-pen text-[#3f7847]"></i>
                                    <span>Autor del pergamino</span>
                                </div>
                            </th>
                            <th class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-barcode text-[#3f7847]"></i>
                                    <span>ISBN (Número mágico)</span>
                                </div>
                            </th>
                            <th class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-building text-[#3f7847]"></i>
                                    <span>Editorial</span>
                                </div>
                            </th>
                            <th class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-tags text-[#3f7847]"></i>
                                    <span>Categoría</span>
                                </div>
                            </th>
                            <th class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-wand-sparkles text-[#3f7847]"></i>
                                    <span>Acciones</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($libros as $libro)
                            <tr class="hover:bg-[#e5f0db] transition group">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-book-open text-[#8bb682] group-hover:text-[#3f7847] transition"></i>
                                        <span class="font-medium text-[#1f4a2a]">{{ $libro->nombre }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <i class="fa-solid fa-feather text-[#8bb682] text-xs"></i>
                                        {{ $libro->autor }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="font-mono text-xs bg-white/50 px-2 py-1 rounded-full border border-[#c3dfb5]">
                                        {{ $libro->isbn }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $libro->editorial }}</td>
                                <td class="px-6 py-4">
                                    <span class="badge badge-categoria flex items-center gap-1 w-fit">
                                        <i class="fa-solid fa-tag text-[#5b9c5a] text-xs"></i>
                                        {{ $libro->categoria->nombre ?? 'Sin categoría' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    {{-- ACCIONES: Editar y Eliminar --}}
                                    <div class="flex gap-2">
                                        <a href="{{ route('libros.edit', $libro->id) }}" 
                                           class="btn-edit group/edit">
                                            <i class="fa-solid fa-pen-to-square group-hover/edit:rotate-12 transition"></i>
                                            <span>Editar</span>
                                        </a>
                                        
                                        <form action="{{ route('libros.destroy', $libro->id) }}" 
                                              method="POST" 
                                              class="inline"
                                              onsubmit="return confirm('¿Estás seguro de eliminar el libro {{ $libro->nombre }}?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="btn-delete group/delete">
                                                <i class="fa-solid fa-trash group-hover/delete:scale-110 transition"></i>
                                                <span>Eliminar</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            {{-- Mensaje cuando no hay datos --}}
                            <tr>
                                <td colspan="6" class="text-center py-16">
                                    <div class="flex flex-col items-center gap-4 text-[#8bb682]">
                                        <i class="fa-solid fa-tree text-5xl opacity-30"></i>
                                        <p class="font-story text-2xl">El bosque está en silencio...</p>
                                        <p class="text-sm">No hay libros en el catálogo aún</p>
                                        <a href="{{ route('libros.create') }}" class="mt-2 text-[#3f7847] hover:text-[#1f4a2a] underline decoration-dotted flex items-center gap-2">
                                            <i class="fa-solid fa-seedling"></i>
                                            Escribir el primer grimorio
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            {{-- SECCIÓN: Contador y paginación --}}
            @if(isset($libros) && count($libros) > 0)
                <div class="p-4 border-t border-[#c3dfb5] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                    <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                        <p class="text-sm text-[#5b8c5a] flex items-center gap-3 bg-white/50 px-4 py-2 rounded-full border border-[#8bb682]">
                            <i class="fa-solid fa-feather text-[#8bb682]"></i>
                            Mostrando {{ $libros->firstItem() ?? 1 }} - {{ $libros->lastItem() ?? count($libros) }} de {{ $libros->total() ?? count($libros) }} grimorios
                            <i class="fa-solid fa-feather text-[#8bb682]"></i>
                        </p>
                        
                        {{-- PAGINACIÓN --}}
                        @if(isset($libros) && $libros->hasPages())
                            <div class="flex gap-2">
                                {{-- Botón Anterior --}}
                                @if($libros->onFirstPage())
                                    <span class="w-10 h-10 rounded-full border-2 border-[#c3dfb5] text-[#b7d6a5] flex items-center justify-center cursor-not-allowed bg-white/50">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </span>
                                @else
                                    <a href="{{ $libros->previousPageUrl() }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#3f7847] hover:text-white hover:border-[#3f7847] transition-all flex items-center justify-center bg-white shadow-md hover:shadow-xl">
                                        <i class="fa-solid fa-chevron-left"></i>
                                    </a>
                                @endif

                                {{-- Números de página --}}
                                @foreach(range(1, $libros->lastPage()) as $page)
                                    @if($page == $libros->currentPage())
                                        <span class="w-10 h-10 rounded-full bg-[#3f7847] text-white border-2 border-[#9bcf98] flex items-center justify-center font-story font-bold shadow-lg transform scale-110">
                                            {{ $page }}
                                        </span>
                                    @else
                                        <a href="{{ $libros->url($page) }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#e5f0db] hover:border-[#3f7847] transition-all flex items-center justify-center font-story bg-white hover:shadow-md">
                                            {{ $page }}
                                        </a>
                                    @endif
                                @endforeach

                                {{-- Botón Siguiente --}}
                                @if($libros->hasMorePages())
                                    <a href="{{ $libros->nextPageUrl() }}" class="w-10 h-10 rounded-full border-2 border-[#8bb682] text-[#1f4a2a] hover:bg-[#3f7847] hover:text-white hover:border-[#3f7847] transition-all flex items-center justify-center bg-white shadow-md hover:shadow-xl">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </a>
                                @else
                                    <span class="w-10 h-10 rounded-full border-2 border-[#c3dfb5] text-[#b7d6a5] flex items-center justify-center cursor-not-allowed bg-white/50">
                                        <i class="fa-solid fa-chevron-right"></i>
                                    </span>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endif
        </div>

        {{-- SECCIÓN: Mensaje inspirador --}}
        <div class="mt-12 text-center relative">
            <div class="absolute left-1/2 -translate-x-1/2 -top-5 w-24 h-24 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            
            <div class="flex justify-center gap-4 text-[#8bb682] text-2xl mb-4">
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-book-open hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-feather hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
            </div>
            
            <p class="text-base text-[#8bb682] italic font-story max-w-2xl mx-auto">
                <i class="fa-solid fa-quote-left mr-2 opacity-50 text-[#5b8c5a]"></i>
                Los libros son árboles que guardan historias, y cada página es una hoja que susurra secretos al viento
                <i class="fa-solid fa-quote-right ml-2 opacity-50 text-[#5b8c5a]"></i>
            </p>
            
            <div class="flex justify-center gap-1 mt-4 text-[#b7d6a5] text-xs">
                <i class="fa-solid fa-leaf"></i>
                <i class="fa-solid fa-leaf"></i>
                <i class="fa-solid fa-leaf"></i>
                <i class="fa-solid fa-leaf"></i>
                <i class="fa-solid fa-leaf"></i>
            </div>
        </div>
    </div>
</body>
</html>