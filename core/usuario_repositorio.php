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
                'nome' => $nome,
                'email' => $email,
                'telefone' => $telefone,
                'senha' => crypt($senha, $salt)
            ];

            insere('usuario', $dados);

            break;

        case 'update':
            
            $id = (int)$id ;

            $dados = [
                'nome' => $nome,
                'email' => $email,
                'telefone' => $telefone
            ];

            $criterio = [
                ['usuario_id', '=', $id]
            ];

            atualiza('usuario', $dados, $criterio);

            break;

        case 'login':
            $criterio = [
                ['email', '=', $email],
            ];

            $retorno = buscar(
                'usuario', 
                ['usuario_id', 'nome', 'email', 'telefone', 'senha'], 
                $criterio
            );

            if (count($retorno) > 0) 
            {
                if (crypt($senha, $salt) == $retorno[0]['senha']) 
                {
                    $_SESSION['login']['usuario'] = $retorno[0] ;

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
                ['usuario_id', '=', $id]
            ];

            atualiza('usuario', $dados, $criterio);

            exit;

            break;
    }

    header("Location: ../index.php");
    
?>