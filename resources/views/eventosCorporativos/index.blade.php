@extends('templates.main', ['titulo' => "Eventos Corporativos", 'rota' => "eventosCorporativos.create"])

@section('titulo') Eixos @endsection

@section('conteudo')
<div class="row">
        <div class="col">
            <x-datatable 
                title="Eventos Corporativos" 
                crud="eventosCorporativos" 
                :header="['id','tipo', 'valor', 'ativo_id', 'data_recebida']"
                :data="$eventosCorporativos"
                :acoes="[true, false, true]"
            /> 
        </div>
    </div>
@endsection