<?php

    session_start();
    require_once '../includes/valida_login.php' ;
    require_once '../includes/funcoes.php' ;
    require_once 'conexao_mysql.php' ;
    require_once 'sql.php' ;
    require_once 'mysql.php' ;

    foreach($_POST as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    foreach($_GET as $indice => $dado) {
        $$indice = limparDados($dado);
    }

    $id = (int)$id_compra ;

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
                'titulo'             => $titulo,
                'descricao'          => $descricao,
                'local_nome'         => $local_nome,
                'valor_compra'       => $valor_compra,
                'foto_nome'          => implode(";", $fotos_name),
                'data_postagem'      => $data_postagem,
                'usuario_id'         => $_SESSION['login']['usuario']['usuario_id']
            ];

            insere('compras', $dados);

            break;
        

        case 'update':
            
            $dados = [
                'titulo'             => $titulo,
                'descricao'          => $descricao,
                'local_nome'         => $local_nome,
                'valor_compra'       => $valor_compra,
                'foto_nome'          => $foto_nome,
                'foto_nome'          => implode(";", $fotos_name),
                'data_postagem'      => $data_postagem,
                'usuario_id'         => $_SESSION['login']['usuario']['usuario_id']
            ];

            $criterio = [
                ['id_compra', '=', $id]
            ];

            atualiza('compras', $dados, $criterio);
            
            break;

        case 'delete':
            
            $criterio = [
                ['id_compra', '=', $id]
            ];

            deleta('compras', $criterio);

            break;
    }

?>