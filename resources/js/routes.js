import Vue from 'vue'
import VueRouter from 'vue-router'

import FormularioContacto from './views/FormularioContacto'
import ListadoMensajes from './views/ListadoMensajes'
import Mensaje from './views/Mensaje'
import NotFound from './views/404'

Vue.use(VueRouter)
export default new VueRouter({
	mode: 'history',
	routes:[
		{
			path: '/',
			name: 'formularioContacto',
			component:  FormularioContacto
		},
		{
			path: '/mensajes',
			name: 'listadoMensajes',
			component: ListadoMensajes
		},
		{
			path: '/mensaje/:id',
			name: 'verMensaje',
			component: Mensaje
		},
		{
			path: '*',
			component:  NotFound
		}
	]
});
