<?php

namespace App\Http\Controllers;

use App\Facades\UserPermissions;
use App\Models\Ativo;
use Illuminate\Http\Request;

class AtivoController extends Controller
{
    public function index()
    {
        $permissions = session('user_permissions');
        $ativos = Ativo::all();
        return view('ativos.index', compact('ativos', 'permissions'));
    }

    public function create(Request $request)
    {
        if(!UserPermissions::isAuthorized('ativos.create')) {
            abort(403);
            }
            
        return view('ativos.create');
    }

    public function store(Request $request)
    {
        $regras = [
            'instituicao' => 'required|max:100|min:3',
            'sigla' => 'required|max:150|min:3',
        ];

        $msgs = [
            "required" => "O preenchimento do campo :attribute é obrigatório!",
            "max" => "O campo :attribute possui tamanho máximo de :max caracteres!",
            "min" => "O campo :attribute possui tamanho mínimo de :min caracteres!",
        ];

        $request->validate($regras, $msgs);

        Ativo::create([
            "instituicao" => $request->instituicao,
            "tipo" => $request->tipo,
            "sigla" => $request->sigla,
        ]);

        return redirect()->route('ativos.index');
    }

    public function show($id)
    {
        $dados = Ativo::find($id);
        return view('ativos.show', compact('data'));
    }

    public function edit($id)
    {
        $dados = Ativo::find($id);
        return view('ativos.edit', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $reg = Ativo::find($id);
        $reg->fill([
            "instituicao" => $request->instituicao,
            "tipo" => $request->tipo,
            "sigla" => $request->sigla,
        ]);
        $reg->save();

        return redirect()->route('ativos.index');
    }

    public function destroy($id)
    {
        $obj = Ativo::find($id);
        $obj->delete(); 

        return redirect()->route('ativos.index');
    }
}