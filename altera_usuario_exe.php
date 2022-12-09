<?php

    include('core/conexao_mysql.php');

    $id_usuario = $_POST['usuario_id'];

    $nome = $_POST["nome"];

    $email = $_POST["email"];

    $telefone = $_POST["telefone"];

    echo "<h1>Alteração de dados</h1>" ;
    
    echo "<p>Nome usuário: " . $nome . "</p>" ;

        $dados = "UPDATE usuario SET
                nome='".$nome."',
                email='".$email."',
                telefone='".$telefone."'
                WHERE usuario_id =".$id_usuario;
      
    $result = mysqli_query($conexao, $dados);

?>