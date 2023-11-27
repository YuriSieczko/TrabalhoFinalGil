@extends('templates.main', ['titulo' => "Novo Evento"])

@section('titulo') Eventos @endsection

@section('conteudo')
    <form action="{{ route('eventosCorporativos.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Evento</label>
            <select class="form-select" name="tipo" id="tipo" required>
                <option value="Dividendo">Dividendo</option>
                <option value="JCP">JCP</option>
            </select>
        </div>
        
        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="text" class="form-control" id="valor" name="valor" required>
        </div>
        
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" class="form-control" id="data_recebida" name="data_recebida" required>
        </div>
        <div class="col">
                <div class="form-floating mb-3">
                    <select class="form-select form-select-sm {{ $errors->has('ativo') ? 'is-invalid' : '' }}" name="ativo" required>
                        <option value=""></option>
                        @foreach ($ativos as $ativo)
                            <option value="{{ $ativo->id }}" {{ $ativo->id == old('ativo') ? 'selected' : '' }}>{{ $ativo->sigla }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('ativo'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('ativo') }}
                        </div>
                    @endif
                    <label for="ativo">Ativo</label>
                </div>
            </div>
        
        <div class="row">
            <div class="col">
                <a href="{{ route('eventosCorporativos.index') }}" class="btn btn-secondary btn-block">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                    </svg>
                    &nbsp; Voltar
                </a>
                <button type="submit" class="btn btn-success btn-block">
                    Confirmar &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </button>
            </div>
        </div>
    </form>
@endsection
