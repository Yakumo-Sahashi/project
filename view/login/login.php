<?php 
	$title = 'Login'; 
	require_once 'model/redireccion.php';
	if (Sesion::validar_sesion()){
		Redireccion::redirigir("home");
	}
?>
<div class="container py-4">
	<div class="row justify-content-around text-center">
		<div class="col-md-4 py-2 rounded bg-light border shadow">
			<h1 class="mt-3 text-uppercase">Login</h1>
			<hr class="bg-primary">
			<img class="mb-2" src="<?=DEP_IMG?>favico.png" width="250px" height="250px">
			<form id="frmLogin" class="form-grup mb-3 ml-3 mr-3">
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user-alt"></i></span>
					</div>
					<input type="text" class="form-control input" name="usuario" id="usuario" required  placeholder="Usuario">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-lock"></i></span>
					</div>
					<input type="password" class="form-control input" name="password" id="password" required  placeholder="Contraseña">
				</div>
				 
				<div class="py-1">
					<button type="button" class="btn btn-blue btn-block " id="btnSesion">Iniciar Sesion</button>
					<a href="registro" class="btn btn-blue btn-block ">Registrarse</a>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="<?=CONTROLLER?>funciones_login.js"></script>