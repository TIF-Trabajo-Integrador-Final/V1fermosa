<div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Sedes del Instituto</h1>

        @foreach($sedes as $sede)
            <div class="mb-10">
                <h2 class="text-xl font-semibold mb-2">{{ $sede->nombre }}</h2>
                <p class="mb-4">{{ $sede->direccion }}</p>

                {{-- Mapa --}}
            <div class="rounded-xl overflow-hidden shadow-lg h-[250px]">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3593.6366037286466!2d-58.17519632420485!3d-26.16668386348483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x945be11b2238382d%3A0xc02e4d2938c0f585!2sMaip%C3%BA%20850%2C%20P3600BMB%2C%20Formosa!5e0!3m2!1ses-419!2sar!4v1699042500000!5m2!1ses-419!2sar"
                    class="w-full h-full"
                    style="border:0;"  
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
        </div>
        @endforeach
    </div>
