{{-- ============================================================= --}}
{{-- FOOTER DE HOME - Biblioteca del Bosque Encantado            --}}
{{-- UBICACIÓN: resources/views/partials/home-footer.blade.php   --}}
{{-- PROPÓSITO: Pie de página para la página principal (home)    --}}
{{-- NOTA: Mantiene consistencia visual con el admin-footer      --}}
{{-- ============================================================= --}}

<footer class="footer-moss text-[#ddf0cf] border-t-4 border-[#5f946b]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        {{-- SECCIÓN: Grid principal del footer --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            
            {{-- COLUMNA 1: Logo + esencia --}}
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-3xl">🌲</span>
                    <h3 class="font-story text-2xl font-semibold text-[#eafada]">Bosque de los Libros</h3>
                </div>
                <p class="text-[#cbe5bd] text-sm">Biblioteca formal con corazón de bosque encantado. Política de préstamos: devolver antes del próximo solsticio.</p>
            </div>

            {{-- COLUMNA 2: Enlaces de navegación --}}
            <div>
                <h4 class="font-story text-xl mb-3 border-b border-[#70a072] pb-1">Navegar</h4>
                <ul class="space-y-2 text-[#daf0ca]">
                    <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🍂</span> Inicio</a></li>
                    <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🍃</span> Catálogo</a></li>
                    <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🌿</span> Eventos del claro</a></li>
                    <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>📖</span> Club de lectura</a></li>
                </ul>
            </div>

            {{-- COLUMNA 3: Acceso a cuenta --}}
            <div>
                <h4 class="font-story text-xl mb-3 border-b border-[#70a072] pb-1">Acceso</h4>
                <ul class="space-y-2 text-[#daf0ca]">
                    <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🔐</span> Iniciar sesión</a></li>
                    <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>📌</span> Registro</a></li>
                    <li><a href="#" class="hover:text-white transition flex items-center gap-1"><span>🪶</span> Mi carnet</a></li>
                </ul>
            </div>

            {{-- COLUMNA 4: Ubicación fantástica --}}
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

        {{-- SECCIÓN: Copyright --}}
        <div class="border-t border-[#7fad82] mt-8 pt-6 text-center text-sm text-[#c6e2b5]">
            <p>© 2025 · Biblioteca del Bosque Encantado · imágenes de Pexels (licencia gratis) · magia responsiva con vanilla JS y Tailwind</p>
        </div>
    </div>
</footer>

{{-- ============================================================= --}}
{{-- SCRIPT: Menú hamburguesa (vanilla JS)                        --}}
{{-- FUNCIÓN: Controla la apertura/cierre del menú móvil          --}}
{{-- COMPATIBILIDAD: Mismo script que en la home                  --}}
{{-- ============================================================= --}}
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

{{-- ============================================================= --}}
{{-- NOTAS DE DESARROLLO:                                         --}}
{{-- - Los formularios son puramente HTML/CSS                     --}}
{{-- - Clases compartidas: .form-card, .form-input, .btn-primary  --}}
{{-- - Estructura: header, hero (con formularios), footer         --}}
{{-- ============================================================= --}}
</body>
</html>