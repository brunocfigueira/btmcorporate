<ul class="nav nav-pills nav-stacked">
    <li class="active"><a href="{{route('welcome')}}">Principal</a></li>
    <li>Formulário</li>
    <ul>
        <li><a href="{{route('showMap')}}">Origem / Destino</a></li>
    </ul>
    <li>API Externa</li>
    <ul>
        <li>Usuários</li>
        <ul>
            <li><a href="{{route('users')}}">Pesquisar</a></li>
        </ul>
        <li>Posts</li>
        <ul>
            <li><a href="{{route('posts')}}">Pesquisar</a></li>
            <li><a href="{{route('createPost')}}">Criar</a></li>
        </ul>
    </ul>

</ul>