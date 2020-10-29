<template>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header text-center">
						Mensaje: <strong>{{ mensaje.asunto }}</strong>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-md-12 mt-3">
								<div class="md-form mb-0">
									<label for="nombre"><strong>Nombre:</strong> {{ mensaje.nombre }}</label>
								</div>
							</div>
							<div class="col-md-12 mt-3">
									<div class="md-form mb-0">
										<label for="telefono"><strong>Telefono:</strong> {{ mensaje.telefono }}</label>
									</div>
							</div>
							<div class="col-md-12 mt-3">
									<div class="md-form mb-0">
											<label for="email"><strong>Email:</strong> {{ mensaje.email }}</label>
									</div>
							</div>
							<div class="col-md-12 mt-3">
								<div class="md-form mb-0">
									<label for="asunto"><strong>Asunto:</strong> {{ mensaje.asunto }}</label>
								</div>
							</div>

							<div class="col-md-12 mt-3">
								<div class="md-form">
									<label for="mensaje"><strong>Mensaje: </strong></label> <br>
									<nl2br tag="p" :text="mensaje.mensaje||''" />
								</div>
							</div>
							<div class="col-sm-12 mt-5">
								<router-link to="/mensajes" v-slot="{ href, navigate }">
									<button class="btn btn-sm btn-primary float-left" :href="href" @click="navigate">&lt; Volver</button>
								</router-link>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</template>

<script>
	import Nl2br from 'vue-nl2br'
	export default {
		title: 'Mensaje',
		components: {
			Nl2br
		},
		data(){
			return {
				mensaje: {}
			};
		},
		methods: {
			/**
			 * Obtiene un mensaje en especifico basandose en su id
			 */
			getMensaje(idMensaje){
				axios.get('/mensaje/' + idMensaje).then( response => {
					this.mensaje = response.data
				});
			}
		},
		mounted() {
			// Obtiene el id del mensaje en cuanto a la url
			this.getMensaje(this.$route.params.id);
		}
	}
</script>
