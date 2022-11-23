<?php

    include("conexao.php");

    $id_usuario = $_GET["id_usuario"];

    $sql = "SELECT * FROM usuario where id_usuario =" . $id_usuario ;

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="estilo.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração do Usuário</title>
</head>

<body>

    <h1>Alteração do Usuário</h1>

    <hr><br>

    <?php echo "<img class='center' src='data:image/jpeg;base64,".base64_encode( $row["foto_blob"] )."' align='center' width='150' height='150'/>"; ?>  
    
    <div id="teste">

    <form action = "altera_usuario_exe.php" method = "POST" enctype='multipart/form-data'>
        
        <div class="form-item">

            <label for = "nome_usuario">Nome: </label>
            
            <input type = "text" name = "nome_usuario" size = "50" value = "<?php echo $row['nome_usuario'] ?>" placeholder="Digite o nome"></input>

        </div>

        <br>

        <div class="form-item">

            <label for = "email_usuario">E-mail: </label>
            
            <input type = "text" name = "email_usuario" size = "50" value = "<?php echo $row['email_usuario'] ?>" placeholder="Digite o email"></input>

        </div>

        <br>

        <div class="form-item">

            <label for = "telefone_usuario">Telefone: </label>
            
            <input type = "text" name = "telefone_usuario" size = "30" value = "<?php echo $row['telefone_usuario'] ?>" placeholder="Digite o telefone"></input>

        </div>

        <br>

        <div class="form-item">
                
            <input type="file" id="foto" name="foto" accept="image/*" />
            
        </div>

        <div class="form-item">
                
            <input id="btn" type="submit" value="Enviar" >
                    
            <a href='index.php'> Voltar</a>
            
        </div>
                
        <input name="id_usuario" type="hidden" value="<?php echo $row['id_usuario']?>">

    </form>

</body>
</html>