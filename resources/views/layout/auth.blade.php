<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title', 'Biblioteca del Bosque Encantado - Acceso')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Fuentes personalizadas -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500&display=swap" rel="stylesheet">
    
    <!-- CSS exclusivo para el layout de autenticación (bosque encantado) -->
    <style>
        /* ===== VARIABLES DEL BOSQUE ===== */
        :root {
            --verde-profundo: #1f4029;
            --verde-hoja: #2d5835;
            --verde-musgo: #3f7847;
            --verde-claro: #5b8c5a;
            --verde-susurro: #8bb682;
            --verde-brillante: #b7d6a5;
            --verde-palido: #e5f0db;
            --marron-corteza: #5d4a36;
            --dorado-atardecer: #b8860b;
            --blanco-pergamino: #fafff2;
        }

        /* ===== ESTILOS BASE ===== */
        body {
            font-family: 'Inter', sans-serif;
            background: #f4f7f0;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        .font-story {
            font-family: 'Cormorant Garamond', serif;
        }

        /* ===== FONDO DE BOSQUE ENCANTADO ===== */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('https://images.pexels.com/photos/2387873/pexels-photo-2387873.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2');
            background-size: cover;
            background-position: center;
            opacity: 0.15;
            z-index: -2;
        }
        
        body::after {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 20% 30%, rgba(60, 100, 70, 0.2) 0%, transparent 50%),
                        radial-gradient(circle at 80% 70%, rgba(40, 80, 50, 0.2) 0%, transparent 50%);
            z-index: -1;
            pointer-events: none;
        }

        /* ===== HERO GLOW (EFECTO MÁGICO) ===== */
        .hero-glow {
            text-shadow: 2px 2px 8px #2c4a2e, 0 0 20px #b8d9b0;
        }

        /* ===== TARJETAS DE FORMULARIO (ESTILO PERGAMINO) ===== */
        .form-card {
            background: rgba(250, 250, 240, 0.95);
            backdrop-filter: blur(8px);
            border: 2px solid var(--verde-susurro);
            box-shadow: 0 20px 30px -15px #1f4029, 
                        0 0 0 1px var(--verde-brillante) inset,
                        0 0 30px rgba(100, 150, 100, 0.3);
            border-radius: 40px 12px 40px 12px;
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .form-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 35px -15px #1f4029, 
                        0 0 0 2px var(--verde-claro) inset,
                        0 0 40px rgba(120, 180, 120, 0.4);
        }
        
        /* Decoración de enredadera para las tarjetas */
        .form-card::before {
            content: '🌿';
            position: absolute;
            top: -10px;
            left: -10px;
            font-size: 24px;
            opacity: 0.3;
            transform: rotate(-15deg);
        }
        
        .form-card::after {
            content: '🍂';
            position: absolute;
            bottom: -10px;
            right: -10px;
            font-size: 24px;
            opacity: 0.3;
            transform: rotate(15deg);
        }

        /* ===== CAMPOS DE ENTRADA (INPUTS) ===== */
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            background: var(--blanco-pergamino);
            border: 1px solid var(--verde-susurro);
            border-radius: 30px 8px 30px 8px;
            color: var(--verde-profundo);
            transition: all 0.2s;
            font-size: 1rem;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--verde-musgo);
            box-shadow: 0 0 0 3px rgba(88, 150, 90, 0.3), 0 0 15px rgba(100, 200, 100, 0.3);
            background: #ffffff;
        }
        
        .form-input::placeholder {
            color: #a8c3a0;
            font-style: italic;
            font-size: 0.9rem;
        }

        /* ===== ETIQUETAS (LABELS) ===== */
        .form-label {
            display: block;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--verde-profundo);
            margin-bottom: 0.3rem;
            margin-left: 0.5rem;
            letter-spacing: 0.5px;
        }

        /* ===== BOTÓN PRINCIPAL (ESTILO MADERA/TIERRA) ===== */
        .btn-primary {
            background: var(--verde-musgo);
            border: 1px solid var(--verde-brillante);
            color: #f6ffe7;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            font-weight: 600;
            padding: 0.8rem 1.5rem;
            border-radius: 40px 10px 40px 10px;
            box-shadow: 0 5px 0 #1b4823, 0 6px 12px #2e6137;
            transition: all 0.1s ease-out;
            width: 100%;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }
        
        .btn-primary:hover {
            background: #4c8f55;
            transform: translateY(-2px);
            box-shadow: 0 7px 0 #1b4823, 0 10px 18px #2a5b33;
        }
        
        .btn-primary:active {
            transform: translateY(5px);
            box-shadow: 0 2px 0 #1b4823, 0 5px 10px #23522b;
        }
        
        /* Efecto de brillo mágico */
        .btn-primary::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -60%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(30deg);
            transition: transform 0.5s;
        }
        
        .btn-primary:hover::after {
            transform: rotate(30deg) translate(20%, 20%);
        }

        /* ===== BOTONES SOCIALES ===== */
        .btn-social {
            padding: 0.6rem 1rem;
            background: white;
            border: 1px solid var(--verde-susurro);
            border-radius: 30px 8px 30px 8px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s;
            color: var(--verde-profundo);
        }
        
        .btn-social:hover {
            background: var(--verde-palido);
            border-color: var(--verde-claro);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(60, 100, 60, 0.2);
        }

        /* ===== CHECKBOX PERSONALIZADO ===== */
        input[type="checkbox"] {
            accent-color: var(--verde-musgo);
            width: 16px;
            height: 16px;
            border-radius: 4px;
            border: 1px solid var(--verde-susurro);
        }

        /* ===== ENLACES ===== */
        a {
            transition: all 0.2s;
        }

        /* ===== ANIMACIONES DE HOJAS ===== */
        @keyframes floatLeaf {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
        
        .leaf-decoration {
            position: fixed;
            pointer-events: none;
            color: var(--verde-brillante);
            opacity: 0.1;
            font-size: 2rem;
            z-index: -1;
        }
        
        .leaf-1 {
            top: 10%;
            left: 5%;
            animation: floatLeaf 8s ease-in-out infinite;
        }
        
        .leaf-2 {
            bottom: 15%;
            right: 5%;
            animation: floatLeaf 10s ease-in-out infinite reverse;
        }
        
        .leaf-3 {
            top: 30%;
            right: 10%;
            animation: floatLeaf 7s ease-in-out infinite 1s;
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 768px) {
            .form-card {
                margin: 0 1rem;
            }
            
            .form-card::before,
            .form-card::after {
                font-size: 18px;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body class="antialiased">
    <!-- Hojas decorativas flotantes -->
    <div class="leaf-decoration leaf-1">🍃</div>
    <div class="leaf-decoration leaf-2">🍂</div>
    <div class="leaf-decoration leaf-3">🌿</div>
    
    <!-- Contenido principal -->
    <main class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="w-full">
            @yield('content')
        </div>
    </main>
    
    <!-- Scripts opcionales -->
    @stack('scripts')
</body>
</html>