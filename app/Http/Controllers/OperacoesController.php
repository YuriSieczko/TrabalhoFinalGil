<?php

namespace App\Http\Controllers;

use App\Models\Ativo;
use App\Models\Operacoes;
use Illuminate\Http\Request;

class OperacoesController extends Controller
{
    public function index()
    {
        $permissions = session('user_permissions');
        $operacoes = Operacoes::all();
        return view('operacoes.index', compact('operacoes', 'permissions'));
    }

    public function create()
    {
        $data = Ativo::all();
        return view('operacoes.create', (['ativos' => $data]));
    }

    public function store(Request $request)
    {
        $regras = [
            'quantidade' => 'required|integer|min:1',
            'valorUnitario' => 'required|numeric|min:0.01',
        ];

        $msgs = [
            "min" => "O valor do campo :attribute precisa ser maior que :min caracteres!",
            "required" => "O valor do campo precisa ser maior :attribute é obrigatório!",
        ];

        $request->validate($regras, $msgs);
        
        $obj_operacao = new Operacoes();
        $obj_operacao->data = $request->data;
        $obj_operacao->quantidade = $request->quantidade;
        $obj_operacao->valorUnitario = $request->valorUnitario;
        $obj_operacao->taxas = $request->taxas;
        $obj_operacao->tipoDeOperacao = $request->tipoDeOperacao;

        $obj = Ativo::find($request->ativo);
        $obj_operacao->ativo()->associate($obj);

        $obj_operacao->save();


        return redirect()->route('operacoes.index');
    }

    public function show(Operacoes $operacao)
    {
        return view('operacoes.show', compact('operacao'));
    }

    public function edit($id)
    {
        $ativos = Ativo::all();
        $operacoes = Operacoes::find($id);
        return view('operacoes.edit', compact(['ativos', 'operacoes']));
    }


    public function update(Request $request, $id)
{
        $obj_ativo = new Ativo();
        $obj_ativo = $request->ativos;

        $obj_operacao = Operacoes::find($id);
        $obj_ativo = $obj_operacao->ativo;

        $obj_operacao->data = $request->data;
        $obj_operacao->quantidade = $request->quantidade;
        $obj_operacao->valorUnitario = $request->valorUnitario;
        $obj_operacao->taxas = $request->taxas;
        $obj_operacao->tipoDeOperacao = $request->tipoDeOperacao;
        $obj_operacao->ativo()->associate($obj_ativo);
        
        $obj_operacao->save();
    

        return redirect()->route('operacoes.index');
    }

    public function destroy(Operacoes $id)
    {
        $obj = Operacoes::find($id);
        $obj->delete();

        return redirect()->route('operacoes.index');
    }
}
