<?php

$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;

?>

<!-- inscrevase -->
<?php

$erro_usuario	= isset($_GET['erro_usuario'])	? $_GET['erro_usuario'] : 0;
$erro_email		= isset($_GET['erro_email'])	? $_GET['erro_email']	: 0;

?>



<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="imagem" href="imagens/drapix.png"/>
	<title>Drapix - Sua Arte aqui</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<!-- Bootstrap JQuery-->
	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script>

		$(document).ready( function(){

				//verificar se os campos de usuário e senha foram devidamente preenchidos
				$('#btn_login').click(function(){

					var campo_vazio = false;

					if($('#campo_usuario').val() == ''){
						$('#campo_usuario').css({'border-color': '#A94442'});
						campo_vazio = true;
					} else {
						$('#campo_usuario').css({'border-color': '#CCC'});
					}

					if($('#campo_senha').val() == ''){
						$('#campo_senha').css({'border-color': '#A94442'});
						campo_vazio = true;
					} else {
						$('#campo_senha').css({'border-color': '#CCC'});
					}

					if(campo_vazio) return false;
				});
			});					
		</script>
	</head>

	<body>

		<!-- Static navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" >
			<a class="navbar-brand" href="#"><img src="imagens/drapix.png" width="30" height="30" class="d-inline-block align-top" alt=""><font> Drapix </font></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
				<div class="btn-group">
					<button style="margin-right: 65px;" class="btn btn-outline-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false">
						Login
					</button>
					<div  class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="dropdownMenuButton">
						<div>
							<form class="col-md-12" method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<label for="exampleDropdownFormEmail2">User</label>
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>

								<div class="form-group">
									<label for="exampleDropdownFormPassword2">Password</label>
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								<div class="dropdown-divider dark"></div>
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br>

								<?php
								if($erro == 1){
									echo '<font color="#FF0000">Usuário e ou senha inválido(s)</font>';
								}
								?>

							</form></div>
						</div>
					</div>
				</div><!--/.nav-collapse -->
			</nav>
			<br><br>
			<div class="container" style="margin-top:30px">
				<div class="box">
					<h3 style="opacity: 0.6;">Inscreva-se já.</h3>
					<form method="post" action="registra_usuario.php" id="formCadastrarse">
						<div class="form-group">
							<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuário" required="requiored">
							<?php if($erro_usuario){ // 1/true 0/false
              					echo '<font style="color:#FF0000">Usuário já existe</font>';}?>
          				</div>
          				<div class="form-group">
          					<input type="email" class="form-control" id="email" name="email" placeholder="Email" required="requiored">
          					<?php if($erro_email){
          						echo '<font style="color:#FF0000">E-mail já existe</font>';}?>
          				</div>
          				<div class="form-group">
          					<input type="password" class="form-control" id="senha" name="senha" placeholder="Senha" required="requiored">
          				</div>
          				<div class="dropdown-divider"></div>
          				<button type="submit" class="btn btn-outline-warning form-control" >Submit</button>
      			</form>
 	 		</div>

		</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>