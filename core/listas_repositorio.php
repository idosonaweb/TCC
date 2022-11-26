<?php

    session_start();
        
    require_once 'includes/valida_login.php' ;
    require_once 'includes/funcoes.php' ;
    require_once 'conexao_mysql.php' ;
    require_once 'sql.php' ;
    require_once 'mysql.php' ;

    $foto_Nome = $_FILES['foto']['name'] ;

    $target_dir = "upload/" ;

    $target_file = $target_dir . basename($_FILES['foto']['name']) ;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    $extensions_arr = array("jpg","jpeg","png","gif");

    if (in_array($imageFileType, $extensions_arr)) 
    {
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_dir.$foto_Nome)) 
        {
            $foto_Blob = addslashes(file_get_contents($target_dir.$foto_Nome)) ;
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
                'nome_lista'             => $nome_lista,
                'data_criacao'          => $data_cricao,
                'data_postagem'         => $data_postagem,
                'qtd_produtos'       => $qtd_produtos,
                'usuario_id'         => $_SESSION['login']['usuario']['id']
            ];

            insere('listas', $dados);

            break;
        

        case 'update':
            
            $dados = [
                'nome_lista'             => $nome_lista,
                'itens'                   => $itens,
                'data_criacao'          => $data_cricao,
                'data_postagem'         => $data_postagem,
                'qtd_produtos'       => $qtd_produtos,
                'usuario_id'         => $_SESSION['login']['usuario']['id']
            ];

            $criterio = [
                ['id_lista', '=', $id]
            ];

            atualiza('lista', $dados, $criterio);
            
            break;

        case 'delete':
            
            $criterio = [
                ['id_lista', '=', $id]
            ];

            deleta('lista', $criterio);

            break;
    }

    header('Location: ../index.php');

?>