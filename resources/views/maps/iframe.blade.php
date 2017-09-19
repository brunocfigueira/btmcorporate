@extends("layouts.main")
@section('content')
    <div class="col-sm-9">
        <h2>Formulário de Origem / Destino</h2>
        <ul>
            <li>Informe um endereço de origem e destino no campos que está sobre o mapa.</li>
            <li>Os botões ao lado exibe 3 possibilidades de trajeto.</li>
        </ul>
        <hr>
        <iframe height="600px" width="100%" frameBorder="0" scrolling="no" src="{{route('mapForm')}}" allowfullscreen></iframe>
    </div>
@endsection