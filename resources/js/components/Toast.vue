<template>
	<div class="toast" style="position: absolute; top: 0; right: 0;" data-delay="5000" id="toastError">
		<div class="toast-header">
			<strong class="mr-auto">{{ titulo }}</strong>
			<small>Ahora</small>
		</div>
		<div class="toast-body" v-html="mensaje"></div>
	</div>
</template>

<script>
export default {
	props: ['titulo', 'mensaje']
}
</script>
