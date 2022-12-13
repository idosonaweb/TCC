<?php
    include('conexao_mysql.php');

    $id_usuario = $_GET['usuario_id'];

    $sql = 'DELETE FROM usuario WHERE usuario_id='.$usuario_id;

    echo "<h1> Exclusão de Usuário </h1>";

	$result = mysqli_query($con, $sql);

	if($result)

		echo "Registro excluído com sucesso<br><br>";

	else

		echo "Erro ao tentar excluir usuário: ".mysqli_error($con)."<br>";
  
?>

<a href='administrar.php'></a>