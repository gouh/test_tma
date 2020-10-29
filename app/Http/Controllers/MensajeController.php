<?php

namespace App\Http\Controllers;
use App\Models\Mensaje;

class MensajeController extends Controller {

	/**
	 * Muestra los mensajes en un paginación
	 *
	 * @return array
	 */
	public function index() {
		return Mensaje::orderBy('id', 'DESC')->paginate(5);
	}

	/**
	 * Muestra un mensaje en especifico
	 *
	 * @param number $id
	 * @return array
	 */
	public function mostrarMensaje($id) {
		return Mensaje::findOrFail($id);
	}
}
