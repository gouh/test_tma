<template>
	<!-- Hola mundo -->
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header text-center">Mensajes recibidos</div>
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12">
							<ul class="list-group" v-if="mensajes.data.length > 0">
								<li class="list-group-item" v-for="mensaje in mensajes.data" :key="mensaje.id">
									<div class="row">
										<div class="col-sm-3">
											<strong>{{ mensaje.nombre }}</strong>
										</div>
										<div class="col-sm-7">
												<strong>Asunto: </strong> {{ mensaje.asunto }}
										</div>
										<div class="col-sm-2 text-right">
											<router-link :to="'/mensaje/' + mensaje.id" v-slot="{ href, navigate }">
												<a class="btn btn-sm btn-success" :href="href" @click="navigate"><span>👁️ Ver</span></a>
											</router-link>
										</div>
									</div>
								</li>
							</ul>
							<p v-else class="text-center">Sin mensajes aún...</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<small>Mostrando de {{ mensajes.from }} a {{ mensajes.to }} de un total de {{ mensajes.total }} mensajes</small>
		</div>
		<div class="col-md-8">
				<ul class="pagination mt-3 float-right">
					<li class="page-item" v-show="mensajes['prev_page_url']">
							<a href="#" class="page-link" @click.prevent="obtenerPaginaAnterior">
									<span>
										<span aria-hidden="true">«</span>
									</span>
							</a>
					</li>
					<template v-for="link in mensajes['links']">
						<li class="page-item" v-if="link.label != '&laquo; Previous' && link.label != 'Next &raquo;' && link.label != '...'" :class="{ 'active': link.active }" :key="link.label">
								<a href="#" class="page-link" @click.prevent="obtenerPagina(link.label)">
										<span >
												{{ link.label }}
										</span>
								</a>
						</li>
					</template>
					<li class="page-item" v-show="mensajes['next_page_url']">
							<a href="#" class="page-link" @click.prevent="obtenerPaginaSiguiente">
									<span>
										<span aria-hidden="true">»</span>
									</span>
							</a>
					</li>
				</ul>
		</div>
	</div>
</template>

<script>
	export default {
		title: 'Listado de mensajes',
		data(){
			return {
				mensajes: {
					data: []
				}
			};
		},
		methods: {
			/**
			 * Obtiene el listado de mensajes que ha recibido el server
			 */
			listadoMensajes() {
				axios.get('/mensajes').then( response => {
					this.mensajes = response.data
				});
			},

			/**
			 * Funciones para obtener datos acorde a la página seleccionada
			 */
			obtenerPagina(page) {
				axios.get('mensajes?page=' + page).then( response => {
					this.mensajes = response.data
				});
			},
			obtenerPaginaAnterior() {
				axios({ baseURL : this.contactos['prev_page_url'] }).then( response => {
					this.mensajes = response.data
				});
			},
			obtenerPaginaSiguiente() {
				axios({ baseURL : this.contactos['next_page_url'] }).then( response => {
					this.mensajes = response.data
				});
			}
		},
		mounted() {
			this.listadoMensajes();
		},
	}
</script>
