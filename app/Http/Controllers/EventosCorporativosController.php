<?php

namespace App\Http\Controllers;

use App\Models\EventosCorporativos;
use Illuminate\Http\Request;

class EventosCorporativosController extends Controller
{
    public function index()
    {
        $data = EventosCorporativos::all();
        return view('eventosCorporativos.index', (['eventosCorporativos' => $data]));
    }

    public function create(Request $request)
    {
        return view('eventosCorporativos.create');
    }

    public function store(Request $request)
    {
        EventosCorporativos::create([
            "tipo" => $request->tipo,
        ]);

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
