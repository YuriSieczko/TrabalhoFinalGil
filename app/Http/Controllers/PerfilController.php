<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function index()
    {
        $permissions = session('user_permissions');
        
        return view('perfil.index',compact('permissions'));
    }

    public function show($id)
    {
        return view('perfil.show');
    }
}
