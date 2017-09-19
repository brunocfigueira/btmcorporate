@extends("layouts.main")
@section('content')
    @include('layouts.messages')

    <div class="col-sm-9">
        <h2>Criar Post</h2>
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
            <form method="post" class="form" action="{{route('sendPost')}}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="userId">UserId:</label>
                    <input type="text" class="form-control" id="userId" name="userId" required>
                </div>
                <div class="form-group">
                    <label for="title">Título do post:</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="form-group">
                    <label for="body">Conteúdo do post:</label>
                    <textarea rows="4" cols="50" id="body" name="body" class="form-control" required></textarea>
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
    <script>
        $(document).ready(function () {

//            $("button[type='submit']").on('click',function(e){
//                //e.preventDefault();
//                $.ajax(addressApi+'/posts/', {
//                    method: 'POST',
//                    data: {
//                        title: 'Bruno Cesar',
//                        body: 'meu teste',
//                        userId: 2
//                    }
//                }).then(function (data) {
//                    console.log(data);
//                });
//            })

        });
    </script>
@endsection