<?php

namespace App\Http\Controllers;

use App\Models\Ativo;
use App\Models\Carteira;
use Illuminate\Http\Request;

class CarteiraController extends Controller
{
    public function index()
    {
        $data = Carteira::with(['ativo'])->get();
        return view('carteiras.index',compact(['data']));
    }

    public function create(Request $request)
    {
        $data = Ativo::all();
        return view('carteiras.create', (['ativos' => $data]));
    }

    public function store(Request $request)
    {

        $regras = [
            'valor' => 'required|regex:/^[0-9]{1,3}(,[0-9]{3})*(\.[0-9]+)*$/',
            'quantidade' => 'required|numeric|min:1',
        ];

        $msgs = [
            "min" => "O valor do campo :attribute precisa ser maior que :min caracteres!",
            "required" => "O valor do campo precisa ser maior :attribute é obrigatório!",
        ];

        $request->validate($regras, $msgs);

        $obj = new Ativo();
        $obj = $request->ativo;

        $obj_carteira = new Carteira();
        $obj_carteira->operacao = $request->operacao;
        $obj_carteira->quantidade = $request->quantidade;
        $obj_carteira->valor = $request->valor;
        $obj_carteira->data = $request->data;
        $obj_carteira->ativo()->associate($obj);
        $obj_carteira->save();

        return redirect()->route('carteiras.index');
    }

    public function show($id)
    {
        $dados = Carteira::find($id);
        return view('carteiras.show', compact('dados'));
    }

    public function edit($id)
    {
        $ativos = Ativo::all();
        $dados = Carteira::find($id);
        return view('carteiras.edit', compact(['ativos','dados']));
    }

    public function update(Request $request, string $id)
    {
        $obj_ativo = new Ativo();
        $obj_ativo = $request->ativos;
        $obj_carteira = Carteira::find($id);

        $obj_carteira->operacao = $request->operacao;
        $obj_carteira->quantidade = $request->quantidade;
        $obj_carteira->valor = $request->valor;
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
