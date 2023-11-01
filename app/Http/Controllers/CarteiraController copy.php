<?php

namespace App\Http\Controllers;

use App\Models\Ativo;
use App\Models\Carteira;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarteiraController extends Controller
{
    public function index()
    {
        $permissions = session('user_permissions');
        $data = Carteira::all();
        return view('carteiras.index', compact('data', 'permissions'));
    }
    

    public function create(Request $request)
    {
        $data = Ativo::all();
        return view('carteiras.create', (['ativos' => $data]));
    }

    public function store(Request $request)
    {
        $regras = [
            'quantidade' => 'required|integer|min:1',
            'valor' => 'required|numeric|min:0.01',
        ];

        $msgs = [
            "min" => "O valor do campo :attribute precisa ser maior que :min caracteres!",
            "required" => "O valor do campo precisa ser maior :attribute é obrigatório!",
        ];

        $request->validate($regras, $msgs);

        $obj_carteira = new Carteira();
        $obj_carteira->user_id = Auth::id(); // Adicionando o id do usuário logado
        $obj_carteira->operacao = $request->operacao;
        $obj_carteira->quantidade = $request->quantidade;
        $obj_carteira->valor = $request->valor;
        $obj_carteira->total = $request->quantidade * $request->valor;
        $obj_carteira->data = $request->data;

        // Certifique-se de ter o use App\Models\Ativo; no início do arquivo, se ainda não tiver
        $obj = Ativo::find($request->ativo);
        $obj_carteira->ativo()->associate($obj);

        $obj_carteira->save();

        return redirect()->route('carteiras.index');
    }



    public function edit($id)
    {
        $ativos = Ativo::all();
        $dados = Carteira::find($id);
        return view('carteiras.edit', compact(['ativos', 'dados']));
    }

    public function update(Request $request, string $id)
    {
        $obj_ativo = new Ativo();
        $obj_ativo = $request->ativos;

        $obj_carteira = Carteira::find($id);
        $obj_ativo = $obj_carteira->ativo;

        $obj_carteira->operacao = $request->operacao;
        $obj_carteira->quantidade = $request->quantidade;
        $obj_carteira->valor = $request->valor;
        $obj_carteira->total = $request->quantidade * $request->valor;
        $obj_carteira->data = $request->data;
        $obj_carteira->ativo()->associate($obj_ativo);
        $obj_carteira->save();

        return redirect()->route('carteiras.index');
    }

    public function destroy($id)
    {
        $obj = Carteira::find($id);
        $obj->delete();

        return redirect()->route('carteiras.index');
    }
}