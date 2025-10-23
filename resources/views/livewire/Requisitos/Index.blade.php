<div class="p-6">
        <h1 class="text-2xl font-bold mb-6">Requisitos de Inscripción</h1>

        <ul class="list-disc ml-6">
            @foreach($requisitos as $req)
                <li class="mb-3">
                    {{ $req->descripcion }}
                </li>
            @endforeach
        </ul>
    </div>

