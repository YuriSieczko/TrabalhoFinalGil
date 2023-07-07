@extends('templates.main', ['titulo' => "Eixos e Áreas", 'rota' => "eventosCorporativos.create"])

@section('titulo') Eixos @endsection

@section('conteudo')
<div class="row">
        <div class="col">
            <x-datatable 
                title="Eixos e Áreas" 
                crud="eventosCorporativos" 
                :header="['id','tipo']" 
                :data="$eventosCorporativos"
                :acoes="[true, false, true]"
            /> 
        </div>
    </div>
@endsection