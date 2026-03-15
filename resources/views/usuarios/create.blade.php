@extends('layout.admin')

@section('page-title', '🌱 Sembrar un Nuevo Habitante')
@section('page-description', 'Da la bienvenida a un nuevo miembro al bosque encantado')

@section('content')
<div class="p-4 sm:p-8">
    <div class="container mx-auto px-4 py-8 max-w-3xl">
        <!-- Header con estilo del bosque MEJORADO -->
        <div class="mb-12 relative">
            <div class="absolute -top-4 -left-4 w-40 h-40 bg-[#b7d6a5]/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-[#8bb682]/20 rounded-full blur-2xl"></div>
            
            <h1 class="font-story text-5xl md:text-6xl lg:text-7xl font-bold text-[#1f4a2a] mb-4 relative leading-tight">
    <span class="inline-block mr-3 transform hover:rotate-12 transition-transform duration-300">🌱</span> 
    <span class="relative">
        Dar Vida
        <span class="absolute -bottom-2 left-0 w-full h-2 bg-[#b7d6a5]/30 rounded-full blur-sm"></span>
    </span>
    <br>a un Nuevo Espíritu
</h1>
            
            <div class="relative max-w-3xl">
                <div class="absolute -left-4 top-0 text-4xl opacity-20 text-[#3f7847]">✧</div>
                <p class="text-[#2d5a36] text-base md:text-lg leading-relaxed pl-2 italic border-l-4 border-[#8bb682] bg-gradient-to-r from-[#e5f0db]/30 to-transparent p-4 rounded-r-2xl">
                    <span class="font-story font-semibold text-[#1f4a2a]">Da la bienvenida a un nuevo miembro a nuestro claro encantado. 
                    Cada habitante trae consigo historias únicas que enriquecerán nuestro bosque de conocimiento.</span> 
                </p>
            </div>
            
            <div class="flex gap-3 mt-4 text-[#8bb682]">
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <i class="fa-solid fa-tree text-sm"></i>
                <span class="text-xs text-[#5b8c5a] mx-2">✦</span>
                <i class="fa-solid fa-seedling text-sm"></i>
                <i class="fa-solid fa-seedling text-sm"></i>
                <i class="fa-solid fa-seedling text-sm"></i>
            </div>
        </div>
        <!-- Formulario estilo pergamino MEJORADO -->
        <div class="form-card overflow-hidden border-2 border-[#8bb682] shadow-2xl relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#3f7847] via-[#8bb682] to-[#3f7847]"></div>
            
            <div class="p-6 border-b border-[#99bF8c] bg-gradient-to-r from-[#f0f7e8] to-[#e5f0db]">
                <h2 class="font-story text-2xl md:text-3xl font-bold text-[#1a4524] flex items-center gap-3">
                    <i class="fa-solid fa-seedling text-[#3f7847] text-3xl"></i> 
                    <span>El Ritual de Bienvenida</span>
                </h2>
                <p class="text-[#34633e] text-sm md:text-base mt-2 flex items-center gap-2">
                    <i class="fa-solid fa-feather text-[#8bb682]"></i>
                    Completa los siguientes campos para dar vida a un nuevo habitante del bosque
                </p>
            </div>

            <form action="{{ route('usuarios.store') }}" method="POST" class="p-8">
                @csrf
                
                <!-- Nombre -->
                <div class="mb-6">
                    <label for="name" class="form-label flex items-center gap-2">
                        <i class="fa-solid fa-user text-[#3f7847]"></i>
                        Nombre del habitante
                    </label>
                    <div class="relative">
                        <i class="fa-solid fa-leaf absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name') }}" 
                               class="form-input w-full pl-12" 
                               placeholder="Ej. Elara del Bosque"
                               required>
                    </div>
                    @error('name')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Correo Electrónico -->
                <div class="mb-6">
                    <label for="email" class="form-label flex items-center gap-2">
                        <i class="fa-solid fa-envelope text-[#3f7847]"></i>
                        Correo mágico
                    </label>
                    <div class="relative">
                        <i class="fa-solid fa-feather absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                        <input type="email" 
                               name="email" 
                               id="email" 
                               value="{{ old('email') }}" 
                               class="form-input w-full pl-12" 
                               placeholder="habitante@bosqueencantado.com"
                               required>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Contraseña -->
                <div class="mb-6">
                    <label for="password" class="form-label flex items-center gap-2">
                        <i class="fa-solid fa-lock text-[#3f7847]"></i>
                        Palabra secreta
                    </label>
                    <div class="relative">
                        <i class="fa-solid fa-key absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                        <input type="password" 
                               name="password" 
                               id="password" 
                               value="{{ old('password') }}" 
                               class="form-input w-full pl-12" 
                               placeholder="********"
                               required>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Confirmar Contraseña -->
                <div class="mb-6">
                    <label for="password_confirmation" class="form-label flex items-center gap-2">
                        <i class="fa-solid fa-lock text-[#3f7847]"></i>
                        Confirmar palabra secreta
                    </label>
                    <div class="relative">
                        <i class="fa-solid fa-key absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                        <input type="password" 
                               name="password_confirmation" 
                               id="password_confirmation" 
                               value="{{ old('password_confirmation') }}" 
                               class="form-input w-full pl-12" 
                               placeholder="********"
                               required>
                    </div>
                    @error('password_confirmation')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
                </div>

                <!-- Tipo de Usuario -->
                <div class="mb-8">
                    <label for="user_type" class="form-label flex items-center gap-2">
                        <i class="fa-solid fa-crown text-[#3f7847]"></i>
                        Rol en el bosque
                    </label>
                    <div class="relative">
                        <i class="fa-solid fa-tag absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                        <select name="user_type" 
                                id="user_type" 
                                class="form-input w-full pl-12 appearance-none bg-white" 
                                required>
                            <option value="" class="text-gray-400">Selecciona un rol</option>
                            <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>👑 Guardián del bosque</option>
                            <option value="bibliotecario" {{ old('user_type') == 'bibliotecario' ? 'selected' : '' }}>📚 Cuidador de libros</option>
                            <option value="user" {{ old('user_type') == 'user' ? 'selected' : '' }}>🍃 Lector del bosque</option>
                        </select>
                        <i class="fa-solid fa-chevron-down absolute right-4 top-1/2 -translate-y-1/2 text-[#5b8c5a] pointer-events-none"></i>
                    </div>
                    @error('user_type')
                        <p class="text-red-500 text-sm mt-2 flex items-center gap-1">
                            <i class="fa-solid fa-exclamation-circle"></i>
                            {{ $message }}
                        </p>
                    @enderror
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

                <!-- Botones de acción -->
                <div class="flex items-center justify-between gap-4 mt-8">
                    <button type="submit" 
                            class="btn-primary flex-1 flex items-center justify-center gap-3 py-4 text-lg">
                        <i class="fa-solid fa-seedling"></i>
                        <span>Sembrar habitante</span>
                        <i class="fa-solid fa-sparkles opacity-70"></i>
                    </button>
                    
                    <a href="{{ route('usuarios.index') }}" 
                       class="group relative bg-white hover:bg-gray-50 text-[#5b8c5a] border-2 border-[#c3dfb5] px-8 py-4 rounded-full font-story flex items-center gap-2 transition-all hover:border-[#b85c5c] hover:text-[#b85c5c]">
                        <i class="fa-solid fa-times group-hover:rotate-90 transition-transform"></i>
                        <span>Cancelar</span>
                    </a>
                </div>
            </form>
            
            <!-- Sello decorativo -->
            <div class="absolute bottom-4 right-4 opacity-10 pointer-events-none">
                <i class="fa-solid fa-tree text-6xl text-[#1f4a2a] rotate-12"></i>
            </div>
        </div>

        <!-- Mensaje inspirador -->
        <div class="mt-8 text-center relative">
            <div class="absolute left-1/2 -translate-x-1/2 -top-5 w-20 h-20 bg-[#b7d6a5]/20 rounded-full blur-2xl"></div>
            <div class="flex justify-center gap-4 text-[#8bb682] text-xl">
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-leaf hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-seedling hover:text-[#3f7847] transition transform hover:scale-110"></i>
                <i class="fa-solid fa-tree hover:text-[#3f7847] transition transform hover:scale-110"></i>
            </div>
            <p class="text-sm text-[#8bb682] mt-3 italic font-story">
                "Cada nuevo habitante es una semilla que florecerá en el bosque de historias"
            </p>
        </div>
    </div>
</div>
@endsection