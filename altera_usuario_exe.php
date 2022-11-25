<?php

    include('core/conexao_mysql.php');

    $foto_Nome = $_FILES ['foto']['name'] ;

    $target_dir = "upload/" ;

    $target_file = $target_dir . basename($_FILES ["foto"]["name"]) ;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $extensions_arr = array("jpg","jpeg","png","gif");

    if (in_array($imageFileType, $extensions_arr)) 
    {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir.$foto_Nome)) 
        {
            $foto_Blob = addslashes(file_get_contents($target_dir.$foto_Nome)) ;
        }
    }


    $id_usuario = $_POST['id'];

    $nome = $_POST["nome"];

    $email = $_POST["email"];

    $telefone = $_POST["telefone"];

    echo "<h1>Alteração de dados</h1>" ;
    
    echo "<p>Nome usuário: " . $nome . "</p>" ;

    if(isset($foto_Nome))
    {
        $sql = "UPDATE usuario SET
                nome='". $nome ."',
                email='". $email ."',
                telefone='". $telefone . "',
                foto_blob='".$foto_Blob."',
                foto_nome='".$foto_Nome."'
                WHERE id=".$id_usuario;
      }
      else
      {
        $sql = "UPDATE usuario SET
                nome='".$nome."',
                email='".$email."',
                telefone='".$telefone."'
                WHERE id=".$id_usuario;
      }
      
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