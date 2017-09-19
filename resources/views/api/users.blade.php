@extends("layouts.main")
@section('content')
    <div class="col-sm-9">
        <h2>Usuários</h2>
        <p>Lista de usuários utiliando consumo de API https://jsonplaceholder.typicode.com/users.</p>
        <p>Exibição: Jquery DataTable</p>
        <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Website</th>
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
                "ajax": {"url": addressApi + '/users/', "dataSrc": ""},
                "columns": [
                    {"data": "id"},
                    {"data": "name"},
                    {"data": "email"},
                    {"data": "phone"},
                    {"data": "website"}
                ]
            });
        });
    </script>
@endsection