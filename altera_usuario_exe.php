<?php

    include('core/conexao_mysql.php');

    $id_usuario = $_POST['usuario_id'];

    $nome = $_POST["nome"];

    $email = $_POST["email"];

    $telefone = $_POST["telefone"];

    echo "<h1>Alteração de dados</h1>" ;
    
    echo "<p>Nome usuário: " . $nome . "</p>" ;

        $sql = "UPDATE usuario SET
                nome='".$nome."',
                email='".$email."',
                telefone='".$telefone."'
                WHERE usuario_id=".$id_usuario;
      
    $result = mysqli_query($con, $sql);

    if($result)
    {
        echo "Dados alterados com sucesso <br>" ;
    }
    else
    {
        echo "Erro ao alterar no banco de dados " . mysqli_error($con) . "<br>" ;
    }

?>

<a href="index.php">Voltar</a>