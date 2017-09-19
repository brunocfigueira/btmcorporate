@extends("layouts.main")
@section('content')
    <div class="col-sm-9">
        <h2>Posts dos Usuários</h2>
        <ul class="list-inline">
            <li>
                <a href="{{route('createPost')}}" class="btn btn-default">Novo</a>
            </li>
        </ul>
        <p>Lista de pots dos usuários utiliando consumo de API https://jsonplaceholder.typicode.com/photos.</p>
        <p>Exibição: Jquery DataTable</p>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Usuário</th>
                <th>Titulo</th>
                <th>Conteúdo</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
@endsection
@section('style')

@endsection

@section('javascript')
    @parent

    <script>
        $(document).ready(function () {

            $('.table').DataTable({
                "language": {
                    "url": pt_BR
                },
                //"ajax": addressApi+'/posts/1',
                "processing": true,
                //"serverSide": true,
                "ajax": {"url": addressApi + '/posts/', "dataSrc": ""},
                "columns": [
                    {"data": "id"},
                    {"data": "userId"},
                    {"data": "title"},
                    {"data": "body"},
                    {
                        "data": "id",
                        render: function (data, type, row) {
                            var url = '{{ route("editPost", ":id") }}';
                            url = url.replace(':id', data);
                            return '<a class="btn btn-primary" href="'+url+'">Editar</a>'
                        }
                    }
                ]
            });
        });
    </script>
@endsection