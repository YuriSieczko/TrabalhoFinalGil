<?php

namespace Tests\Feature;

use App\Models\Ativo;


use Illuminate\Foundation\Testing\RefreshDatabase;

use Tests\TestCase;

class SegundoTest extends TestCase
{

    use RefreshDatabase;

    public function testExample()
    {
        $this->assertDatabaseHas('ativos', [
            'tipo' => 'Acao',
        ]);

        $this->assertDatabaseMissing('eventos_corporativos', [
            'tipo' => 'Dividendo',
        ]);

        
    }

    public function testAtivosCreate() {
    
        $ativo = [
            'instituicao' => 'hhhh',
            'tipo' => 'Acao',
            'sigla' => 'bbb',
        ];
        $this->json('post', '/ativos', $ativo);
            
        $this->assertDatabaseHas('ativos', $ativo);
    }

    public function testUpdateAtivosReturnsCorrectData() {
       
        $ativo_atualizado = [
            'instituicao' => 'dddd',
            'tipo' => 'Acao',
            'sigla' => 'bbb',
        ];
            
        $this->json('put', '/ativos/1', $ativo_atualizado)
            ->assertFound(); 
    }

}