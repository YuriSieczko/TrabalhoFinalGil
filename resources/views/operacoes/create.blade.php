@extends('templates.main', ['titulo' => "Nova Operação"])

@section('titulo') Operações @endsection

@section('conteudo')
    <form action="{{ route('operacoes.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input 
                        type="date" 
                        class="form-control {{ $errors->has('data') ? 'is-invalid' : '' }}" 
                        name="data" 
                        placeholder="Data"
                        value="{{ old('data') }}"
                    />
                    @if($errors->has('data'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('data') }}
                        </div>
                    @endif
                    <label for="data">Data</label>
                </div>
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
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input 
                        type="number" 
                        class="form-control {{ $errors->has('quantidade') ? 'is-invalid' : '' }}" 
                        name="quantidade" 
                        placeholder="Quantidade"
                        value="{{ old('quantidade') }}"
                    />
                    @if($errors->has('quantidade'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('quantidade') }}
                        </div>
                    @endif
                    <label for="quantidade">Quantidade</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                    <input 
                        type="number" 
                        step="0.01" 
                        class="form-control {{ $errors->has('valorUnitario') ? 'is-invalid' : '' }}" 
                        name="valorUnitario" 
                        placeholder="Valor Unitário"
                        value="{{ old('valorUnitario') }}"
                    />
                    @if($errors->has('valorUnitario'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('valorUnitario') }}
                        </div>
                    @endif
                    <label for="valorUnitario">Valor Unitário</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form-floating mb-3">
                    <input 
                        type="number" 
                        step="0.01" 
                        class="form-control {{ $errors->has('taxas') ? 'is-invalid' : '' }}" 
                        name="taxas" 
                        placeholder="Taxas"
                        value="{{ old('taxas') }}"
                    />
                    @if($errors->has('taxas'))
                        <div class='invalid-feedback'>
                            {{ $errors->first('taxas') }}
                        </div>
                    @endif
                    <label for="taxas">Taxas</label>
                </div>
            </div>
            <div class="col">
                <div class="form-floating mb-3">
                <select class="form-select form-select-sm" aria-label="Default select example" name="tipoDeOperacao" required>
                        <option value=""></option>
                        <option value="Compra">Compra</option>
                        <option value="Venda">Venda</option>
                    </select>
                    <label for="tipoDeOperacao">Tipo de Operação</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('operacoes.index') }}" class="btn btn-secondary btn-block align-content-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                        <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                    </svg>
                    &nbsp; Voltar
                </a>
                <button type="submit" class="btn btn-success btn-block align-content-center">
                    Confirmar &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </svg>
                </button>
            </div>
        </div>
    </form>
@endsection
