<?php

    session_start();
        
    require_once 'includes/valida_login.php' ;
    require_once 'includes/funcoes.php' ;
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
                'titulo'             => $titulo,
                'descricao'          => $descricao,
                'local_nome'         => $local_nome,
                'valor_compra'       => $valor_compra,
                'usuario_id'         => $_SESSION['login']['usuario']['id']
            ];

            insere('compra', $dados);

            break;
        

        case 'update':
            
            $dados =
            [
                'titulo'            => $titulo,
                'descricao'         => $descricao,
                'local_nome'        => $local_nome,
                'valor_compra'      => $valor_compra,
                'usuario_id'        => $_SESSION['login']['usuario']['id']
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