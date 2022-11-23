<?php

    include('conexao.php');

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


    $id_usuario = $_POST["id_usuario"];

    $nome = $_POST["nome_usuario"];

    $email = $_POST["email_usuario"];

    $telefone = $_POST["telefone_usuario"];

    echo "<h1>Alteração de dados</h1>" ;
    
    echo "<p>Nome usuário: " . $nome . "</p>" ;

    if(isset($foto_Nome))
    {
        $sql = "UPDATE usuario SET
                nome_usuario ='". $nome ."',
                email_usuario ='". $email ."',
                telefone_usuario ='". $telefone . "',
                foto_blob='".$foto_Blob."',
                foto_nome='".$foto_Nome."'
                WHERE id_usuario=".$id_usuario;
      }
      else
      {
        $sql = "UPDATE usuario SET
                  nome_usuario='".$nome."',
                  email_usuario='".$email."',
                  telefone_usuario='".$telefone."'
                WHERE id_usuario=".$id_usuario;
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