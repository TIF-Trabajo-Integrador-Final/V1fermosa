<div x-data="{ openForm:false }">

{{-- ============================= --}}
{{-- FUENTES --}}
{{-- ============================= --}}
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;700&display=swap" rel="stylesheet">

{{-- ============================= --}}
{{-- HERO --}}
{{-- ============================= --}}
<div class="relative w-full h-[60vh] sm:h-[70vh] md:h-[85vh] overflow-hidden z-40 bg-[#f4f5f7]">
    <img src="{{ asset('images/24.png') }}"
         class="absolute inset-0 w-full h-full object-cover object-bottom md:object-[center_80%] animate-slow-zoom"
         alt="Hero Image">
    <div class="absolute bottom-0 left-0 w-full h-40 bg-gradient-to-b from-transparent to-[#f4f5f7] pointer-events-none"></div>
</div>

{{-- ============================= --}}
{{-- FONDO SECCIÓN --}}
{{-- ============================= --}}
<div class="relative bg-premium-cross -mt-[1px] pt-14 pb-20">

    <div class="absolute inset-0 z-0 bg-white/5 backdrop-blur-3xl border-t border-b border-white/30"
         style="box-shadow: inset 0 0 500px 500px rgba(255, 255, 255, 0.05);"></div>

    <div class="relative z-10 max-w-6xl mx-auto px-6 font-montserrat">


{{-- ===================================================== --}}
{{--      TÍTULO RESPONSIVE --}}
{{-- ===================================================== --}}
<h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-[#131567] mb-10 text-center leading-tight"
    data-aos="fade-down">
    Experiencias Reales
</h1>



{{-- ===================================================== --}}
{{--      CARRUSEL HORIZONTAL RESPONSIVE --}}
{{-- ===================================================== --}}
<div 
    x-data="{
        index: 0,
        total: {{ count($lista) }},
        next() { this.index = (this.index + 1) % this.total },
        prev() { this.index = (this.index - 1 + this.total) % this.total }
    }"
    x-init="setInterval(() => next(), 4500)"
    class="relative w-full max-w-3xl mx-auto overflow-hidden">

    <!-- Flechas -->
    <button @click="prev()" 
            class="absolute left-2 top-1/2 -translate-y-1/2 bg-[#131567]/70 text-white p-3 rounded-full shadow-lg hover:bg-[#0f0f63] transition hidden sm:block z-20">
        <i class="fas fa-chevron-left"></i>
    </button>

    <button @click="next()" 
            class="absolute right-2 top-1/2 -translate-y-1/2 bg-[#131567]/70 text-white p-3 rounded-full shadow-lg hover:bg-[#0f0f63] transition hidden sm:block z-20">
        <i class="fas fa-chevron-right"></i>
    </button>

    <!-- Carril -->
    <div class="flex transition-transform duration-700 ease-out"
         :style="'transform: translateX(-' + (index * 100) + '%)'">

        @foreach ($lista as $item)
        <div class="w-full flex-shrink-0 px-4">

            <div class="card-premium-review rounded-2xl p-6 sm:p-8 mx-2 sm:mx-4 
                        flex flex-col justify-center relative overflow-hidden">

                <p class="review-text text-[#131567] text-base sm:text-lg italic font-montserrat text-center leading-relaxed">
                    “{{ $item->mensaje }}”
                </p>

                <div class="mt-6 font-bold text-[#131567] font-montserrat text-right flex items-center justify-end gap-2">
                    <i class="fas fa-user icon-blue text-lg sm:text-xl"></i>
                    — {{ $item->nombre }}
                </div>

            </div>

        </div>
        @endforeach

    </div>

</div>



