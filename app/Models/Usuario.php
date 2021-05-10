<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
	use HasFactory;
	protected $table = 'usuarios';
	protected $guard = 'usuarios';

	protected $fillable = [
		'id',
		'nome',
		'email',
		'senha',
	];

	public function doacoes()
	{
		return $this->hasMany(Doacao::class, 'usuario_id', 'id');
	}

	public function favoritos()
	{
		return $this->hasMany(Favorito::class, 'usuario_id', 'id');
	}


	public function getAuthPassword()
	{
		return $this->senha;
	}
}
