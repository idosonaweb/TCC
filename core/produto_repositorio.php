<?php

    session_start();
    
    require_once '../includes/valida_login.php';
    
    require_once '../includes/funcoes.php';
    
    require_once 'conexao_mysql.php';
    
    require_once 'sql.php';
    
    require_once 'mysql.php';

    foreach($_POST as $indice => $dado){

        $$indice = limparDados($dado);

    }

    foreach($_GET as $indice => $dado){

        $$indice = limparDados($dado);
    }

    $id = (int)$id_produto ;

    switch ($acao) 
    {
        case 'insert':
            $fotos_name = array();
            $fotos = array_filter($_FILES['foto']['name']); 
            $total_count = count($_FILES['foto']['name']);

            for( $i=0 ; $i < $total_count ; $i++ ) {      
                $tmpFilePath = $_FILES['foto']['tmp_name'][$i];
                if ($tmpFilePath != ""){
                    $foto_name = $_FILES['foto']['name'][$i];
                    $path_parts = pathinfo($foto_name);
                    $imageFileType = strtolower(pathinfo($foto_name, PATHINFO_EXTENSION));
                    $foto_name = $path_parts['filename'].time().".".$imageFileType;
                    $newFilePath = "../upload/" . $foto_name;
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $fotos_name[] = $foto_name;
                    }
                }
            }

            $dados = [
                'nome_produto'             => $nome_produto,
                'data_final'               => $data_final,
                'valor'                    => $valor,
                'quantidade'               => $quantidade,
                'marca'                    => $marca,
                'foto_nome'                => implode(";", $fotos_name),
                'nome_mercado'             => $nome_mercado,
                'usuario_id'               => $_SESSION['login']['usuario']['usuario_id']
            ];

            insere('produto', $dados);

            break;
        

        case 'update':
            
            $dados = [
                'nome_produto'             => $nome_produto,
                'data_final'               => $data_final,
                'valor'                    => $valor,
                'quantidade'               => $quantidade,
                'marca'                    => $marca,
                'foto_nome'                => implode(";", $fotos_name),
                'nome_mercado'             => $nome_mercado,
                'usuario_id'               => $_SESSION['login']['usuario']['usuario_id']
            ];

            $criterio = [
                ['usuario_id', '=', $id]
            ];

            atualiza('produto', $dados, $criterio);
            
            break;

        case 'delete':
            
            $criterio = [
                ['usuario_id', '=', $id]
            ];

            deleta('produto', $criterio);

            break;
    }

    header('Location: ../index.php');  

?>