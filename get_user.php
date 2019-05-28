<?php

session_start();

if(!isset($_SESSION['usuario'])){
	header('Location: index.php?erro=1');
}

require_once('db.class.php');

$id_usuario = $_SESSION['id_usuario'];

$objDb = new db();
$link = $objDb->conecta_mysql();

$sql = " SELECT DATE_FORMAT(t.data_inclusao, '%d %b %Y %H:%i') AS data_inclusao_formatada, t.post, u.usuario, t.id_post";
$sql.= " FROM post AS t JOIN usuarios AS u ON (t.id_usuario = u.id) ";
$sql.= " WHERE id_usuario = $id_usuario ";
$sql.= " ORDER BY data_inclusao DESC ";

$resultado_id = mysqli_query($link, $sql);

if($resultado_id){

	while($registro = mysqli_fetch_array($resultado_id, MYSQLI_ASSOC)){
	echo'<div class="media border ">
		<img src="imagens/teste.png" class="perfil-post align-self-start mr-3 rounded-circle" alt="img-perfil">
		<div class="media-body">
    		<h5 class="mt-0">'.$registro['usuario'].' <small> - <i class="far fa-clock"> </i> '.$registro['data_inclusao_formatada'].'</small></h5>
    		<p class="list-group-item-text text-break">'.$registro['post'].'</p>
    			<figure class="figure">
					<img src="imagens/fundo.jpg" class="figure-img img-fluid rounded mx-auto d-block" alt="">
					<figcaption class="figure-caption text-right"><i class="fas fa-"></i> '.$registro['usuario'].'</figcaption>
				</figure>
		</div>';
		?>
		<div id="btn-del">
			<div class="dropdown">
				<button style="background-color: #4717f6" type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href=""></button>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="delete.php?id_post=<?php echo $registro['id_post'] ?>">Delete</a>
				</div>
			</div>
		</div>
		<?php		

		echo '</div>';
		}

	} else {
		echo 'Erro na consulta de posts no banco de dados!';
	}

	?>