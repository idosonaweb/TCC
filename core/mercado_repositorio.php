<?php

    session_start();
    
    require_once '../includes/funcoes.php' ;
    require_once 'conexao_mysql.php' ;
    require_once 'sql.php' ;
    require_once 'mysql.php' ;

    $salt = '$exemplosaltifsp' ;

    foreach ($_POST as $indice => $dado) 
    {
        $$indice = limparDados($dado) ;
    }

    foreach ($_GET as $indice => $dado) 
    {
        $$indice = limparDados($dado) ;
    }

    switch ($acao) 
    {
        case 'insert':
            $dados = [
                'nome_mercado' => $nome_mercado,
                'rua' => $rua,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'estado' => $estado,
                'cnpj' => crypt($cnpj, $salt)
            ];

            insere('mercado', $dados);

            break;

        case 'update':
            
            $id = (int)$id ;

            $dados = [
                'nome_mercado' => $nome_mercado,
                'rua' => $rua,
                'bairro' => $bairro,
                'cidade' => $cidade,
                'estado' => $estado,
            ];

            $criterio = [
                ['id_mercado', '=', $id]
            ];

            atualiza('mercado', $dados, $criterio);

            break;

        case 'login':
            $criterio = [
                ['cnpj', '=', $cnpj],
            ];

            $retorno = buscar(
                'mercado', 
                ['id_mercado', 'nome_mercado', 'rua', 'bairro', 'cidade', 'estado'], 
                $criterio
            );

            if (count($retorno) > 0) 
            {
                if (crypt($cnpj, $salt) == $retorno[0]['cnpj']) 
                {
                    $_SESSION['login']['mercado'] = $retorno[0] ;

                    if (!empty($_SESSION['url_retorno']))
                    {
                        header('Location: ' . $_SESSION['url_retorno']);
                        
                        $_SESSION['url_retorno'] = '' ;

                        exit;
                    }
                }
            }

            break;
        
        case 'logout':
            
            session_destroy();
            
            break;
        
        case 'status':
            
            $id = (int)$id ;

            $criterio = [
                ['id_mercado', '=', $id]
            ];

            atualiza('mercado', $dados, $criterio);

            exit;

            break;
    }

?>