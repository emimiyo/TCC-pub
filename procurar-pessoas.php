<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$objDb = new db();
$link = $objDb->conecta_mysql();

$id_usuario = $_SESSION['id_usuario'];

	//--qtde de posts
$sql = " SELECT COUNT(*) AS qtde_posts FROM post WHERE id_usuario = $id_usuario ";
$resultado_id = mysqli_query($link, $sql);
$qtde_posts = 0;
if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
	$qtde_posts = $registro['qtde_posts'];
} else {
	echo 'Erro ao executar a query';
}

	//--qtde de seguidores
$sql = " SELECT COUNT(*) AS qtde_seguires FROM usuarios_seguidores WHERE seguindo_id_usuario = $id_usuario ";
$resultado_id = mysqli_query($link, $sql);
$qtde_seguidores = 0;
if($resultado_id){
	$registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC);
	$qtde_seguidores = $registro['qtde_seguires'];
} else {
	echo 'Erro ao executar a query';
}

?>

<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="imagem" href="imagens/drapix.png"/>
	<title>Drapix</title>

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<!-- bootstrap - link cdn -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<script type="text/javascript">

		$(document).ready( function(){

				//associar o evento de click ao botão
				$('#btn_procurar_pessoa').click( function(){
					
					if($('#nome_pessoa').val().length > 0){
						
						$.ajax({
							url: 'get_pessoas.php',
							method: 'post',
							data: $('#form_procurar_pessoas').serialize(),
							success: function(data) {
								$('#pessoas').html(data);

								$('.btn_seguir').click( function(){
									var id_usuario = $(this).data('id_usuario');

									$('#btn_seguir_'+id_usuario).hide();
									$('#btn_deixar_seguir_'+id_usuario).show();

									$.ajax({
										url: 'seguir.php',
										method: 'post',
										data: { seguir_id_usuario: id_usuario },
										success: function(data){
											//alert('Registro efetuado com sucesso!');
										}
									});

								});

								$('.btn_deixar_seguir').click( function(){
									var id_usuario = $(this).data('id_usuario');

									$('#btn_seguir_'+id_usuario).show();
									$('#btn_deixar_seguir_'+id_usuario).hide();

									$.ajax({
										url: 'deixar_seguir.php',
										method: 'post',
										data: { deixar_seguir_id_usuario: id_usuario },
										success: function(data){
											//alert('Registro removido com sucesso!');
										}
									});

								});
							}
						});
					}

				});

			});

		</script>

	</head>

	<body>

		<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-dark fixed-top shadow" >
			<a class="navbar-brand" href="home.php"><img src="imagens/drapix.png" width="30" height="30" class="d-inline-block align-top" alt=""><font> Drapix </font></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
				<ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
				<ul class="navbar-nav">
					<li class="nav-item">
        				<a class="nav-link" href="home.php"><i class="fas fa-home"></i> Home</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href="perfil-usuario.php"><i class="fas fa-user"></i> Perfil</a>
      				</li>
      				<li class="nav-item active">
        				<a class="nav-link" href="procurar-pessoas.php"><i class="fas fa-search"></i> Procurar pessoas</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link" href="sair.php"> Sair</a>
      				</li>
      			</ul>
			</div>
		</nav>
		<!--/.nav -->
		<main>
		<div class="container">
			<div id="box-search">
				<div>
						<form id="form_procurar_pessoas" class="form-inline input-group">
							<input id="nome_pessoa" name="nome_pessoa" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" maxlength="140">
							<button class="btn btn-outline-success" id="btn_procurar_pessoa" type="button">Search</button>
						</form>
				</div>

				<div id="pessoas" class="list-group"></div>
			</div>

			<div id="box-search-explorar">
				<div>
					<p>dsagffsgs</p>
				</div>
			</div>
		</div>

		</main>
      

		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



	</body>
	</html>