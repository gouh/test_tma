<template>
	<div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
		<toast :titulo="tituloToast" :mensaje="mensajeToast"></toast>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header text-center">Formulario de contacto</div>
					<div class="card-body">
						<div class="row">
							<div class="col-sm-12 text-center">
								<small>Los campos marcados con (*) son obligatorios</small>
							</div>
							<div class="col-md-12 mt-3">
								<div class="md-form mb-0">
									<label for="nombre">* Nombre</label>
									<input type="text" autocomplete="off" id="nombre" name="nombre" v-model="nombre" class="form-control" placeholder="Ej. Arya Stark" :maxlength="100">
								</div>
							</div>
							<div class="col-md-12 mt-3">
								<div class="md-form mb-0">
									<label for="telefono">* Telefono</label>
									<input type="text" autocomplete="off" id="telefono" name="telefono" v-model="telefono" class="form-control" @input="formatoTelefono" placeholder="Ej. (443) 207-6521">
								</div>
							</div>
							<div class="col-md-12 mt-3">
								<div class="md-form mb-0">
									<label for="email">* Email</label>
									<input type="text" autocomplete="off" id="email" name="email" v-model="email" class="form-control" placeholder="Ej. stan@smith.net" :maxlength="100">
								</div>
							</div>
							<div class="col-md-12 mt-3">
								<div class="md-form mb-0">
									<label for="asunto">* Asunto</label>
									<input type="text" autocomplete="off" id="asunto" name="asunto" v-model="asunto" class="form-control" placeholder="" :maxlength="50">
								</div>
							</div>

							<div class="col-md-12 mt-3">
								<div class="md-form">
									<label for="mensaje">Mensaje</label>
									<textarea type="text" autocomplete="off" id="mensaje" name="mensaje" v-model="mensaje" rows="6" class="form-control md-textarea" :maxlength="255"></textarea>
									<small>{{ mensaje.length }}/255</small>
								</div>
							</div>

							<div class="col-sm-12 mt-3">
								<button type="button" class="btn btn-success float-right" @click="validarFormulario()">Enviar</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import Toast from '../components/Toast.vue';
	export default {
		components: {
			'toast': Toast
		},
		data(){
			return {
				tituloToast:'',
				mensajeToast:'',
				errores: [],

				nombre: '',
				telefono: '',
				email: '',
				asunto: '',
				mensaje: ''
			};
		},
		methods: {
			/**
			 * Le da un formato mas presentable al telefono del usuario
			 */
			formatoTelefono() {
				let x = this.telefono.replace(/\D/g, '').match(/(\d{0,3})(\d{0,3})(\d{0,4})/);
				this.telefono = !x[2] ? x[1] : '(' + x[1] + ') ' + x[2] + (x[3] ? '-' + x[3] : '');
			},

			/**
			 * Valida el email
			 */
			validEmail: function (email) {
				let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				return re.test(email);
			},

			/**
			 * Valida el formulario y si este es valido envia los datos
			 * al servidor
			 */
			validarFormulario(){
				this.errores = []
				if(!this.nombre){
					this.errores.push('El <b>nombre</b> es obligatorio.')
				}

				if(!this.telefono){
					this.errores.push('El <b>telefono</b> es obligatorio.')
				}else if(this.telefono.length < 14){
					this.errores.push('El <b>telefono</b> no es valido.')
				}

				if(!this.email){
					this.errores.push('El <b>email</b> es obligatorio.')
				} else if (!this.validEmail(this.email)) {
					this.errores.push('El <b>email</b> debe ser válido.');
				}

				if(!this.asunto){
					this.errores.push('El <b>asunto</b> es obligatorio.')
				}

				// muestra los errores
				if (this.errores.length) {
					this.tituloToast = 'Error de validación'
					this.mensajeToast = this.errores.join('<br>')
					window.$('#toastError').toast('show')
					return;
				}

				// Envia los datos al servidor por medio de axios
				axios.post('mensaje', {
					nombre: this.nombre,
					telefono: this.telefono,
					email: this.email,
					asunto: this.asunto,
					mensaje: this.mensaje
				})
					.then(response => {
						this.tituloToast = 'Error'
						if (response.data.success) {
							this.tituloToast = 'Ok'
						}
						this.mensajeToast = response.data.message
						window.$('#toastError').toast('show')
					})
					.catch(error => {
						this.tituloToast = 'Error al intentar enviar su mensaje'
						this.mensajeToast = error.message
						window.$('#toastError').toast('show')
					})
					.finally(_ => {
						this.nombre = ''
						this.telefono = ''
						this.email = ''
						this.asunto = ''
						this.mensaje = ''
					})
			}
		}
	}
</script>
