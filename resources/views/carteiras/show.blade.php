<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Curso</title>
</head>
<body>
    <a href="{{route('carteiras.index')}}">Voltar</a>
    <br>
    <label>ID: </label>{{$dados['id']}}
    <br>
    <label>Operaçao: </label>{{$dados['operacao']}}
    <br>
    <label>Quantidade: </label>{{$dados['quantidade']}}
    <br>
    <label>Valor: </label>{{$dados['valor']}}
    <br>
    <label>Data: </label>{{$dados['data']}}
</body>
</html>