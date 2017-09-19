@extends("layouts.main")
@section('content')
    <div class="col-sm-9">
        <h4><small>BTM Corporate - PROCESSO SELETIVO - DESENVOLVEDOR WEB - 1ª ETAPA</small></h4>
        <hr>
        <h2>Tarefa:</h2>
        <h5><span class="glyphicon glyphicon-time"></span> Data de Entrega: 19/09/2017 - 15h</h5>
        <br>
        <p>Criar um formulário onde o usuário deve inserir a origem(Autocomplete Google Maps API) e o destino(Autocomplete Google Maps API). Assim que inserido os dados, o sistema deve gerar as 3 rotas do Google Maps API e as melhores rotas baseadas em distância e tempo.
            A melhor rota deve ser desenhada e disponibilizada em um mapa dinâmico.<br>
            Também deve informar a cidade, o estado, a latitude e a longitude da origem e destino inserido.
        </p>

        <p>Desenvolver o consumo (Get,Post,PUT) da API (https://jsonplaceholder.typicode.com/).</p>
        <br>
        <h4><small>Tecnologia Utilizada</small></h4>
        <hr>
        <ul>
            <li>PHP 7</li>
            <li>MySQL 5.7</li>
            <li>Javascript (jQuery, JQuery DataTable)</li>
            <li>HTML 5</li>
            <li>CSS3 / Bootstrap</li>
            <li>Orientação a Objetos</li>
            <li>Consumo de WebServices em JSON</li>
            <li>Framework Laravel 5.5</li>
            <li>Observação: Para desenvolvimento local foi utilizado:</li>
            <ul>
                <li>Vagrant 1.9.6</li>
                <li>VirtualBox 5.1</li>
                <li>Git for windows 2.14</li>
                <li>Laravel/Homestead last version</li>
            </ul>

        </ul>
    </div>
@endsection
@section('style')

@endsection

@section('javascript')
    @parent
@endsection