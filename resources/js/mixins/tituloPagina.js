function nombreTitulo (vm) {
	const { title } = vm.$options
	if (title) {
		return typeof title === 'function'
			? title.call(vm)
			: title
	}
}

export default {
  created () {
    const title = nombreTitulo(this)
    if (title) {
      document.title = title
    }
  }
}
