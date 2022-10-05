<?php

    require_once '../includes/funcoes.php' ;

    require_once '../core/conexao_mysql.php' ;

    require_once '../core/sql.php' ;

    require_once '../core/mysql.php' ;

    insert_teste_usuario('João', 'joao@ifsp.edu.br', '123456');

    buscar_teste_usuario();

    update_teste_usuario(38, 'murilo', 'silva@gmail.com');

    buscar_teste_usuario();

    function insert_teste_usuario($nome, $email, $senha) : void 
    {
        $dados = ['nome' => $nome, 'email' => $email, 'senha' => $senha] ;

        insere('usuario', $dados);
      
    }

    function buscar_teste_usuario () : void 
    {
        $usuarios = buscar('usuario', [ 'id', 'nome', 'email'], [], '') ;

        print_r($usuarios);
       
    }

    function update_teste_usuario ($id, $nome, $email) : void
    {
        $dados = ['nome' => $nome, 'email' => $email] ;

        $criterio = [['id', '=', $id]] ;
        
        atualiza('usuario', $dados, $criterio);
        
    }

    echo "<br>" ;

    echo "<br>" ;

    insert_teste_post('TIME DO POVO', 'OH MEU MENGÃO');

    buscar_teste_post();

    update_teste_post(12, 'KRL UM COELHO', 'Muito foda alek');

    buscar_teste_post();

    function insert_teste_post ($titulo, $texto) : void 
    {
        $dados = ['titulo' => $titulo, 'texto' => $texto] ;

        insere('post', $dados);
      
    }

    function buscar_teste_post () : void 
    {
        $posts = buscar('post', [ 'id', 'titulo', 'texto'], [], '') ;

        print_r($posts);
       
    }

    function update_teste_post ($id, $titulo, $texto) : void
    {
        $dados = ['titulo' => $titulo, 'texto' => $texto] ;

        $criterio = [['id', '=', $id]] ;
        
        atualiza('post', $dados, $criterio);
        
    }

    echo "<br>" ;

    echo "<br>" ;

    insert_teste_avaliacao(5, 'DAORA EM PAE');

    buscar_teste_avaliacao();

    update_teste_avaliacao(45, 3, 'COMMIT');

    buscar_teste_avaliacao();

    function insert_teste_avaliacao ($nota, $comentario) : void 
    {
        $dados = ['nota' => $nota, 'comentario' => $comentario] ;

        insere('avaliacao', $dados);
      
    }

    function buscar_teste_avaliacao () : void 
    {
        $avaliacoes = buscar('avaliacao', [ 'id', 'nota', 'comentario'], [], '') ;

        print_r($avaliacoes);
       
    }

    function update_teste_avaliacao ($id, $nota, $comentario) : void
    {
        $dados = ['nota' => $nota, 'comentario' => $comentario] ;

        $criterio = [['id', '=', $id]] ;
        
        atualiza('avaliacao', $dados, $criterio);
        
    }

?>