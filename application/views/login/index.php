

	<form class="form-signin" id="form_login" action="<?php echo base_url('crm')?>"  method="post">

			<div class="card">
				<div class="card-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							<img src="<?php echo base_url("Public/img/logo/sixt.png")?>" style="vertical-align: middle; width: 20%">
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-12 text-center">
							<strong><h4>- Iniciar Sesion -</h4></strong>
						</div>
					</div><br>
					<div class="row">
						<div class="col-sm-12">

							<label>Correo Electronico (*)</label>
							<input class="form-control" name="correo" id="correo" autocomplete="off" placeholder="Ingrese Correo electronico..." required type="email"><br>
							<label>Contraseña (*)</label>
							<input class="form-control" type="password" autocomplete="off" required placeholder="Ingrese Contraseña..." id="password" name="password"><br>
							<button class="btn btn-info" id="btn_validar" style="width: 100%"><i class="fas fa-sign-in-alt"></i>&nbsp;Acceder</button>&nbsp;
						</div>
					</div>
				</div>
			</div>

	</form>
<!-- Modal -->
<div class="modal fade" id="preloader" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content" style="background-color: #fff0; color:white; border: 1px solid rgba(0, 0, 0, 0);">
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-12 text-center">
						<div class="spinner-border text-info" style="width: 3rem; height: 3rem;" role="status">
							<span class="sr-only">Loading...</span>
						</div>
						<h4>Iniciando Sesion en Sistema</h4>
						Espere un momento por favor.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
   $(document).ready(function(){
    <?php if($error!=""){?>
    toastr["error"]("<?php echo $error?>");
    <?php }?>
});
</script>
