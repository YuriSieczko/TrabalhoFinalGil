<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


class NiveisAcesso
{
    public function handle(Request $request, Closure $next, $nivel)
    {
        $niveis = array (
            1 => array (
                "cursos.index" => true,
                "eixos.index" => true,
            ),
            2 => array (
                "alunos.index" => true,
                "disciplinas.index" => true,
                "profs.index" => true,
                "cursos.index" => true,
                "cursos.create" => true,
                "cursos.show" => true,
                "cursos.store" => true,
                "cursos.edit" => true,
                "cursos.update" => true,
                "cursos.destroy" => true,
                "eixos.index" => true,
                "eixos.create" => true,
                "eixos.show" => true,
                "eixos.store" => true,
                "eixos.edit" => true,
                "eixos.update" => true,
                "eixos.destroy" => true,
            ),
            3 => array (
                "alunos.index" => true,
                "alunos.create" => true,
                "alunos.show" => true,
                "alunos.store" => true,
                "alunos.edit" => true,
                "alunos.update" => true,
                "alunos.destroy" => true,
                "disciplinas.index" => true,
                "disciplinas.create" => true,
                "disciplinas.show" => true,
                "disciplinas.store" => true,
                "disciplinas.edit" => true,
                "disciplinas.update" => true,
                "disciplinas.destroy" => true,
                "profs.index" => true,
                "profs.create" => true,
                "profs.show" => true,
                "profs.store" => true,
                "profs.edit" => true,
                "profs.update" => true,
                "profs.destroy" => true,
                "cursos.index" => true,
                "cursos.create" => true,
                "cursos.show" => true,
                "cursos.store" => true,
                "cursos.edit" => true,
                "cursos.update" => true,
                "cursos.destroy" => true,
                "eixos.index" => true,
                "eixos.create" => true,
                "eixos.show" => true,
                "eixos.store" => true,
                "eixos.edit" => true,
                "eixos.update" => true,
                "eixos.destroy" => true,
            )
        );

        $route = Route::currentRouteName();

        if($nivel == 1) {
            $acessos = $niveis[1];
        } else if($nivel == 2) {
            $acessos = $niveis[2];
        } else {
            $acessos = $niveis[3];
        }

        if(isset($acessos[$route])) {
            Log::debug('Acesso permitido');
            return $next($request);
        } 
        else {
            Log::debug('Você não tem acesso a essa rota!');
            return redirect()->route('acessoNegado');
        }

        return $next($request);
    }  
}
