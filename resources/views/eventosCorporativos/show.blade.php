<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Eventos Corporativos</title>
</head>
<body>
    <a href="{{route('eventosCorporativos.index')}}">Voltar</a>
    <br>
    <label>ID: </label>{{$dados['id']}}
    <br>
    <label>Tipo: </label>{{$dados['tipo']}}
</body>
</html>