<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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

	/**
	 * Sanitiza y guarda los datos del correo
	 *
	 * @param Request $req
	 * @return array
	 */
	public function guardarMensaje(Request $req) {
		$mensaje = new Mensaje;
		$mensaje->nombre = filter_var($req->nombre, FILTER_SANITIZE_STRING);
		$mensaje->telefono = filter_var($req->telefono, FILTER_SANITIZE_STRING);
		$mensaje->email = filter_var($req->email, FILTER_SANITIZE_STRING);
		$mensaje->asunto = filter_var($req->asunto, FILTER_SANITIZE_STRING);
		$mensaje->mensaje = filter_var($req->mensaje, FILTER_SANITIZE_STRING);
		if($mensaje->save()){
			return [
				'success' => true,
				'message' => 'Se envio su información correctamente',
				'data' => $mensaje
			];
		}

		return [
			'success' => false,
			'menssage' => 'No se pudo enviar su información',
			'data' => null
		];
	}
}
