<?php
    session_start();
    require("core/conexao_mysql.php");

    $conexao = new $conexao();
    $conexao = $conexao->conecta();

    if(isset($_POST["usuario_id"]) && isset($_SESSION["usuario"]) && $_SESSION["usuario"][1] == 1){
        $query = $conexao->prepare("DELETE FROM usuario WHERE usuario_id = ?");

        if($query->execute(array($_POST["usuario_id"]))){
            echo json_encode(array("erro" => 0));
        }else{
            echo json_encode(array("erro" => 1));    
        }
    }else{
        echo json_encode(array("erro" => 1));
    }