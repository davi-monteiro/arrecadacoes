<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorito extends Model
{
	use HasFactory;
	protected $table = 'favoritos';

	protected $fillable = [
		'id',
		'usuario_id',
		'instituicao_id',
	];

	public function instituicao()
	{
		return $this->belongsTo(Instituicao::class, 'instituicao_id');
	}
}
