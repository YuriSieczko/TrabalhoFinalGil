@extends('templates.main', ['titulo' => "Carteiras", 'rota' => "carteiras.create"])

@section('titulo') Carteiras @endsection

@section('conteudo')
    <div class="row">
        <div class="col">
            <x-datatable 
                title="Carteiras" 
                crud="carteiras" 
                :header="['id', 'operacao', 'quantidade', 'valor', 'data']" 
                :data="$data"
                :acoes="[true, true, true]"
            /> 
        </div>
    </div>
@endsection