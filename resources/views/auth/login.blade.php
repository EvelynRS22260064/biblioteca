@extends('layout.auth')

@section('content')
<div class="min-h-screen bg-[#f4f7f0] py-12 px-4 sm:px-6 lg:px-8 relative overflow-hidden">
    <!-- Fondo de bosque encantado -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.pexels.com/photos/2387873/pexels-photo-2387873.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2" 
             alt="Bosque encantado con niebla" 
             class="w-full h-full object-cover object-center opacity-20">
        <div class="absolute inset-0 bg-gradient-to-b from-[#1e4028]/30 via-[#2c583a]/20 to-[#367a49]/30"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto">
        <!-- Header del bosque -->
        <div class="text-center mb-12">
            <div class="inline-block bg-[#2a6637]/80 backdrop-blur-sm px-6 py-2 rounded-full border border-[#b1dba9] mb-4 font-story">
                <span class="text-[#f6ffe7]">🍂  BIBLIOTECA DEL BOSQUE ENCANTADO  🍂</span>
            </div>
            <h1 class="font-story text-5xl md:text-6xl font-bold text-[#1f4a2a] hero-glow mb-3">Bienvenido al Claro</h1>
            <p class="text-[#2d5a36] text-lg max-w-2xl mx-auto bg-[#e5f0db]/50 p-4 rounded-2xl backdrop-blur-sm">
                Accede a tu cuenta o regístrate para descubrir las historias que susurran los árboles
            </p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 items-stretch justify-center">
            
            <!-- FORMULARIO DE LOGIN -->
            <div class="flex-1 max-w-md mx-auto lg:mx-0 w-full">
                <div class="form-card p-8">
                    <h2 class="font-story text-3xl font-bold text-[#1a4524] mb-2 flex items-center gap-2 border-b border-[#99bF8c] pb-3">
                        <span>🔐</span> Iniciar Sesión
                    </h2>
                    <p class="text-[#34633e] mb-6 text-sm">Accede con tus credenciales mágicas</p>

                    <form id="loginForm" action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-5">
                            <label class="form-label">Correo electrónico</label>
                            <div class="relative">
                                <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                                <input type="email" name="email" class="form-input pl-12" placeholder="lector@bosqueencantado.biblio" required>
                            </div>

                        </div>

                        <div class="mb-4">
                            <div class="flex justify-between items-center mb-1">
                                <label class="form-label">Contraseña</label>
                                <a href="#" class="text-sm text-[#2e693b] hover:text-[#174d22] underline decoration-dotted">¿Olvidaste el conjuro?</a>
                            </div>
                            <div class="relative">
                                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                                <input type="password" name="password" class="form-input pl-12" placeholder="············" required>
                            </div>
                        </div>

                        <div class="flex items-center gap-2 mb-6">
                            <input type="checkbox" id="remember" class="rounded border-[#8bb682] text-[#3f7847] focus:ring-[#3f7847]">
                            <label for="remember" class="text-sm text-[#1f542b]">Recordar mi esencia</label>
                        </div>

                        <button type="submit" class="btn-primary">
                            <i class="fa-solid fa-sign-in-alt mr-2"></i> Entrar al Bosque
                        </button>
                    </form>

                    <div class="relative flex py-5 items-center">
                        <div class="flex-grow border-t border-[#98b68d]"></div>
                        <span class="flex-shrink mx-4 text-[#286132] text-xs font-bold uppercase font-story">hojas del destino</span>
                        <div class="flex-grow border-t border-[#98b68d]"></div>
                    </div>

                    <div class="flex gap-4">
                        <button class="btn-social flex-1 border-[#8bb682] text-[#5b8c5a] hover:bg-[#e5f0db]">
                            <i class="fa-brands fa-google mr-2"></i> Google
                        </button>
                        <button class="btn-social flex-1 border-[#8bb682] text-[#3f7847] hover:bg-[#e5f0db]">
                            <i class="fa-brands fa-facebook mr-2"></i> Facebook
                        </button>
                    </div>

                    <p class="mt-6 text-center text-sm text-[#34633e]">
                        ¿No tienes un grimorio? <a href="#" class="text-[#256f35] font-bold font-story hover:underline">Crea tu cuenta aquí</a>
                    </p>

                    <div class="mt-6 bg-[#e5f0db] p-5 rounded-xl border-2 border-[#7fa07b]">
                        <h3 class="text-[#1a4524] font-bold flex items-center gap-2 text-sm mb-2">
                            <i class="fa-solid fa-leaf text-[#3f7847]"></i> ¿Primera vez en el claro?
                        </h3>
                        <p class="text-xs text-[#2d5a36] leading-relaxed">
                            Si es tu primera visita, necesitas registrarte para acceder a nuestros libros encantados, revistas del bosque y eventos bajo la luna.
                        </p>
                    </div>
                </div>
            </div>

            <!-- FORMULARIO DE REGISTRO -->
            <div class="flex-1 max-w-md mx-auto lg:mx-0 w-full">
                <div class="form-card p-8">
                    <h2 class="font-story text-3xl font-bold text-[#1a4524] mb-2 flex items-center gap-2 border-b border-[#99bF8c] pb-3">
                        <span>🌱</span> Crear Grimorio
                    </h2>
                    <p class="text-[#34633e] mb-6 text-sm">Regístrate para llevar historias a tu hogar</p>

                    <form id="registerForm" action="{{ route('register') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-x-4">
                        @csrf
                        <div class="input-group mb-4">
                            <label class="form-label">Nombre</label>
                            <div class="relative">
                                <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                                <input type="text" name="name" class="form-input pl-12" placeholder="Ej. Elara" required>
                            @if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-4">
        @foreach($errors->all() as $error)
            <p class="text-sm">{{ $error }}</p>
        @endforeach
    </div>
