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
            $quantidade =(int)$quant;
            $usuario=$_SESSION ['login'] ['usuario'] ['usuarioID'];
            $modo = $modoOperacao;
            $dados = [
                'nome_prod' => $nome_prod,
                'descricao' => $descricao,
                'quant' => $quant,
                'modoOperacao' => $modoOperacao,
                'dataValidade' => $dataValidade,
                'estado' => $estado,
                'cidade' => $cidade,
                'fk_categoria'=>$fk_categoria,
                'fk_usuario' => $_SESSION['login'] ['usuario'] ['usuarioID']
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
                    'nome_prod' => $nome_prod,
                    'descricao' => $descricao,
                    'quant' => $quant,
                    'modoOperacao' => $modoOperacao,
                    'dataValidade' => $dataValidade,
                    'estado' => $estado,
                    'cidade' => $cidade,
                    'fk_usuario' => $_SESSION['login'] ['usuario'] ['usuarioID']
                ];

                $criterio = [
                    ['id', '=', $id]
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
                        ['id', '=', $id]
                    ];
            
                    deleta(
                        'Produto',
                        $criterio
                    );
            
                    break;

        }

    header('Location: ../index.php');  

?>