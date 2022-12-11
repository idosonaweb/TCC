<?php

    session_start();
    
    require_once '../includes/valida_login.php';
    
    require_once '../includes/funcoes.php';
    
    require_once 'conexao_mysql.php';
    
    require_once 'sql.php';
    
    require_once 'mysql.php';

    foreach($_POST as $indice => $dado){

        $$indice = $dado;

    }

    foreach($_GET as $indice => $dado){

        $$indice = $dado;
    }

    switch($acao){

        case 'insert':
            $quantidade =(int)$quantidade;
            $usuario=$_SESSION ['login'] ['mercado'] ['id_mercado'];
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
                'nome_produto' => $nome_produto,
                'data_final' => $data,
                'quantidade' => $quantidade,
                'valor' => $valor,
                'marca' =>  $marca,
                'foto_nome' => implode(";", $foto_nome),
                'nome_mercado' => $nome_mercado,
                'fk_mercado' => $_SESSION['login'] ['mercado'] ['id_mercado']
            ];
            insere(
                'Produto',
                $dados
            );
            $criterio = [];
            $id = buscar(
                    'Produto',
                    ['produtoID'],
                    $criterio,
                    'produtoID DESC LIMIT 1'
            );
            $idProd=$id[0]['produtoID'];

            function enviarImagem($name, $tmp_name,$idProd){
                
                $pasta = 'ImagensProdutos/';
                $nomeImagem = $name;
                $novoNomeImagem = uniqid();
                $extensao = strtolower(pathinfo($nomeImagem, PATHINFO_EXTENSION));
                
                if(move_uploaded_file( $tmp_name, $pasta.$novoNomeImagem.'.'.$extensao)){
                    $imagem_arq ='core/'.$pasta.$novoNomeImagem.'.'.$extensao;
            
                    $dados = [
                        'Imagem_arq' => $imagem_arq,
                        'fk_produto'=> $idProd
                    ];
                    insere(
                        'Imagem',
                        $dados,
                        ''
                    );
                return true;
            }
                else{
                    return false;
                }
            }
            
            if (isset($_FILES['imagens'])){
                $imagens = $_FILES['imagens'];
                //array imagens = recebe as imagens
                foreach($imagens['name'] as $index => $img) {
                    $imagens_arqs  = enviarImagem( $imagens['name'][$index], $imagens["tmp_name"][$index],$idProd);
                }
            }

            break;
            case 'update':

                $dados = [
                'nome_produto' => $nome_produto,
                'data_final' => $data,
                'quantidade' => $quantidade,
                'valor' => $valor,
                'marca' =>  $marca,
                'foto_nome' => implode(";", $foto_nome),
                'nome_mercado' => $nome_mercado,
                'fk_mercado' => $_SESSION['login'] ['mercado'] ['id_mercado']
                ];

                $criterio = [
                    ['id_produto', '=', $id]
                ];
        
                atualiza(
                    'Produto',
                    $dados,
                    $criterio
                );
        
                break;

                case 'delete':
                //caso seja para deletar dados
                //função sql.php
                    $criterio = [
                        ['id_produto', '=', $id]
                    ];
            
                    deleta(
                        'Produto',
                        $criterio
                    );
            
                    break;

        }

    header('Location: ../index.php');  

?>