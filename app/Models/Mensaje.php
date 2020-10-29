<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mensaje extends Model {
		use HasFactory;
		public $timestamps = false;
		protected $table = 'mensajes';
		protected $primaryKey = 'id';
		protected $fillable = [
			'nombre','telefono','email','asunto','mensaje'
		];
}
