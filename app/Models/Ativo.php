<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ativo extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['instituicao', 'tipo', 'sigla'];

    public function carteira()
    {
        return $this->belongsToMany('App\Models\Carteira');
    }

    public function eventosCorporativos() {
        return $this->hasMany(EventosCorporativos::class);
    }
}
