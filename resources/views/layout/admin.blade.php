<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Biblioteca del Bosque Encantado - Admin')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Fuentes personalizadas -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
    <style>
        /* ===== VARIABLES DEL BOSQUE (ADMIN) ===== */
        :root {
            --verde-oscuro: #1a3b23;
            --verde-bosque: #23552e;
            --verde-guardia: #2f6a3b;
            --verde-musgo-admin: #3f7847;
            --verde-hoja-admin: #5b9c5a;
            --verde-sutil: #7fb17a;
            --verde-palido-admin: #d8ecd0;
            --verde-crema: #edf7e5;
            --marron-tronco: #5b4c3a;
            --ocre-hojarasca: #b89b7a;
            --dorado-bosque: #c2a15b;
        }

        /* ===== ESTILOS BASE ADMIN ===== */
        body {
            font-family: 'Inter', sans-serif;
            background: #e8f2e0;
            min-height: 100vh;
            position: relative;
        }
        
        .font-story {
            font-family: 'Cormorant Garamond', serif;
        }

        /* ===== FONDO DEL PANEL ===== */
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

        /* ===== SIDEBAR ESTILO CORTEZA DE ÁRBOL ===== */
        .sidebar {
            background: linear-gradient(180deg, #1f4029 0%, #2d5835 100%);
            border-right: 4px solid #5f946b;
            box-shadow: 10px 0 20px -10px rgba(0,0,0,0.3);
            position: relative;
            overflow: hidden;
        }
        
        .sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: radial-gradient(circle at 20% 30%, #3f7847 2px, transparent 2px);
            background-size: 30px 30px;
            opacity: 0.1;
            pointer-events: none;
        }
        
        .sidebar::after {
            content: '🌲🌳🌲';
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
            opacity: 0.1;
            white-space: nowrap;
            letter-spacing: 10px;
        }
        
        /* Enlaces del sidebar */
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 20px;
            color: #d8ecd0;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 30px 8px 30px 8px;
            margin: 4px 12px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .sidebar-link i {
            width: 24px;
            font-size: 1.2rem;
            color: #8bb682;
            transition: all 0.3s;
        }
        
        .sidebar-link:hover {
            background: #3f7847;
            color: white;
            transform: translateX(5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        
        .sidebar-link:hover i {
            color: white;
        }
        
        .sidebar-link.active {
            background: #5b9c5a;
            color: white;
            box-shadow: 0 4px 0 #1f4029;
        }
        
        .sidebar-link.active i {
            color: white;
        }
        
        /* Enlace de salir (color especial) */
        .sidebar-link.logout {
            margin-top: 20px;
            border-top: 1px solid #5f946b;
            border-radius: 0;
            color: #f0b3b3;
        }
        
        .sidebar-link.logout:hover {
            background: #b85c5c;
            color: white;
        }
        
        .sidebar-link.logout:hover i {
            color: white;
        }

        /* ===== CONTENIDO PRINCIPAL ===== */
        .main-content {
            flex: 1;
            padding: 20px;
            overflow-x: hidden;
        }

        /* ===== TARJETAS DEL ADMIN ===== */
        .admin-card {
            background: rgba(255, 255, 250, 0.9);
            backdrop-filter: blur(4px);
            border: 1px solid var(--verde-sutil);
            border-radius: 30px 8px 30px 8px;
            box-shadow: 0 8px 16px -8px #1a3b23, 0 0 0 1px #b7d6a5 inset;
            transition: all 0.3s ease;
        }
        
        .book-card {
            background: rgba(250, 250, 240, 0.9);
            backdrop-filter: blur(2px);
            border: 1px solid #98b696;
            border-radius: 30px 8px 30px 8px;
            box-shadow: 0 8px 16px -8px #2d4b2d;
            transition: transform 0.2s;
        }
        
        .book-card:hover {
            transform: translateY(-4px);
            border-color: #6a9c7a;
            box-shadow: 0 16px 24px -10px #1f3f2a;
        }

        /* ===== FORMULARIOS ===== */
        .form-card {
            background: rgba(250, 250, 240, 0.95);
            border: 2px solid var(--verde-sutil);
            border-radius: 40px 12px 40px 12px;
            box-shadow: 0 20px 30px -15px #1f4029;
        }

        /* ===== BADGES ===== */
        .badge {
            padding: 0.25rem 1rem;
            border-radius: 30px 4px 30px 4px;
            font-size: 0.75rem;
            font-weight: 600;
            font-family: 'Cormorant Garamond', serif;
        }
        
        .badge-success {
            background: #d8ecd0;
            color: #1f4029;
            border: 1px solid #5b9c5a;
        }
        
        .badge-warning {
            background: #f5e6d3;
            color: #8b5a2b;
            border: 1px solid #c2a15b;
        }

        /* ===== ICONOS DE SPARKLES ===== */
        .fa-sparkles {
            font-size: 0.8em;
            opacity: 0.7;
        }

        /* ===== MEJORAS EN FORM-INPUT ===== */
        .form-input {
            transition: all 0.3s ease;
        }

        .form-input:focus {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -10px #1f4a2a;
        }

        /* ===== ANIMACIONES ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        .fa-leaf {
            animation: float 3s ease-in-out infinite;
        }

        .fa-tree {
            animation: float 4s ease-in-out infinite;
            animation-delay: 1s;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .sidebar {
                width: 80px;
            }
            
            .sidebar-link span {
                display: none;
            }
            
            .sidebar-link i {
                width: auto;
                font-size: 1.5rem;
                margin: 0 auto;
            }
            
            .sidebar-link {
                justify-content: center;
                padding: 15px 0;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="antialiased">
    <div class="flex min-h-screen">
        <!-- ===== SIDEBAR (PANEL LATERAL IZQUIERDO) ===== -->
        <aside class="sidebar w-64 flex-shrink-0 relative z-20">
            <!-- Logo del bosque -->
            <div class="p-6 text-center border-b border-[#5f946b]">
                <div class="w-16 h-16 bg-[#5b9c5a] rounded-full mx-auto mb-3 flex items-center justify-center shadow-lg border-2 border-[#b7d6a5]">
                    <span class="text-3xl font-story italic font-bold text-[#e9f3d8]">📚</span>
                </div>
                <h2 class="font-story text-xl font-bold text-[#eafada]">Bosque<br>Encantado</h2>
                <p class="text-xs text-[#8bb682] mt-1">Guardián</p>
            </div>
            
            <!-- Menú de navegación -->
            <nav class="mt-8">
                <a href="{{ route('home') }}" class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                    <i class="fa-solid fa-tree"></i>
                    <span>Inicio</span>
                </a>
                
                <a href="{{ route('usuarios.index') }}" class="sidebar-link {{ request()->routeIs('usuarios*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users"></i>
                    <span>Usuarios</span>
                </a>
                
                <a href="#" class="sidebar-link {{ request()->routeIs('libros*') ? 'active' : '' }}">
                    <i class="fa-solid fa-book"></i>
                    <span>Libros</span>
                </a>

                <a href="{{ route('categorias.index')}}" class="sidebar-link">
                    <i class="fa-tags fa-users"></i>
                    <span>Categorias</span>
                </a>
                
                <a href="{{ route('prestamos.index') }}" class="sidebar-link">
                    <i class="fa-solid fa-exchange-alt"></i>
                    <span>Préstamos</span>
                </a>
                
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-chart-line"></i>
                    <span>Reportes</span>
                </a>

                
                <a href="#" class="sidebar-link">
                    <i class="fa-solid fa-gear"></i>
                    <span>Configuración</span>
                </a>
                
                <!-- Salir (destacado) -->
                <a href="{{ route('logout') }}" class="sidebar-link logout">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Salir del bosque</span>
                </a>
            </nav>
            
            <!-- Versión -->
            <div class="absolute bottom-4 left-0 right-0 text-center">
                <p class="text-xs text-[#5f946b]">Grimorio v2.0</p>
            </div>
        </aside>

        <!-- ===== CONTENIDO PRINCIPAL CON TÍTULO ARRIBA ===== -->
        <main class="main-content">
            <!-- Header con título de la página -->
            <header class="mb-8">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="font-story text-3xl md:text-4xl font-bold text-[#1f4a2a]">
                            @yield('page-title', 'Panel del Guardián')
                        </h1>
                        <p class="text-[#5b8c5a] text-sm mt-1">
                            @yield('page-description', 'Administra el bosque de libros')
                        </p>
                    </div>
                    
                    <!-- Info del usuario -->
                    <div class="flex items-center gap-4 bg-white/50 backdrop-blur-sm px-4 py-2 rounded-full border border-[#98b696]">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-[#3f7847] rounded-full flex items-center justify-center text-white">
                                <i class="fa-solid fa-leaf"></i>
                            </div>
                            <span class="text-sm text-[#1f4029] hidden sm:block">
                                {{ Auth::user()->name ?? 'Guardián' }}
                            </span>
                        </div>
                    </div>
                </div>
            </header>

            <!-- ===== MENSAJES FLASH GLOBALES (AGREGADOS AQUÍ) ===== -->
            @if(session('success'))
                <div class="mx-4 sm:mx-0 mb-6 p-4 bg-[#d8ecd0] border border-[#5b9c5a] text-[#1f4a2a] rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-leaf text-[#3f7847]"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if(session('error'))
                <div class="mx-4 sm:mx-0 mb-6 p-4 bg-[#f8e1e1] border border-[#b85c5c] text-[#b85c5c] rounded-xl flex items-center gap-2">
                    <i class="fa-solid fa-exclamation-circle"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            <!-- Contenido específico de cada página -->
            @yield('content')
        </main>
    </div>
    
    @stack('scripts')
</body>
</html>