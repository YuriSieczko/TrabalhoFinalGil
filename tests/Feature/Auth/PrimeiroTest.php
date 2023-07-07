<?php

namespace Tests\Feature;

use Tests\TestCase;

class PrimeiroTest extends TestCase
{
    public function testValidacaoAtivos(){
        $response = $this->post('/ativos', [
            'instituicao' => 'ssss',
            'tipo' => 'Acao',
            'sigla' => 'bbb',
        ]);
        $response->assertValid();        
    }

    public function testValidacaoCarteira(){
        $response = $this->post('/carteiras', [
            'operacao' => 'c',
            'quantidade' => 1,
            'valor' => '300',
            'data' => '23',
            'ativo' => '1',
        ]); 
        $response->assertValid();        
    }
}