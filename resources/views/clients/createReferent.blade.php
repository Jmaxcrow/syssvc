@extends('principal')

@section('title')
 :: Nuevo Referente ::
@stop

@section('content')
	<style>
		#seeGift {
			margin-top: 20px;
		}
	</style>
@stop

	
	<div class="container">
		<h2 class="col-md-8">Nuevo Referente: <a href="#" role="button" data-toggle="modal" data-target="#verCliente" data-row="1" data-value="1" class="seeClient">{{ 'John Perez' }} </a></h2>
		<div class="col-md-4"><button type="button" role="button" data-toggle="modal" data-target="#verPromesa" data-value="4"  id="seeGift" class="btn btn-info btn-large">Ver Promesa</button></div>
		<hr class="separator">
		<h3 class="col-md-12"> Lista de Referentes </h3>
		@include('clients.listClients')

		<!-- Ver Cliente -->
		<div class="modal fade" tabindex="-1" role="dialog" id="verPromesa">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		       	<h3 class="modal-title" style="color: blue; font-weight: bold;">Ver Promesa</h3>
		      </div>
		      <div class="modal-body">
		        <textarea name="" id="giftSaved" rows="10" class="form-control">Al Cliente se le dara el siguiente producto: Licuadora, si al menos 4 Clientes compran algún servicio o producto.</textarea>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-primary" id="saveGift">Guardar</button></a>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
		      </div>
		    </div><!-- /.modal-content -->
		  </div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	</div>

	{!! Html::script('assets/js/jquery.js') !!}
	{!! Html::script('assets/js/jquery.min.js') !!}
</body>
</html>