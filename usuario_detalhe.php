<?php
   include('core/conexao_mysql.php');
   include ('core/usuario_repositorio.php') ;
   require_once('../includes/funcoes.php');

   $usuario_id = $_SET['usuario_id'];
   $sql = 'SELECT * FROM usuario where usuario_id='.$usuario_id;
   $con= mysqli_connect("localhost", "root", '', );
   $result = mysqli_query($con, $sql);
   $row = mysqli_fetch_array($result);
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de clientes</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Cadastro de Clientes  - IFSP</h1>
    <div id="teste">
        <form method="post" action="altera_usuario_exe.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Dados do Usuario</legend>
                <div>
                <div class="form-item">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="<?php echo $row['nome']?>" placeholder="Digite o nome">
                </div>
                <div class="form-item">
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email_usuario']?>" placeholder="Digite o email">
                </div>
                <div class="form-item">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="telefone" value="<?php echo $row['telefone_usuario']?>" placeholder="Digite o Telefone">
                </div>
                <div class="form-item">
                    <input type="file" id="foto" name="foto" accept="image/*" />
                </div>                        
                <div class="form-item">
                    <input id="btn" type="submit" value="Enviar" >
                    <a href='index.php'> Voltar</a>
                </div>
                <input name="id_usuario" type="hidden" value="<?php echo $row['id_usuario']?>">
                </div>
            </fieldset>
        </form>
    </div>
</body>
</html>