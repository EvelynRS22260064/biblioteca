<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Editar Libro - Biblioteca del Bosque Encantado</title>
    
    <!-- Tailwind CSS -->
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

        /* ===== CAMPOS DE ENTRADA ===== */
        .form-input {
            width: 100%;
            padding: 0.75rem 1rem 0.75rem 3rem;
            background: var(--verde-crema);
            border: 1px solid var(--verde-sutil);
            border-radius: 30px 8px 30px 8px;
            color: var(--verde-oscuro);
            transition: all 0.3s ease;
            font-size: 1rem;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--verde-hoja);
            box-shadow: 0 0 0 3px rgba(63, 120, 71, 0.3), 0 10px 20px -10px #1f4a2a;
            transform: translateY(-2px);
            background: #ffffff;
        }
        
        .form-label {
            display: block;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--verde-oscuro);
            margin-bottom: 0.3rem;
            margin-left: 0.5rem;
        }

        /* ===== SELECT PERSONALIZADO ===== */
        select.form-input {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%235b8c5a'%3E%3Cpath d='M7 10l5 5 5-5z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 1.5rem;
        }

        /* ===== BOTONES ===== */
        .btn-primary {
            background: #3f7847;
            border: 1px solid #9bcf98;
            color: #f6ffe7;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            font-weight: 600;
            padding: 0.8rem 2.5rem;
            border-radius: 40px 10px 40px 10px;
            box-shadow: 0 5px 0 #1b4823, 0 6px 12px #2e6137;
            transition: all 0.1s ease-out;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .btn-primary:hover {
            background: #4c8f55;
            transform: translateY(-2px);
            box-shadow: 0 7px 0 #1b4823, 0 10px 18px #2a5b33;
        }

        .btn-secondary {
            background: white;
            border: 2px solid #8bb682;
            color: #2d5a36;
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            font-weight: 600;
            padding: 0.8rem 2rem;
            border-radius: 40px 10px 40px 10px;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        
        .btn-secondary:hover {
            background: #f0f7e8;
            border-color: #b85c5c;
            color: #b85c5c;
            transform: translateY(-2px);
        }

        /* ===== ERRORES DE VALIDACIÓN ===== */
        .error-container {
            background: #f8e1e1;
            border: 2px solid #b85c5c;
            border-radius: 30px 8px 30px 8px;
            padding: 1rem 1.5rem;
            margin-bottom: 2rem;
            color: #b85c5c;
        }
        
        .error-container ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        
        .error-container li {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }
        
        .error-container li:not(:last-child) {
            margin-bottom: 0.5rem;
        }

        /* ===== ANIMACIONES ===== */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        
        .fa-leaf, .fa-tree {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>
<body class="antialiased">
    <div class="container mx-auto px-4 py-12 max-w-3xl relative">
        <!-- Hojas decorativas flotantes -->
        <div class="fixed top-20 left-10 text-4xl opacity-10 pointer-events-none animate-pulse">🌿</div>
        <div class="fixed bottom-20 right-10 text-4xl opacity-10 pointer-events-none animate-pulse">🍂</div>
        
        <!-- Header con estilo del bosque -->
        <div class="mb-8 relative">
            <div class="absolute -top-4 -left-4 w-32 h-32 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <h1 class="font-story text-5xl md:text-6xl font-bold text-[#1f4a2a] mb-3 relative flex items-center gap-3">
                <span class="text-6xl">📝</span> 
                <span>Editar Libro</span>
            </h1>
            <p class="text-[#2d5a36] text-lg max-w-2xl leading-relaxed pl-2">
                Modifica los detalles del ejemplar en el bosque encantado
            </p>
        </div>

        <!-- Mostrar errores de validación con estilo -->
        @if ($errors->any())
            <div class="error-container">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <i class="fa-solid fa-exclamation-circle"></i>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario estilo pergamino -->
        <div class="form-card p-8">
            <div class="border-b border-[#99bF8c] pb-4 mb-6">
                <h2 class="font-story text-2xl font-bold text-[#1a4524] flex items-center gap-2">
                    <i class="fa-solid fa-pen-to-square text-[#3f7847]"></i>
                    <span>Modificar libro</span>
                </h2>
                <p class="text-[#34633e] text-sm mt-1 flex items-center gap-2">
                    <i class="fa-solid fa-leaf text-[#8bb682]"></i>
                    Actualiza la información del ejemplar
                </p>
            </div>

            <form action="{{ route('libros.update', $libro->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nombre -->
                    <div class="md:col-span-2">
                        <label class="form-label flex items-center gap-2">
                            <i class="fa-solid fa-heading text-[#3f7847]"></i>
                            Nombre del libro
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-book absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <input type="text" 
                                   name="nombre" 
                                   class="form-input" 
                                   value="{{ old('nombre', $libro->nombre) }}"
                                   placeholder="Ej. Cien años de soledad"
                                   required>
                        </div>
                    </div>

                    <!-- ISBN -->
                    <div>
                        <label class="form-label flex items-center gap-2">
                            <i class="fa-solid fa-barcode text-[#3f7847]"></i>
                            ISBN
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-qrcode absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <input type="text" 
                                   name="isbn" 
                                   class="form-input" 
                                   value="{{ old('isbn', $libro->isbn) }}"
                                   placeholder="978-0307474728"
                                   required>
                        </div>
                    </div>

                    <!-- Autor -->
                    <div>
                        <label class="form-label flex items-center gap-2">
                            <i class="fa-solid fa-user-pen text-[#3f7847]"></i>
                            Autor
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <input type="text" 
                                   name="autor" 
                                   class="form-input" 
                                   value="{{ old('autor', $libro->autor) }}"
                                   placeholder="Gabriel García Márquez"
                                   required>
                        </div>
                    </div>

                    <!-- Editorial -->
                    <div>
                        <label class="form-label flex items-center gap-2">
                            <i class="fa-solid fa-building text-[#3f7847]"></i>
                            Editorial
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-building-columns absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <input type="text" 
                                   name="editorial" 
                                   class="form-input" 
                                   value="{{ old('editorial', $libro->editorial) }}"
                                   placeholder="Editorial Sudamericana"
                                   required>
                        </div>
                    </div>

                    <!-- Categoría -->
                    <div class="md:col-span-2">
                        <label class="form-label flex items-center gap-2">
                            <i class="fa-solid fa-tags text-[#3f7847]"></i>
                            Categoría
                        </label>
                        <div class="relative">
                            <i class="fa-solid fa-tag absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                            <select name="categoria_id" class="form-input" required>
                                <option value="">Selecciona una categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}"
                                        {{ old('categoria_id', $libro->categoria_id) == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Separador decorativo -->
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

                <!-- Botones -->
                <div class="flex items-center justify-end gap-4">
                    <a href="{{ route('libros.index') }}" class="btn-secondary">
                        <i class="fa-solid fa-times"></i>
                        Cancelar
                    </a>
                    <button type="submit" class="btn-primary">
                        <i class="fa-solid fa-save"></i>
                        Actualizar libro
                        <i class="fa-solid fa-sparkles opacity-70"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Mensaje inspirador -->
        <div class="mt-8 text-center">
            <p class="text-sm text-[#8bb682] italic font-story">
                <i class="fa-solid fa-quote-left mr-2 opacity-50"></i>
                Un libro actualizado es un árbol que vuelve a florecer
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