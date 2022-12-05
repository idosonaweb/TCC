<?php

    include('../TCC/core/conexao_mysql.php');

    $id_mercado = $_POST["id_mercado"];

    $nome_mercado = $_POST["nome_mercado"];

    $rua = $_POST["rua"];

    $bairro = $_POST["bairro"];

    $cidade = $_POST["cidade"];

    $estado = $_POST["estado"];

    $cnpj = $_POST["cnpj"];

    if(isset($foto_Nome))
    {
        $sql = "UPDATE mercado SET
                nome_mercado='". $nome ."',
                rua='". $rua ."',
                bairro='". $bairro . "',
                cidade='".$cidade."',
                estado='".$estado."'
                WHERE id_mercado=".$id_mercado;
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