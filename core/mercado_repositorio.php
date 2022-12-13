<?php

    session_start();
    
    require_once '../includes/funcoes.php' ;
    require_once 'conexao_mysql.php' ;
    require_once 'sql.php' ;
    require_once 'mysql.php' ;

    $salt = '$exemplosaltifsp' ;
    
    foreach ($_GET as $indice => $dado) 
    {
        $$indice = limparDados($dado) ;
    }
    
    switch ($acao) 
    {
        case 'insert':
            $dados = [
                'nome_mercado' => $nome_mercado,
                'email_mercado' => $email_mercado,
                'endereco' => $endereco,
                'senha_mercado' => crypt($senha_mercado, $salt),
                'foto_nome' => $foto_nome,
                'cnpj' => crypt($cnpj, $salt)
            ];

            insere('mercado', $dados);

            break;

        case 'update':
            
            $id_mercado = (int)$id_mercado ;

            $dados = [
                'nome_mercado' => $nome_mercado,
                'email_mercado' => $email_mercado,
                'endereco' => $endereco,
                'foto_nome' => $foto_nome,
            ];

            $criterio = [
                ['id_mercado', '=', $id_mercado]
            ];

            atualiza('mercado', $dados, $criterio);

            break;

        case 'login':
            $criterio = [
                ['id_mercado', '=', $id_mercado]
            ];

            $retorno = buscar(
                'mercado', 
                ['id_mercado', 'nome_mercado', 'email_mercado','endereco', 'cnpj', 'senha_mercado', 'foto_nome', 'ativo'], 
                $criterio
            );

            if (count($retorno) > 0) 
            {
                if (crypt($senha_mercado, $salt) == $retorno[0]['senha_mercado']) 
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
            
                $id_mercado = (int)$id_mercado ;
    
                $valor = (int)$valor ;
    
                $dados =
                [
                    'ativo' => $valor 
                ];
    
                $criterio =
                [
                    ['id_mercado', '=', $id_mercado]
                ];
    
                atualiza('mercado', $dados, $criterio);
    
                header('Location:  ../mercados.php');
    
                exit;
    
                break;
    }

?>