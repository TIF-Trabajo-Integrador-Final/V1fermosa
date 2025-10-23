    <div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Ofertas Educativas</h1>

        <ul class="list-disc ml-6">
            @foreach($ofertas as $oferta)
                <li class="mb-3">
                    <strong>{{ $oferta->titulo }}</strong>
                    <br>
                    <span class="text-sm text-gray-700">{{ $oferta->descripcion }}</span>
                </li>
            @endforeach
        </ul>
    </div>


