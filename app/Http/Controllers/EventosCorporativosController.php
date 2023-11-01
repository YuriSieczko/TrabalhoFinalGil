<?php

namespace App\Http\Controllers;

use App\Models\EventosCorporativos;
use Illuminate\Http\Request;

class EventosCorporativosController extends Controller
{
    public function index()
    {
        $permissions = session('user_permissions');
        $eventosCorporativos = EventosCorporativos::where('user_id', auth()->user()->id)->get();
        return view('eventosCorporativos.index', compact('permissions', 'eventosCorporativos'));
    }

    public function create(Request $request)
    {
        $user_id = auth()->user()->id;
        return view('eventosCorporativos.create', compact('user_id'));
    }

    public function store(Request $request)
    {

        $eventoCorporativo = new EventosCorporativos();
        $eventoCorporativo->user_id = auth()->user()->id; // Adicionando o id do usuário logado
        $eventoCorporativo->tipo = $request->tipo;

        $eventoCorporativo->save();

        return redirect()->route('eventosCorporativos.index');
    }

    public function show($id)
    {
        $dados = EventosCorporativos::find($id);
        return view('eventosCorporativos.show', compact('data'));
    }

    public function edit($id)
    {
        $dados = EventosCorporativos::find($id);
        return view('eventosCorporativos.edit', compact('dados'));
    }

    public function update(Request $request, $id)
    {
        $reg = EventosCorporativos::find($id);
        $reg->fill([
            "tipo" => $request->tipo,
        ]);
        $reg->save();

        return redirect()->route('eventosCorporativos.index');
    }

    public function destroy($id)
    {
        $obj = EventosCorporativos::find($id);
        $obj->delete();

        return redirect()->route('eventosCorporativos.index');
    }
}
