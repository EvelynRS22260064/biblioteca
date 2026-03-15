{{-- ============================================================= --}}
{{-- PÁGINA: Home / Landing Page - Biblioteca del Bosque Encantado --}}
{{-- UBICACIÓN: resources/views/home.blade.php                     --}}
{{-- PROPÓSITO: Página principal pública con hero y destacados    --}}
{{-- ============================================================= --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Biblioteca del Bosque Encantado' }}</title>

    {{-- FUENTES: Google Fonts y Bunny.net --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
    {{-- ASSETS: Vite (si existe) --}}
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    {{-- ESTILOS: Ambientación boscosa --}}
    <style>
        /* ===== ESTILOS BASE ===== */
        html { scroll-behavior: smooth; }
        
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f7f0;
            min-height: 100vh;
            position: relative;
        }
        
        .font-story {
            font-family: 'Cormorant Garamond', serif;
        }

        /* ===== HEADER ===== */
        .header-vine {
            background: linear-gradient(180deg, #2f5a3a 0%, #4b7b5e 100%);
            box-shadow: 0 4px 10px rgba(30, 60, 30, 0.2);
        }
        
        .hero-glow {
            text-shadow: 2px 2px 8px #2c4a2e, 0 0 20px #b8d9b0;
        }

        /* ===== MENÚ HAMBURGUESA ===== */
        .mobile-menu {
            transition: transform 0.3s ease-in-out, opacity 0.2s;
            transform: scaleY(0);
            transform-origin: top;
            opacity: 0;
            pointer-events: none;
            position: absolute;
            width: 100%;
            left: 0;
            top: 100%;
            background: #edf3e7;
            border-top: 2px solid #3b6e4b;
            box-shadow: 0 12px 20px -8px #2b4633;
            z-index: 50;
        }
        
        .mobile-menu.open {
            transform: scaleY(1);
            opacity: 1;
            pointer-events: auto;
        }
        
        .hamburger-btn {
            background: rgba(255,255,240,0.5);
            border-radius: 12px;
            padding: 0.5rem 0.7rem;
            border: 1px solid #598b6b;
        }

        /* ===== TARJETAS DE LIBROS ===== */
        .book-card {
            background: rgba(250, 250, 240, 0.7);
            backdrop-filter: blur(2px);
            border: 1px solid #98b696;
            box-shadow: 0 8px 16px -8px #2d4b2d;
            transition: transform 0.2s;
        }
        
        .book-card:hover {
            transform: translateY(-4px);
            border-color: #6a9c7a;
            box-shadow: 0 16px 24px -10px #1f3f2a;
        }

        /* ===== FOOTER ===== */
        .footer-moss {
            background: #2b4b31;
            background-image: radial-gradient(circle at 20% 40%, #4a7856 2px, transparent 2px), 
                              radial-gradient(circle at 80% 70%, #5e8b66 1px, transparent 2px);
            background-size: 40px 40px;
        }

        /* ===== IMÁGENES ===== */
        .image-enchant {
            filter: sepia(0.15) hue-rotate(5deg) brightness(1.02);
            border-radius: 20px 4px 20px 4px;
            border: 2px solid #6f936f;
        }
        
        .stock-img {
            object-fit: cover;
            width: 100%;
            height: 100%;
            display: block;
        }
    </style>
</head>
<body class="antialiased text-[#1f3b2c]">

    {{-- ========================================================= --}}
    {{-- HEADER: Barra de navegación con menú hamburguesa        --}}
    {{-- ========================================================= --}}
    <header class="header-vine text-[#f0f7e6] sticky top-0 z-40">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-4 relative">
                
                {{-- Logo + título --}}
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-[#5b8c5a] rounded-full flex items-center justify-center shadow-lg border border-[#b7d6a5]">
                        <span class="text-2xl font-story italic font-bold text-[#e9f3d8]">📖</span>
                    </div>
                    <h1 class="font-story text-2xl md:text-3xl font-semibold tracking-wide drop-shadow-lg">
                        <span class="text-[#dbe9c5]">Bosque</span> 
                        <span class="text-[#c4e0b0]">de los</span> 
                        <span class="text-[#f5ffe1]">Libros</span>
                    </h1>
                </div>

                {{-- Navegación escritorio --}}
                <nav class="hidden sm:flex space-x-8 text-[#f2fbe0] font-medium items-center">
                    <a href="#" class="border-b-2 border-transparent hover:border-[#b5e0a3] px-1 py-1 text-lg transition font-story">Inicio</a>
                    <a href="#" class="border-b-2 border-transparent hover:border-[#b5e0a3] px-1 py-1 text-lg transition font-story">Catálogo</a>
                    <a href="#" class="border-b-2 border-transparent hover:border-[#b5e0a3] px-1 py-1 text-lg transition font-story">El claro</a>
                    <a href="{{ route('login') }}" class="bg-[#3b6743] hover:bg-[#2b5433] px-5 py-2 rounded-full text-[#f1fce2] border border-[#b0d89b] shadow-md transition font-story text-lg">Iniciar sesión</a>
                </nav>

                {{-- Botón hamburguesa (móvil) --}}
                <button id="menuBtn" class="sm:hocus:outline-none sm:hidden hamburger-btn text-[#1d3e25] focus:outline-none" aria-label="Abrir menú">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-8 h-8 text-[#28522b]">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>

                {{-- Menú móvil desplegable --}}
                <div id="mobileMenu" class="mobile-menu sm:hidden">
                    <div class="flex flex-col space-y-4 p-6 text-[#1f4029] text-xl font-story">
                        <a href="#" class="hover:bg-[#c3dfb5] p-3 rounded-xl pl-5 border-l-4 border-transparent hover:border-[#396f45] transition">Inicio</a>
                        <a href="#" class="hover:bg-[#c3dfb5] p-3 rounded-xl pl-5 border-l-4 border-transparent hover:border-[#396f45] transition">Catálogo</a>
                        <a href="#" class="hover:bg-[#c3dfb5] p-3 rounded-xl pl-5 border-l-4 border-transparent hover:border-[#396f45] transition">El claro encantado</a>
                        <a href="{{ route('login') }}" class="bg-[#427a4f] text-[#f7ffe7] p-3 rounded-xl text-center shadow-inner border border-[#9ccf96] mt-2 hover:bg-[#316b3e] transition">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- ========================================================= --}}
    {{-- HERO: Sección principal con imagen de fondo              --}}
    {{-- ========================================================= --}}
    <section class="relative overflow-hidden">
        {{-- Imagen de fondo (Pexels - bosque brumoso) --}}
        <div class="absolute inset-0 z-0">
            <img src="https://images.pexels.com/photos/2387873/pexels-photo-2387873.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" 
                 alt="Bosque encantado con niebla y rayos de sol" 
                 class="w-full h-full object-cover object-center image-enchant"
                 loading="lazy">
            <div class="absolute inset-0 bg-gradient-to-b from-[#1e4028]/70 via-[#2c583a]/50 to-[#367a49]/60"></div>
        </div>
        
        {{-- Contenido del hero --}}
        <div class="relative z-10 max-w-6xl mx-auto px-4 py-20 md:py-28 lg:py-36 text-center text-[#efffdf]">
            <span class="inline-block bg-[#2a6637]/80 backdrop-blur-sm px-6 py-2 rounded-full text-sm tracking-widest border border-[#b1dba9] mb-6 font-story">
                📚  Biblioteca del Susurro Verde  🍃
            </span>
            <h1 class="font-story text-5xl md:text-6xl lg:text-7xl font-bold leading-tight hero-glow">
                Donde los árboles<br>prestan sus historias
            </h1>
            <p class="max-w-2xl mx-auto mt-6 text-lg md:text-xl text-[#e2f2cf] drop-shadow-md bg-[#294f30]/40 p-4 rounded-2xl backdrop-blur-sm">
                Entre raíces y pergaminos, descubre un mundo de fantasía que aguarda entre hojas centenarias. 
                Formalidad de biblioteca, alma de bosque encantado.
            </p>
            
            {{-- Botones de acción --}}
            <div class="mt-10 flex flex-wrap justify-center gap-5">
                <a href="#" class="bg-[#3f7847] hover:bg-[#306637] text-white font-story text-xl px-8 py-4 rounded-full shadow-xl border border-[#b1e0a3] transition flex items-center gap-2">
                    <span>🌿</span> Explorar catálogo mágico
                </a>
                <a href="#" class="bg-[#daeed2]/90 hover:bg-white text-[#1f532b] font-story text-xl px-8 py-4 rounded-full shadow-xl border border-[#91b88d] backdrop-blur-sm transition">
                    📖  Leer junto al fuego
                </a>
            </div>
        </div>

        {{-- Ola decorativa inferior --}}
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-none">
            <svg viewBox="0 0 1200 120" preserveAspectRatio="none" class="relative block w-full h-12 md:h-20 fill-[#ebf5e3] opacity-70">
                <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"></path>
                <path d="M0,0V15.81C13,21.25,27.93,25.58,44.41,28.59c69.58,12.55,138.93,5.22,208.46-6.86,34.79-6.04,70.3-15.42,106-19.27C507.41,1.66,620,34.28,738.82,54.87c68.44,11.94,135.49,10.74,202.31,1.43C1029.15,42.73,1118,14.2,1200,20.72V0Z" opacity=".5"></path>
                <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="fill-[#e1f0d6]"></path>
            </svg>
        </div>
    </section>

    {{-- ========================================================= --}}
    {{-- SECCIÓN DESTACADOS: Libros destacados                    --}}
    {{-- ========================================================= --}}
    <section class="py-16 bg-[#e5f0db] bg-[url('data:image/svg+xml,%3Csvg width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 40L40 0H20L0 20V40Z" fill="%239fc99f" fill-opacity="0.08")'/%3E%3C/svg%3E")]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-story text-5xl text-center text-[#1f4a2a] mb-3">📘  Libros con alma forestal  🍂</h2>
            <p class="text-center text-[#326c41] max-w-2xl mx-auto text-lg mb-12">Obras que susurran secretos entre raíces y ramas — para lectores que buscan magia auténtica.</p>
            
            {{-- Grid de tarjetas --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                
                {{-- Tarjeta 1 --}}
                <div class="book-card rounded-3xl overflow-hidden">
                    <div class="h-56 w-full overflow-hidden">
                        <img class="stock-img image-enchant" src="https://images.pexels.com/photos/2943805/pexels-photo-2943805.jpeg?auto=compress&cs=tinysrgb&w=600" alt="libro abierto en bosque con hojas secas" loading="lazy">
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold tracking-wider text-[#557a4d] bg-[#ddf0ce] px-3 py-1 rounded-full">raíces de conocimiento</span>
                        <h3 class="font-story text-2xl font-bold mt-3 text-[#1b4d24]">El susurro de las hayas</h3>
                        <p class="text-[#3d613f] mt-2">Primera edición ilustrada con acuarelas de hongos y duendes. Una joya de la literatura fantástica.</p>
                        <div class="mt-5 flex justify-between items-center">
                            <span class="text-[#3b7545] font-medium">✦ disponible</span>
                            <a href="#" class="text-[#1d6b2c] hover:text-[#134d1f] font-story font-medium border-b border-dotted border-[#3b7545]">más información →</a>
                        </div>
                    </div>
                </div>

                {{-- Tarjeta 2 --}}
                <div class="book-card rounded-3xl overflow-hidden">
                    <div class="h-56 w-full overflow-hidden">
                        <img class="stock-img image-enchant" src="https://images.pexels.com/photos/159711/books-bookstore-book-reading-159711.jpeg?auto=compress&cs=tinysrgb&w=600" alt="pilas de libros antiguos en madera" loading="lazy">
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold tracking-wider text-[#557a4d] bg-[#ddf0ce] px-3 py-1 rounded-full">polen de tinta</span>
                        <h3 class="font-story text-2xl font-bold mt-3 text-[#1b4d24]">Cuentos del claro lunar</h3>
                        <p class="text-[#3d613f] mt-2">Antología de relatos donde los árboles escriben profecías. Incluye mapa del bosque encantado.</p>
                        <div class="mt-5 flex justify-between items-center">
                            <span class="text-[#3b7545] font-medium">✦ 3 ejemplares</span>
                            <a href="#" class="text-[#1d6b2c] hover:text-[#134d1f] font-story font-medium border-b border-dotted border-[#3b7545]">reservar →</a>
                        </div>
                    </div>
                </div>

                {{-- Tarjeta 3 --}}
                <div class="book-card rounded-3xl overflow-hidden">
                    <div class="h-56 w-full overflow-hidden">
                        <img class="stock-img image-enchant" src="https://images.pexels.com/photos/256450/pexels-photo-256450.jpeg?auto=compress&cs=tinysrgb&w=600" alt="sendero en bosque verde con rayos de sol" loading="lazy">
                    </div>
                    <div class="p-6">
                        <span class="text-xs font-semibold tracking-wider text-[#557a4d] bg-[#ddf0ce] px-3 py-1 rounded-full">guía del caminante</span>
                        <h3 class="font-story text-2xl font-bold mt-3 text-[#1b4d24]">Manual de hongos parlantes</h3>
                        <p class="text-[#3d613f] mt-2">Una guía insólita: micología y hechizos de bibliotecario. Incluye anotaciones al margen.</p>
                        <div class="mt-5 flex justify-between items-center">
                            <span class="text-[#3b7545] font-medium">✦ disponible</span>
                            <a href="#" class="text-[#1d6b2c] hover:text-[#134d1f] font-story font-medium border-b border-dotted border-[#3b7545]">hojear →</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Botón ver catálogo completo --}}
            <div class="text-center mt-12">
                <a href="#" class="inline-flex items-center gap-2 bg-[#467a50] hover:bg-[#35693f] text-[#f4ffea] px-8 py-3 rounded-full font-story text-xl shadow-xl border border-[#bae0aa] transition">
                    <span>🍄</span> Descubrir más libros del bosque
                </a>
            </div>
        </div>
    </section>

    {{-- ========================================================= --}}
    {{-- FOOTER: Pie de página estilo musgo                       --}}
    {{-- ========================================================= --}}
    <footer class="footer-moss text-[#ddf0cf] border-t-4 border-[#5f946b]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                {{-- Columna 1: Logo + esencia --}}
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-3xl">🌲</span>
                        <h3 class="font-story text-2xl font-semibold text-[#eafada]">Bosque de los Libros</h3>
                    </div>
                    <p class="text-[#cbe5bd] text-sm">Biblioteca formal con corazón de bosque encantado. Política de préstamos: devolver antes del próximo solsticio.</p>
                </div>

                {{-- Columna 2: Enlaces navegación --}}
                <div>
                    <h4 class="font-story text-xl mb-3 border-b border-[#70a072] pb-1">Navegar</h4>
                    <ul class="space-y-2 text-[#daf0ca]">
                        <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🍂</span> Inicio</a></li>
                        <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🍃</span> Catálogo</a></li>
                        <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🌿</span> Eventos del claro</a></li>
                        <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>📖</span> Club de lectura</a></li>
                    </ul>
                </div>

                {{-- Columna 3: Acceso a cuenta --}}
                <div>
                    <h4 class="font-story text-xl mb-3 border-b border-[#70a072] pb-1">Acceso</h4>
                    <ul class="space-y-2 text-[#daf0ca]">
                        <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🔐</span> Iniciar sesión</a></li>
                        <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>📌</span> Registro</a></li>
                        <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🪶</span> Mi carnet</a></li>
                    </ul>
                </div>

                {{-- Columna 4: Ubicación fantástica --}}
                <div>
                    <h4 class="font-story text-xl mb-3 border-b border-[#70a072] pb-1">El claro</h4>
                    <address class="not-italic text-[#daf0ca]">
                        <p>🌳 Camino de las Hayas, 7</p>
                        <p>🌲 Bosque de Brocelianda</p>
                        <p class="mt-3">📧 hola@bosqueencantado.biblio</p>
                        <p>🕰️ Abierto durante las horas de luz y luna llena</p>
                    </address>
                </div>
            </div>

            {{-- Copyright --}}
            <div class="border-t border-[#7fad82] mt-8 pt-6 text-center text-sm text-[#c6e2b5]">
                <p>© 2025 · Biblioteca del Bosque Encantado · imágenes de Pexels (licencia gratis) · magia responsiva con vanilla JS y Tailwind</p>
            </div>
        </div>
    </footer>

    {{-- ========================================================= --}}
    {{-- SCRIPT: Menú hamburguesa (vanilla JS)                    --}}
    {{-- ========================================================= --}}
    <script>
        (function() {
            const menuBtn = document.getElementById('menuBtn');
            const mobileMenu = document.getElementById('mobileMenu');

            if (menuBtn && mobileMenu) {
                menuBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    mobileMenu.classList.toggle('open');
                    const expanded = mobileMenu.classList.contains('open');
                    menuBtn.setAttribute('aria-expanded', expanded);
                });

                document.addEventListener('click', function(event) {
                    if (!menuBtn.contains(event.target) && !mobileMenu.contains(event.target)) {
                        mobileMenu.classList.remove('open');
                        menuBtn.setAttribute('aria-expanded', 'false');
                    }
                });

                document.addEventListener('keydown', function(e) {
                    if (e.key === 'Escape' && mobileMenu.classList.contains('open')) {
                        mobileMenu.classList.remove('open');
                        menuBtn.setAttribute('aria-expanded', 'false');
                    }
                });
            }

            if (menuBtn) {
                menuBtn.setAttribute('aria-expanded', 'false');
                menuBtn.setAttribute('aria-controls', 'mobileMenu');
            }
        })();
    </script>

    {{-- NOTA: Imágenes de Pexels con licencia gratuita --}}
</body>
</html>