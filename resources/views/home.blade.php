@extends('layouts.app')
<style>
	.fade-enter-active, .fade-leave-active {
  transition: opacity .5s
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0
}
</style>
@section('content')
	<formulario-contacto></formulario-contacto>
@endsection
