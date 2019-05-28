<?php 
session_start();

	if(!isset($_SESSION['usuario'])){
		header('Location: index.php?erro=1');
	}

	require_once('db.class.php');

	$id_usuario = $_SESSION['id_usuario'];

	$objDb = new db();
	$link = $objDb->conecta_mysql();

	$id_t = $_GET["id_post"];

$sql= "DELETE FROM post WHERE id_post = '$id_t'";
$resultado_id = mysqli_query($link, $sql);

echo $id_t;

header("Refresh: 0; url = perfil-usuario.php");





?>