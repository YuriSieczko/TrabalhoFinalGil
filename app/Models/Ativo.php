<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ativo extends Model
{
    protected $fillable = ['instituicao', 'tipo', 'sigla'];
    use SoftDeletes;
    use HasFactory;

    public function carteira() {
        return $this->belongsToMany('App\Models\Carteira');
    }
}
