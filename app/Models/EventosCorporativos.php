<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventosCorporativos extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'tipo',
        'ativo_id',
        'data_recebida',
        'valor'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ativo() {
        return $this->belongsTo(Ativo::class);
    }
}
