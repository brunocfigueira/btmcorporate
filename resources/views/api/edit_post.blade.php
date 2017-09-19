@extends("layouts.main")
@section('content')
    @include('layouts.messages')

    <div class="col-sm-9">
        <h2>Atualizar Post</h2>
        <hr>
        @if(isset($success)&& $success)
            <div>
                <div>
                    <span class="badge">Resposta do Web Service</span>
                </div>
                <br>
                <pre>
                {!! json_encode($data) !!}
                </pre>
            </div>
            <ul class="list-inline">
                <li>
                    <a href="{{route('createPost')}}" class="btn btn-default">Novo</a>
                </li>
                <li>
                    <a href="{{route('posts')}}" class="btn btn-primary">Pesquisar</a>
                </li>
            </ul>
        @else
            <form method="post" class="form" action="{{route('updatePost',$data->id)}}">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{$data->id}}"/>
                <div class="form-group">
                    <label for="userId">UserId:</label>
                    <input type="text" class="form-control" id="userId" name="userId" readonly value="{{$data->userId}}">
                </div>
                <div class="form-group">
                    <label for="title">Título do post:</label>
                    <input type="text" class="form-control" id="title" name="title" required  value="{{$data->title}}">
                </div>
                <div class="form-group">
                    <label for="body">Conteúdo do post:</label>
                    <textarea rows="4" cols="50" id="body" name="body" class="form-control" required >{{$data->body}}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Enviar</button>
                @endif
            </form>
    </div>
@endsection
@section('style')

@endsection

@section('javascript')
    @parent
@endsection