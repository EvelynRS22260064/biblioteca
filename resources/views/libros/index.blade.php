<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Libros - Biblioteca del Bosque Encantado</title>
    
    <!-- Tailwind CSS (en lugar de Bootstrap) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Fuentes personalizadas -->
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

        /* ===== TARJETA ESTILO PERGAMINO ===== */
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

        /* ===== TABLA ESTILO BOSQUE ===== */
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

        /* ===== BOTONES ===== */
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
        
        .fa-leaf, .fa-tree {
            animation: float 3s ease-in-out infinite;
        }
        
        .fa-tree {
            animation-delay: 1s;
        }
    </style>
</head>
<body class="antialiased">
    <div class="container mx-auto px-4 py-12 max-w-6xl relative">
        <!-- Hojas decorativas flotantes -->
        <div class="fixed top-20 left-10 text-4xl opacity-10 pointer-events-none animate-pulse">🌿</div>
        <div class="fixed bottom-20 right-10 text-4xl opacity-10 pointer-events-none animate-pulse">🍂</div>
        
        <!-- Header con estilo del bosque -->
        <div class="mb-8 relative">
            <div class="absolute -top-4 -left-4 w-32 h-32 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <h1 class="font-story text-5xl md:text-6xl font-bold text-[#1f4a2a] mb-3 relative flex items-center gap-3">
                <span class="text-6xl">📚</span> 
                <span>Libros del Bosque</span>
            </h1>
            <p class="text-[#2d5a36] text-lg max-w-2xl leading-relaxed pl-2">
                Explora el catálogo de ejemplares disponibles en el bosque encantado
            </p>
        </div>

        <!-- Botón Nuevo Libro -->
        <div class="mb-8 flex justify-end">
            <a href="{{ route('libros.create') }}" class="btn-primary">
                <i class="fa-solid fa-plus"></i>
                Nuevo Libro
                <i class="fa-solid fa-sparkles opacity-70"></i>
            </a>
        </div>

        <!-- Tabla de libros -->
        <div class="table-container">
            <div class="overflow-x-auto">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th><i class="fa-solid fa-heading mr-2 text-[#3f7847]"></i>Nombre</th>
                            <th><i class="fa-solid fa-barcode mr-2 text-[#3f7847]"></i>ISBN</th>
                            <th><i class="fa-solid fa-user-pen mr-2 text-[#3f7847]"></i>Autor</th>
                            <th><i class="fa-solid fa-building mr-2 text-[#3f7847]"></i>Editorial</th>
                            <th><i class="fa-solid fa-tags mr-2 text-[#3f7847]"></i>Categoría</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($libros as $libro)
                            <tr>
                                <td class="font-medium text-[#1f4a2a]">{{ $libro->nombre }}</td>
                                <td class="font-mono text-sm">{{ $libro->isbn }}</td>
                                <td>{{ $libro->autor }}</td>
                                <td>{{ $libro->editorial }}</td>
                                <td>
                                    <span class="badge badge-categoria">
                                        <i class="fa-solid fa-tag mr-1 text-[#5b9c5a]"></i>
                                        {{ $libro->categoria->nombre ?? 'Sin categoría' }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-12">
                                    <div class="flex flex-col items-center gap-3 text-[#8bb682]">
                                        <i class="fa-solid fa-leaf text-4xl"></i>
                                        <p class="font-story text-lg">No hay libros en el catálogo</p>
                                        <a href="{{ route('libros.create') }}" class="text-[#3f7847] hover:text-[#1f4a2a] underline decoration-dotted">
                                            Agrega el primer libro
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Contador de libros (opcional) -->
            @if(count($libros) > 0)
                <div class="p-4 border-t border-[#c3dfb5] bg-[#f0f7e8]">
                    <p class="text-sm text-[#5b8c5a] flex items-center gap-2">
                        <i class="fa-solid fa-leaf"></i>
                        Mostrando {{ count($libros) }} {{ count($libros) == 1 ? 'libro' : 'libros' }} en el catálogo
                        <i class="fa-solid fa-leaf"></i>
                    </p>
                </div>
            @endif
        </div>

        <!-- Mensaje inspirador -->
        <div class="mt-8 text-center">
            <p class="text-sm text-[#8bb682] italic font-story">
                <i class="fa-solid fa-quote-left mr-2 opacity-50"></i>
                Los libros son árboles que guardan historias
                <i class="fa-solid fa-quote-right ml-2 opacity-50"></i>
            </p>
            <div class="flex justify-center gap-3 mt-3 text-[#b7d6a5]">
                <i class="fa-solid fa-tree"></i>
                <i class="fa-solid fa-book-open"></i>
                <i class="fa-solid fa-tree"></i>
            </div>
        </div>
    </div>
</body>
</html>