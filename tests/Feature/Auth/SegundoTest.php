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

}