@endif
                            </div>
                        </div>
                        
                        <div class="input-group mb-4">
                            <label class="form-label">Apellido</label>
                            <div class="relative">
                                <i class="fa-solid fa-user absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                                <input type="text" name="apellido" class="form-input pl-12" placeholder="Ej. Del Bosque" required>
                            </div>
                        </div>
                        
                        <div class="md:col-span-2 mb-4">
                            <label class="form-label">Correo electrónico</label>
                            <div class="relative">
                                <i class="fa-solid fa-envelope absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                                <input type="email" name="email" class="form-input pl-12" placeholder="usuario@ejemplo.com" required>
                            </div>
                            <p class="text-[10px] text-[#5b8c5a] mt-1">Los duendes usarán este email para contactarte</p>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <div class="relative">
                                <i class="fa-solid fa-lock absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                                <input type="password" name="password" class="form-input pl-12" placeholder="Mínimo 8 caracteres" required>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <label class="form-label">Repetir Contraseña</label>
                            <div class="relative">
                                <i class="fa-solid fa-rotate-right absolute left-4 top-1/2 -translate-y-1/2 text-[#5b8c5a]"></i>
                                <input type="password" name="password_confirmation" class="form-input pl-12" placeholder="Confirma tu conjuro" required>
                            </div>
                        </div>
                        
                        <div class="md:col-span-2 mb-6">
                            <label class="flex items-start gap-2 text-xs text-[#1f542b]">
                                <input type="checkbox" class="mt-0.5 rounded border-[#8bb682] accent-[#3f7847]">
                                Acepto el conjuro de privacidad y que los árboles guarden mis datos. Confirmo que soy mayor de 14 años.
                            </label>
                        </div>

                        <button type="submit" class="btn-primary md:col-span-2">
                            <i class="fa-solid fa-user-plus mr-2"></i> Crear Grimorio (Registrarse)
                        </button>
                    </form>

                    <p class="mt-6 text-center text-sm text-[#34633e]">
                        ¿Ya tienes un grimorio? <a href="#" class="text-[#256f35] font-bold font-story hover:underline">Inicia sesión aquí</a>
                    </p>

                    <div class="mt-6 bg-[#e5f0db] p-5 rounded-xl border-2 border-[#7fa07b]">
                        <h3 class="text-[#1a4524] font-bold flex items-center gap-2 text-sm mb-2">
                            <i class="fa-solid fa-gift text-[#3f7847]"></i> Beneficios de tener un grimorio
                        </h3>
                        <ul class="text-xs text-[#2d5a36] space-y-1">
                            <li class="flex items-center gap-2"><i class="fa-solid fa-leaf text-[#5b8c5a]"></i> Préstamo de hasta 5 libros del bosque</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-leaf text-[#5b8c5a]"></i> Acceso a pergaminos digitales y lectura online</li>
                            <li class="flex items-center gap-2"><i class="fa-solid fa-leaf text-[#5b8c5a]"></i> Invitaciones a lecturas bajo la luna llena</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection