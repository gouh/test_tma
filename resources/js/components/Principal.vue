<template>
	<main class="py-4">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<router-link to="/" v-slot="{ href, navigate, isExactActive  }">
						<li class="nav-item" :class="{'active': isExactActive }">
							<a class="nav-link" :href="href" @click="navigate"><span>Formulario de contacto</span></a>
						</li>
					</router-link>

					<router-link to="/mensajes" v-slot="{ href, navigate, isExactActive  }">
						<li class="nav-item" :class="{'active': isExactActive }">
							<a class="nav-link" :href="href" @click="navigate"><span>Listado de mensajes</span></a>
						</li>
					</router-link>
				</ul>
			</div>
		</nav>
		<div class="container">
			<router-view></router-view>
		</div>
	</main>
</template>
