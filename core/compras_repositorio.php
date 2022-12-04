<?php

    session_start();

    include("../core/conexao_mysql.php");
        
    require_once '../includes/valida_login.php' ;
    require_once '../includes/funcoes.php' ;
    require_once 'sql.php' ;
    require_once 'mysql.php' ;

    $foto_nome = $_FILES['foto']['name'] ;

    $target_dir = "../lib/img/" ;

    $target_file = $target_dir . basename($_FILES['foto']['name']) ;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $extensions_arr = array("jpg","jpeg","png","gif");

    if (in_array($imageFileType, $extensions_arr)) 
    {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir.$foto_nome)) 
        {
            $nota_fiscal_foto = addslashes(file_get_contents($target_dir.$foto_nome)) ;
        }
    }

    foreach ($_POST as $indice => $dado) 
    {
        $$indice = limparDados($dado) ;
    }

    foreach ($_GET as $indice => $dado) 
    {
        $$indice = limparDados($dado) ;
    }

    $id = (int)$id ;

    switch ($acao) 
    {
        case 'insert':
            
            $dados = [
                'titulo'             => $titulo,
                'descricao'          => $descricao,
                'local_nome'         => $local_nome,
                'valor_compra'       => $valor_compra,
                'nota_fiscal_foto'   => $nota_fiscal_foto,
                'foto_nome'          => $foto_nome,
                'data_postagem'      => $data_postagem,
                'usuario_id'         => $_SESSION['login']['usuario']['id']
            ];

            insere('compra', $dados);

            break;
        

        case 'update':
            
            $dados = [
                'titulo'             => $titulo,
                'descricao'          => $descricao,
                'local_nome'         => $local_nome,
                'valor_compra'       => $valor_compra,
                'nota_fiscal_foto'   => $nota_fiscal_foto,
                'foto_nome'          => $foto_nome,
                'data_postagem'      => $data_postagem,
                'usuario_id'         => $_SESSION['login']['usuario']['id']
            ];

            $criterio = [
                ['id_compra', '=', $id]
            ];

            atualiza('compra', $dados, $criterio);
            
            break;

        case 'delete':
            
            $criterio = [
                ['id_compra', '=', $id]
            ];

            deleta('compra', $criterio);

            break;
    }

    header('Location: ../index.php');

?>