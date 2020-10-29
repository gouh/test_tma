<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model {
		protected $table = 'mensajes';
		protected $primaryKey = 'id';
		protected $fillable = [
			'nombre','telefono','email','asunto','mensaje'
		];
}
