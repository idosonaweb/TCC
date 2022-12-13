<?php
	header("Location: ../administrar.php");
	
    include('core/conexao_mysql.php');

    $usuario_id = $_GET ['usuario_id'];

    $sql = 'DELETE FROM usuario WHERE usuario_id='.$usuario_id;

	$result = mysqli_query($conexao, $sql);

?>