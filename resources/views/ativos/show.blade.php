<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Ativo</title>
</head>
<body>
    <a href="{{route('ativos.index')}}">Voltar</a>
    <br>
    <label>ID: </label>{{$dados['id']}}
    <br>
    <label>Instituicao: </label>{{$dados['instituicao']}}
    <br>
    <label>Tipo: </label>{{$dados['tipo']}}
    <br>
    <label>Sigla: </label>{{$dados['sigla']}}
</body>
</html>