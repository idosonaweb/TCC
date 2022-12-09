<html>

    <head>

        <title>Purchase Manager</title>

        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/tela_produtos.css">

    </head>

    <body>
        
        <div>

            <div class="col-md-12">

                <?php include 'includes/menu.php'; ?>

            </div>

            <div class="container-slider">
              <button id="prev-button"><img src="lib/img/seta_s.png" alt="prev-button"></button>
              <div class="container-images">
                <img src="lib/img/Cotonete.jpg" alt="girl" class="slider on">
                <img src="lib/img/escova.jpg" alt="girl" class="slider">
                <img src="lib/img/shampoo.jpg" alt="ok" class="slider">
                <img src="lib/img/banana.jpg" alt="ok" class="slider">
              </div>
              <button id="next-button"><img src="lib/img/seta_s.png" alt="next-button"></button>
            </div>

            <div class="col-md-12">

                <?php

                    include 'includes/busca.php' ;

                ?>

                <?php

                    require_once 'includes/funcoes.php' ;

                    require_once 'core/conexao_mysql.php' ;

                    require_once 'core/sql.php' ;

                    require_once 'core/mysql.php' ;
                    

                    foreach ($_GET as $indice => $dado) 
                    {
                        $$indice = limparDados($dado) ;
                    }

                    foreach($_POST as $indice => $dado){

                        $$indice = limparDados($dado) ;
                    
                    }

                    $data = date('Y-m-d') ;

                    $criterio = [
                        ['data_postagem', '<=', $data]
                    ];

                    if (!empty($busca)) 
                    {
                        $criterio[] = [
                            'AND',
                            'nome_lista',
                            'qtd_produtos',
                            "%{$busca}%"
                        ];
                    }

                    $lista = buscar(
                        'listas',
                        [
                            'nome_lista',
                            'data_postagem',
                            'itens',
                            'id_lista',
                            'usuario_id',
                            '(select nome from usuario 
                                        where usuario.usuario_id = listas.usuario_id) as nome'
                        ],
                        
                        $criterio,
                        'data_postagem DESC'

                    );
                
                ?>

                <br>

                <div>
                    
                <button style = background-color:white; class="btn btn-primary my-2 my-sm-0"><a href="listas_formulario.php">Adicionar Lista</a></button>

                <br>
                <br>


                    <div class="list-group">

                        <?php

                            foreach ($lista as $listas): 
                            {
                                $data = date_create($listas['data_postagem']) ;

                                $data = date_format($data, 'd/m/Y') ;
                            }

                        ?>

                        <a class="list-group-item list-group-item-action"
                            href="listas_detalhe.php?lista=<?php echo $listas['id_lista'] ?>">
                        
                            <strong><?php echo $listas['nome_lista'] ?></strong>

                            <span class="badge badge-dark"><?php echo $data ?></span>
                        
                        </a>

                        <?php endforeach; ?>

                    </div>

                </div>
               
            </div>
          
        </div>

        <script src="lib/js/bootstrap.min.js"></script>
        <script src="lib/js/tela_produto.js" defer></script>

    </body>

</html>