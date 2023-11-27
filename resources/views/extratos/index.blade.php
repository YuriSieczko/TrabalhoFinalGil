@extends('templates.main', ['titulo' => "Extrato", 'rota' => null])

@section('titulo') Extratos @endsection

@section('conteudo')
    <div class="row">
        <div class="col">
            @foreach($eventosCorporativos as $data => $eventos)
                <h3>{{ $data }}</h3>
                <x-datatable 
                    title="Extratos" 
                    crud="eventosCorporativos" 
                    :header="['id','tipo', 'ativo_id', 'valor', 'data_recebida']"
                    :data="$eventos"
                    :acoes="[false, false, false]"
                />
                <div class="row mt-2">
                    <div class="col">
                        <!-- Soma total dos valores por mês -->
                        @php
                            $somaTotalMes = $eventos->sum('valor');
                        @endphp
                        <p style="font-size: larger; font-weight: bold;"> Ganhos do Mês: {{ $somaTotalMes }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
