<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Operacoes extends Model
{
    use HasFactory;

    protected $fillable = [
        'data',
        'ativo_id',
        'quantidade',
        'valorUnitario',
        'taxas',
        'tipoDeOperacao',
    ];

    use SoftDeletes;
    use HasFactory;

    public function ativo()
    {
        return $this->belongsTo(Ativo::class);
    }
}
