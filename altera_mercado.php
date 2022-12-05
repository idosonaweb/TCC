<?php

    include("../TCC/core/conexao_mysql.php");

    $id_mercado = $_POST["id_mercado"];

    $sql = "SELECT * FROM mercado where id_mercado =" . $id_mercado ;

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
        
        <div class="form-image">
        
            <img src="../TCC/lib/img/LOGO.png"> 
        
        </div>
        
        <div class="form">
            
            <form method="POST" action="altera_usuario_exe.php">
                
                <div class="container-titule-button">
                
                    <h2 class="titule">Mercado</h2> 
                    
                    <button id="button" type="submit">Cadastrar</button>
                
                </div>
                
                <br>
                
                <div class="input group">
                     
                    <div class="input-box">
                    
                        <label for="nome_mercado">Nome</label>
                        
                        <input type = "text" name = "nome_mercado" size = "50" value = "<?php echo $row['nome_mercado'] ?>"></input>
                    
                    </div>

                    <div class="input-box">
                        
                        <label for="rua">Rua</label>
                        
                        <input type = "text" name = "rua" size = "50" value = "<?php echo $row['rua'] ?>"></input>
                    
                    </div>

                    <div class="input-box">
                    
                        <label for="bairro">Bairro</label>
                        
                        <input type = "text" name = "bairro" size = "50" value = "<?php echo $row['bairro'] ?>"></input>
                    
                    </div>

                    <div class="input-box">
                    
                        <label for="cidade">Cidade</label>
                        
                        <input type = "text" name = "cidade" size = "50" value = "<?php echo $row['cidade'] ?>"></input>
                    
                    </div>

                    <div class="input-box">
                    
                        <label for="estado">Estado</label>
                        
                        <input type = "text" name = "estado" size = "50" value = "<?php echo $row['estado'] ?>"></input>
                    
                    </div>

                    <input name="id_mercado" type="hidden" value="<?php echo $row['id_mercado']?>">

            </form>
        </div>
    </div>
</body>
</html>