<?php
    
    $connection= mysqli_connect('localhost', 'root', ' ' );

    include("core/conexao_mysql.php");

    $id_usuario = $_POST['usuario_id'];

    $sql = "SELECT * FROM usuario where usuario_id= ".$id_usuario ;

    $result = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Purchase Manager</title>
    <link rel="stylesheet" href="lib/css/tela_cadastro.css">
</head>
<body>

    <div class="container">
        
        <div class="form">

            <form action = "altera_usuario_exe.php" method = "POST" enctype='multipart/form-data'>

                <div class="container-titule-button">

                        <h2 class="titule">Cadastre-se</h2> 
                        
                        <button id="button" type="submit">Cadastrar</button>
                </div>

                <br>
                
                <div class="input group">
                     
                    <div class="input-box">
                     
                        <label for="nome">Nome</label>

                        <input type = "text" name = "nome" size = "50" value = "<?php echo $row['nome'] ?>" placeholder="Digite o nome"></input>

                    </div>

                    <div class="input-box">
                        
                        <label for="email"> E-mail </label>
                        
                        <input type = "text" name = "email" size = "50" value = "<?php echo $row['email'] ?>" placeholder="Digite o email"></input>
                    
                    </div>

                    <div class="input-box">

                        <label for="telefone"> Telefone </label>

                        <input type = "text" name = "telefone" size = "30" value = "<?php echo $row['telefone'] ?>" placeholder="Digite o telefone"></input>
                    
                    </div>

                </div>

                <input name="id" type="hidden" value="<?php echo $row['id_usuario']?>">

            </form>
        </div>
    </div>
</body>
</html>