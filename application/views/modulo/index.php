
	<style>
		.input-group-text {
			font-size: 12px;
		}
		.iziModal .iziModal-content {
			zoom: 1;
			width: 100%;
			-webkit-overflow-scrolling: touch;
			/* overflow-y: scroll; */
			background-color: #f3f3f3 !important;
		}
		.bootstrap-select > .dropdown-toggle {
			font-size: 12px;
			height: calc(1.5em + 0.75rem + 2px);

		}
		.iziModal .iziModal-header {
			background: #7d7d7d;
			padding: 14px 18px 15px 18px;
			box-shadow: inset 0 -10px 15px -12px rgba(0, 0, 0, 0.3), 0 0 0px #555;
			overflow: hidden;
			position: relative;
			z-index: 10;
		}
	
	</style>
	<!-- MENU VAR -->
	<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="border-bottom: #0070D2 3px solid;">
		<h4>MC Laren</h4>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<div class="col-sm-6" style="display: inline-flex; margin-top: -1px; margin-bottom: -16px;">
            	<ol class="breadcrumb float-sm-left" style="background-color: #49505700;">
              		<li class="breadcrumb-item"><a href="#" style="color: white !important;"><i class="fas fa-desktop"></i>  Escritorio</a></li>
              		<li class="breadcrumb-item active" style="color: white !important;"><i class="fas fa-user-tie"></i> Usuario</li>
            	</ol>
          	</div>
			<ul class="navbar-nav ml-md-auto" >
				<li class="nav-item dropdown">
					<a class="nav-item nav-link dropdown-toggle mr-md-2" href="#" id="bd-versions" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Bienvenido <?php echo $this->session->userdata('nombre')." ".$this->session->userdata('apellido')?>
						<input type="hidden" id="url" value="<?php echo base_url();?>">
						<input type="hidden" id="idUsuario" value="<?php echo $this->session->userdata('id_usuario');?>">
					</a>
					<div class="dropdown-menu dropdown-menu-md-right" aria-labelledby="bd-versions">
						<a class="dropdown-item" href="#" id="btncerrarsession">Cerrar Sesion</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
	<!-- FIN DE MENU VAR -->
	<div class="container-fluid">
	<div class="card">
		<div class="card-header">
			<div class="row">
				<div class="col-sm-4">
				<i class="fas fa-user-tie fa-4x"></i><h5 style="display: -webkit-inline-box; margin-left: 13px;">Usuario</h5>
				</div>
				<div class="col-sm-8 text-right">
					<button class="btn btn-outline-success btn-sm"  class="btn btn-primary" id="userNew">Nuevo Usuario</button>
					<button type="button" id="asignarModulo" class="btn btn-outline-secondary  btn-sm">Asignar Modulo</button>
					<button type="button" id="editar" class="btn btn-outline-warning  btn-sm">Editar</button>
					<button type="button" id="darBajaAlta" class="btn btn-outline-danger  btn-sm">Dar de Baja</button>
					
				</div>
			</div>
			<div class="row">
				<div class="col-sm-8">

				</div>
			</div>
		</div>
		<div class="card-body" style="font-size: 13px; font-family: sans-serif;">
			
				<div class="row">
					<div class="col-sm-12">
						<table id="listaUsuario" class="display nowrap form control " style="width:100%">
							<thead>
							<tr>
								<th  style="width:20%">Nombre</th>
								<th style="width:20%">Apellido</th>
								<th style="width:20%">Cargo</th>
								<th style="width:20%">Correo</th>
								<th style="width:10%">Status</th>
								<th style="width:10%"> </th>
							</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Modal structure -->
<div class="modal fade bd-example-modal-lg" id="modalNewUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: #0000005e; color: white;">
        <h5 class="modal-title titulo-panel" id="exampleModalLabel">Registrar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  	<div id="error_mensaje" style="text-align: justify;" style="margin-top: 9px;">
            <div class="col-12">
                <div id="cuerpo_mensaje" class="alert alert-warning" role="alert"background-color: #f44336c9; color: white;>
                </div>
            </div>
        </div>	
        <form>
			
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						<label for="recipient-name" class="col-form-label">D.N.I</label>
						<input type="text"  class="form-control alerta" id="dni">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<label for="recipient-name" class="col-form-label">Nombre</label>
					<input type="text"  class="form-control alerta" id="nombre">
				</div>
				<div class="col-6">
					<label for="recipient-name" class="col-form-label">Apellido</label>
					<input type="text"  class="form-control alerta" id="apellido">
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<label for="recipient-name" class="col-form-label">Cargo</label>
					<input type="text"  class="form-control alerta" id="cargo">
				</div>
				<div class="col-6">
					<label for="recipient-name" class="col-form-label">Correo</label>
					<input type="text"  class="form-control alerta" id="correo">
				</div>
			</div>
			<div class="row">
				<div class="col-6">
					<label for="recipient-name" class="col-form-label">Contraseña</label>
					<input type="password"  class="form-control alerta" id="password">
				</div>
				<div class="col-6">
					<label for="recipient-name" class="col-form-label">Repetir Contraseña</label>
					<input type="password"  class="form-control alerta" id="password2">
				</div>
			</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="cerrar_modal_usuario" data-dismiss="modal">Cancelar</button>
		<button type="button" class="btn btn-warning" id="actualizarUsuario" style="background-color: #eda13c; color: white;">Actualizar</button>
        <button type="button" class="btn btn-warning" id="guardarUsuario" style="background-color: #eda13c; color: white;">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal" id="preloader" style="z-index: 99999 !important" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="background-color: #fff0; color:white; border: 1px solid rgba(0, 0, 0, 0);">
      <div class="modal-body">
   		<div class="row">
			<div class="col-sm-12 text-center">
				<div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
				  <span class="sr-only">Loading...</span>
				</div>
				<h4>Guardando Cambios Realizados</h4>
			</div>
		</div>
      </div>
    </div>
  </div>
</div>
	<!-- Modal -->
	<div class="modal fade" id="confirmation" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<div id="body_confirmation">

					</div>
				</div>
			</div>
		</div>
	</div>
	<script>

	</script>
	<script type="text/javascript" src="<?php echo base_url('js/usuario.js') ?>"></script>