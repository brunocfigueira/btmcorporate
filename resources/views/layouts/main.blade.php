<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Teste BTM Corporate</title>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/main.css" type="text/css">
    <script>
        var pt_BR = "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json";
        var addressApi = 'https://jsonplaceholder.typicode.com';
    </script>
</head>
<body>

<div class="container-fluid">
    <div class="row content">
        <div class="col-sm-3 sidenav">
            <h4>Candidato: Bruno César Figueira</h4>
            @include('layouts.menu')
            <br>
        </div>
        @yield('content')

    </div>
</div>
<br>
<footer class="container-fluid">
    <p>BTM Corporate - Processo seletivo - Desenvolvedor Web</p>
</footer>
@section('javascript')
@show

</body>
</html>




