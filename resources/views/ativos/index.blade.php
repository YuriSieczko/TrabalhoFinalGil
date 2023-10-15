@extends('templates.main', ['titulo' => "Ativos", 'rota' => "ativos.create"])

@section('titulo') Ativos @endsection

@section('conteudo')
<div class="row">
    <div class="col">
        <x-datatable 
            title="Ativos" 
            crud="ativos" 
            :header="['id','instituicao', 'tipo', 'sigla']" 
            :data="$ativos"
            :acoes="[true, true, true, true]"
        /> 
    </div>
</div>
@endsection
