<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carteira;

class CarteiraController extends Controller
{
    public function index()
    {
        $permissions = session('user_permissions');
        $data = Carteira::all();
        return view('carteiras.index', compact('data', 'permissions'));
    }

    public function create()
    {
        return view('carteiras.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        Carteira::create($request->all());

        return redirect()->route('carteiras.index');
    }

    public function edit(Carteira $carteira)
    {
        $carteira = Carteira::find($carteira);
        return view('carteiras.edit', compact('carteira'));
    }

    public function update(Request $request, Carteira $carteira)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
        ]);

        $carteira->update($request->all());

        return redirect()->route('carteiras.index')
            ->with('success', 'Carteira atualizada com sucesso');
    }

    public function destroy($id)
    {
        $obj = Carteira::find($id);
        $obj->delete();

        return redirect()->route('carteiras.index');
    }
}
