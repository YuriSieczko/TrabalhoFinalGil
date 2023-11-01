<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carteira extends Model
{
    protected $fillable = ['operacao', 'quantidade', 'valor', 'data'];
    use SoftDeletes;
    use HasFactory;

    // public function ativo() {
    //     return $this->belongsTo(Ativo::class);
    // }

    public function ativo()
    {
        return $this->belongsTo('App\Models\Ativo');
    }



    public static function boot()
    {
        parent::boot();

        self::saving(function ($model) {
            $model->total = $model->quantidade * $model->valor;
        });
    }
}