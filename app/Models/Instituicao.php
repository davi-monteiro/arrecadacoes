<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;
    protected $table = 'instituicoes';

    protected $fillable = [
        'id',
        'nome',
        'email',
        'resumo',
    ];


    public function doacoes()
    {
        return $this->hasMany(Doacao::class, 'instituicao_id', 'id');
    }

    public function favoritos()
    {
        return $this->hasMany(Favorito::class, 'instituicao_id', 'id');
    }
}
