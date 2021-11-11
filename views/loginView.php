<link rel="stylesheet" href="static/css/signin.css">

<style>
	.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		user-select: none;
	}

	@media (min-width: 768px) {
		.bd-placeholder-img-lg {
			font-size: 3.5rem;
		}
	}
</style>

<main class="form-signin text-center">
	<form id="login-form" method="POST" action="../controllers/registro.php">
		<input type="hidden" name="action" id="action" value="login">
		<h1 class="h4 mt-3 mb-4 fw-normal">Iniciar sesión</h1>
		<div class="form-floating">
			<input type="text" class="form-control" id="username" name="usuario" placeholder="name@example.com">
			<label for="floatingInput">Usuario</label>
		</div>
		<div class="form-floating">
			<input type="password" class="form-control" name="password" id="password" placeholder="Password">
			<label for="floatingPassword">Contraseña</label>
		</div>
		<button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
        <a href="http://localhost:63342/clienteDWF/views/registro.php" >Regisrtrate</a>
	</form>
	<!-- <div class="mt-3">
		<div class="text-center">
			<a href="index.php?page=reestablecer" class="link">Reestablecer contraseña</a>
		</div>
	</div> -->
	<p class="mt-5 mb-3 text-muted">&copy; <?php echo date('Y'); ?></p>
</main>
