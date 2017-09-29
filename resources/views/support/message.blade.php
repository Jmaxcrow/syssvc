@extends('principal')

@section('title')
	Ooops
@stop

@section('content')

<style>
	.container {
		height: 80vh;
		/* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#1e5799+0,1e5799+32,1e5799+65,1e5799+65,7db9e8+100 */
		background: #1e5799; /* Old browsers */
		background: -moz-linear-gradient(top, #1e5799 0%, #1e5799 32%, #1e5799 65%, #1e5799 65%, #7db9e8 100%); /* FF3.6-15 */
		background: -webkit-linear-gradient(top, #1e5799 0%,#1e5799 32%,#1e5799 65%,#1e5799 65%,#7db9e8 100%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(to bottom, #1e5799 0%,#1e5799 32%,#1e5799 65%,#1e5799 65%,#7db9e8 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e5799', endColorstr='#7db9e8',GradientType=0 ); /* IE6-9 */
		
		}

		h2 {
			color: white;
		}
</style>
<div class="container">
	<h2>{{ $message }}</h2>
</div>
@stop
