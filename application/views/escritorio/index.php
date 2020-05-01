<style>
	a:hover {
		color:
			#606060;
		text-decoration: none;
	}
	a {
		color:
			#606060;
		text-decoration: none;
	}
	.card-jo:hover {

		background-color: #9fe2ff;
		border-bottom: #0083ff 6px solid;

	}
</style>
<!-- MENU VAR -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark" style="border-bottom: #0070D2 3px solid;">
		<h4>MC Laren</h4>
		<div class="collapse navbar-collapse" id="navbarCollapse">
			<ul class="navbar-nav mr-auto">
				<li>
					escritorio
				</li>
			</ul> 
			<ul class="navbar-nav ml-md-auto">
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
<div class="container">
	<div class="row">
		<div class="col-sm-12">
			<h3>Modulos de Sistema</h3>
		</div>
	</div><br>
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<?php foreach ($usuario as $user) {
					 $modulo =  $user->modulo;
					 $ruta = strtolower($user->url);	?>
					<div class="col-sm-12 col-md-3 col-lg-2 col-xl-2">
						<a href="<?php echo base_url($ruta)?>">
							<div class="card card-jo">
								<div class="card-body text-center">
									<i class="<?php echo $user->icono; ?>"></i>
									<h6><?php echo $modulo ;?></h6>
								</div>
							</div>
						</a>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
