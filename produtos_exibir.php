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

            <div class="col-md-12">

                <section class="form-inline">

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
                        ['data_final', '<=', $data]
                    ];

                    if (!empty($busca)) 
                    {
                        $criterio[] = [
                            'AND',
                            'nome_mercado',
                            'nome_produto',
                            'like',
                            "%{$busca}%"
                        ];
                    }

                    $produtos = buscar(
                        'produto',
                        [
                            'nome_produto',
                            'data_final',
                            'valor',
                            'quantidade',
                            'marca',
                            'foto_nome',
                            'nome_mercado',
                            'id_produto',
                            'usuario_id',
                            '(select nome from usuario 
                                        where usuario.usuario_id = produto.usuario_id) as nome'
                        ],
                        
                        $criterio,
                        'data_final DESC'

                    );
                
                ?>

                <br>

                <div>

                <?php if (isset($_SESSION['login']['usuario'])) :  ?>
                    
                    <?php if ($_SESSION['login']['usuario']['adm']===1) : ?>

                        <a href="produto_formulario.php"><button class="btn btn-outline-primary my-2 my-sm-0">Adicionar Produto</button></a>

                    <?php endif; ?>

                <?php endif; ?>

                </section>

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

                <br><br>

                    <div class="list-group">

                        <?php

                            foreach ($produtos as $produto): 
                            {
                                $data = date_create($produto['data_final']) ;

                                $data = date_format($data, 'd/m/Y') ;
                            }

                        ?>

                        <a class="list-group-item list-group-item-action"
                            href="produtp_detalhe.php?lista=<?php echo $produto['id_produto'] ?>">
                        
                            <strong><?php echo $produto['nome_produto'] ?></strong>
                        
                        </a>

                        <?php endforeach; ?>

                    </div>

                </div>
               
            </div>
          
        </div>
        <div class="col-md-12">

            <?php

                include 'includes/rodape.php';

            ?>

        </div>

        <script src="lib/js/bootstrap.min.js"></script>
        <script src="lib/js/tela_produto.js" defer></script>

    </body>

</html>