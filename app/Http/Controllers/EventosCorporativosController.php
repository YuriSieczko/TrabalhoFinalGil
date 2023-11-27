<?php

namespace App\Http\Controllers;

use App\Models\EventosCorporativos;
use App\Models\Ativo;
use Illuminate\Http\Request;

class EventosCorporativosController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $eventosCorporativos = EventosCorporativos::where('user_id', $user_id)->with('ativo')->get();
        return view('eventosCorporativos.index', compact('eventosCorporativos'));
    }

    public function create()
    {
        $user_id = auth()->user()->id;
        $ativos = Ativo::all();
        return view('eventosCorporativos.create', compact('user_id' , 'ativos'));
    }

    public function store(Request $request)
    {
        $eventoCorporativo = new EventosCorporativos();
        $eventoCorporativo->tipo = $request->tipo;
        $eventoCorporativo->data_recebida = $request->data_recebida;
        $eventoCorporativo->valor = $request->valor;
        $eventoCorporativo->user_id = auth()->user()->id;
        $ativo = Ativo::find($request->ativo);
        $eventoCorporativo->ativo()->associate($ativo);

        $eventoCorporativo->save();

        return redirect()->route('eventosCorporativos.index');
    }

    public function show($id)
    {
        $eventoCorporativo = EventosCorporativos::with('ativo')->find($id);
        return view('eventosCorporativos.show', compact('eventoCorporativo'));
    }

    public function edit($id)
    {
        $eventoCorporativo = EventosCorporativos::find($id);
        $ativos = Ativo::all();
        return view('eventos_corporativos.edit', compact('eventoCorporativo', 'ativos'));
    }

    public function update(Request $request, $id)
    {
        $eventoCorporativo = EventosCorporativos::find($id);
        $eventoCorporativo->tipo = $request->tipo;
        $eventoCorporativo->fonte_pagadora = $request->fonte_pagadora;
        $eventoCorporativo->data_recebida = $request->data_recebida;
        $eventoCorporativo->valor = $request->valor;

        $ativo = Ativo::find($request->fonte_pagadora);
        $eventoCorporativo->ativo()->associate($ativo);

        $eventoCorporativo->save();

        return redirect()->route('eventosCorporativos.index');
    }

    public function destroy($id)
    {
        $eventoCorporativo = EventosCorporativos::find($id);
        $eventoCorporativo->delete();

        return redirect()->route('eventosCorporativos.index');
    }
}