{{-- ===================================================== --}}
{{--  BOTÓN PARA ABRIR FORM --}}
{{-- ===================================================== --}}
<div class="text-center mt-16">
    <button @click="openForm = !openForm"
        class="px-8 sm:px-10 py-3 sm:py-4 rounded-xl font-montserrat font-semibold text-white 
               bg-gradient-to-r from-[#3C5CCF] to-[#131567] 
               hover:opacity-90 transition shadow-lg flex items-center gap-3 mx-auto">
        Dejar aquí tu Reseña
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
             stroke-width="2" stroke="white" class="w-5 h-5 sm:w-6 sm:h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
</div>



{{-- ===================================================== --}}
{{--  FORMULARIO RESPONSIVE --}}
{{-- ===================================================== --}}
<div x-show="openForm" x-transition.duration.600ms 
     class="mt-12 max-w-xl sm:max-w-3xl mx-auto">

    <div class="card-premium rounded-2xl p-6 sm:p-10 border border-white/40
                backdrop-blur-2xl shadow-xl relative overflow-hidden">

        <h3 class="text-center font-montserrat text-2xl sm:text-3xl font-extrabold 
                   text-[#131567] mb-8 sm:mb-10 drop-shadow">
            Enviar Reseña
        </h3>

        @if(session('ok'))
            <div class="p-3 bg-green-300/50 text-green-900 text-center rounded mb-5 font-montserrat">
                {{ session('ok') }}
            </div>
        @endif

        <form wire:submit.prevent="enviar" class="space-y-6 font-montserrat">

            {{-- Nombre --}}
            <div>
                <label class="text-sm font-bold text-[#131567] flex items-center gap-2">
                    <i class="fas fa-user icon-blue"></i> Nombre
                </label>
                <input type="text" wire:model="nombre"
                    class="w-full mt-1 p-2 sm:p-3 rounded-xl bg-white/50 border-none 
                           text-[#131567] placeholder-[#131567]/40 
                           focus:ring-[#3C5CCF] focus:outline-none">
            </div>

            {{-- Email --}}
            <div>
                <label class="text-sm font-bold text-[#131567] flex items-center gap-2">
                    <i class="fas fa-envelope icon-blue"></i> Email (Opcional)
                </label>
                <input type="email" wire:model="email"
                    class="w-full mt-1 p-2 sm:p-3 rounded-xl bg-white/50 border-none 
                           text-[#131567] placeholder-[#131567]/40 
                           focus:ring-[#3C5CCF] focus:outline-none">
            </div>

            {{-- Mensaje --}}
            <div>
                <label class="text-sm font-bold text-[#131567] flex items-center gap-2">
                    <i class="fas fa-comment-dots icon-blue"></i> Tu reseña
                </label>
                <textarea wire:model="mensaje" rows="4"
                    class="w-full mt-1 p-2 sm:p-3 rounded-xl bg-white/50 border-none 
                           text-[#131567] placeholder-[#131567]/40 
                           focus:ring-[#3C5CCF] focus:outline-none"></textarea>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="px-8 sm:px-10 py-3 sm:py-4 rounded-xl shadow-lg font-montserrat font-bold 
                           text-white bg-[#06A77D] hover:bg-[#048C68] transition">
                    Enviar Reseña
                </button>
            </div>

        </form>

    </div>
</div>



{{-- ===================================================== --}}
{{--      ESTILOS --}}
{{-- ===================================================== --}}
<style>
.card-premium {
    background-color: #cbd2e6;
    box-shadow:
        0 8px 25px rgba(0,0,0,0.15),
        inset 0 0 25px rgba(255,255,255,0.25);
}

.card-premium-review {
    background-color: #cbd2e6;
    border: 1px solid rgba(255,255,255,0.4);
    backdrop-filter: blur(18px);
    box-shadow:
        0 8px 25px rgba(0,0,0,0.15),
        inset 0 0 22px rgba(255,255,255,0.25);
}

.review-text { font-size: .95rem; }
.icon-blue { color: #131567; }

@keyframes slowZoom {
    0%   { transform: scale(1.05); }
    100% { transform: scale(1.2); }
}
.animate-slow-zoom {
    animation: slowZoom 15s ease-in-out infinite alternate;
}
</style>

</div>
</div>
