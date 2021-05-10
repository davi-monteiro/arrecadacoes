<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doacao extends Model
{
	use HasFactory;
	protected $table = 'doacoes';

	protected $fillable = [
		'id',
		'usuario_id',
		'valor',
		'instituicao_id',
		'recorrencia',
	];


	public function usuario()
	{
		return $this->belongsTo(Usuario::class, 'usuario_id');
	}

	public function instituicao()
	{
		return $this->belongsTo(Instituicao::class, 'instituicao_id');
	}
}
