<?php

	session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$texto_post = $_POST['texto_post'];
	$id_usuario = $_SESSION['id_usuario'];

	if($texto_post == '' || $id_usuario == ''){
		die();
	}

	$objDb = new db();
	$link = $objDb->conecta_mysql();
	
	$sql = " INSERT INTO post(id_usuario, post)values($id_usuario, '$texto_post') ";

	mysqli_query($link, $sql);

?>