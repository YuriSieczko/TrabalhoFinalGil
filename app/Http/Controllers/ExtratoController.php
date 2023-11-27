<?php

namespace App\Http\Controllers;

use App\Models\EventosCorporativos;


class ExtratoController extends Controller
{
    public function index()
    {
        $permissions = session('user_permissions');
        $eventosCorporativos = EventosCorporativos::where('user_id', auth()->user()->id)
            ->get()
            ->sortBy('data_recebida') // Ordenando os eventos por data
            ->groupBy(function ($item) {
                // Convertendo a string de data para um objeto DateTime
                $data = \DateTime::createFromFormat('Y-m-d', $item->data_recebida);
                return $data->format('m/Y'); // Agrupando pela data formatada
            });

        return view('extratos.index', compact('eventosCorporativos', 'permissions'));
    }


    // Restante do seu código...
}

