<?php

    session_start();
        
    require_once '../includes/valida_login.php' ;
    require_once '../includes/funcoes.php' ;
    require_once 'conexao_mysql.php' ;
    require_once 'sql.php' ;
    require_once 'mysql.php' ;

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
                'data_criacao'          => date("Y-m-d"),
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

            atualiza('listas', $dados, $criterio);
            
            break;

        case 'delete':
            
            $criterio = [
                ['id_lista', '=', $id]
            ];

            deleta('listas', $criterio);

            break;
    }

    header('Location: ../index.php');

?>