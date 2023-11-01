@extends('templates.main', ['titulo' => "Operações", 'rota' => "operacoes.create"])

@section('titulo') Operações @endsection

@section('conteudo')
    <div class="row">
        <div class="col">
            <x-datatable 
                title="Operações" 
                crud="operacoes" 
                :header="['id', 'quantidade', 'valorUnitario', 'taxas', 'tipoDeOperacao']" 
                :data="$operacoes"
                :acoes="[true, true, true, true, true]"
            /> 
        </div>
    </div>
@endsection
