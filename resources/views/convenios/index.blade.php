@extends('layouts.app') 

@section('content')
<div class="container">
    <h2>Listado de Convenios</h2>

    @if ($convenios->isEmpty())
        <p>No hay convenios registrados.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Institución</th>
                    <th>Inicio</th>
                    <th>Fin</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($convenios as $convenio)
                    <tr>
                        <td>{{ $convenio->nombre }}</td>
                        <td>{{ $convenio->institucion }}</td>
                        <td>{{ $convenio->fecha_inicio }}</td>
                        <td>{{ $convenio->fecha_fin ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('convenios.show', $convenio) }}" class="btn btn-info btn-sm">Ver</a>
                            </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $convenios->links() }}
    @endif
</div>
@endsection