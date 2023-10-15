<?php

namespace App\Http\Controllers\Auth;

use App\Facades\UserPermissions;
use App\Http\Controllers\Controller;
use App\Http\Controllers\PermissionController;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

// responsável por
// configurar a sessão de autenticação do usuário.

class AuthenticatedSessionController extends Controller
{
    /**
     * tela loguin
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * solicitação de autenticação
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        UserPermissions::loadPermissions(Auth::user()->type_id);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Desloga.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
