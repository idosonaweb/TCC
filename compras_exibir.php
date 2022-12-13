<html>

    <head>

        <title>Purchase Manager</title>

        <link rel="stylesheet" href="lib/css/bootstrap.min.css">

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

                        $$indice = limparDados($dado);
                    
                    }

                    $data = date('Y-m-d') ;

                    $criterio = [
                        ['data_postagem', '<=', $data]
                    ];

                    if (!empty($busca)) 
                    {
                        $criterio[] = [
                            'AND',
                            'titulo',
                            'like',
                            "%{$busca}%"
                        ];
                    }

                    $compra = buscar(
                        'compras',
                        [
                            'titulo',
                            'descricao',
                            'local_nome',
                            'valor_compra',
                            'foto_nome',
                            'data_postagem',
                            'id_compra',
                            '(select nome from usuario 
                                        where usuario.usuario_id = compras.usuario_id) as nome'
                        ],

                        $criterio,
                        'titulo DESC'

                    );
                
                ?>

                <br>

                <a href="compras_formulario.php"><button type="button" class="btn btn-outline-primary me-2">Adicionar Compra</button></a>

                </section>

                <br><br>

                <div>

                    <div class="list-group">

                        <?php
                        
                            foreach ($compra as $compras): 
                            {
                                $data = date_create($compras['data_postagem']) ;

                                $data = date_format($data, 'd/m/Y') ;
                            }

                        ?>

                        <a class="list-group-item list-group-item-action"
                            href="compras_detalhe.php?compra=<?php echo $compras['id_compra'] ?>">
                                                    
                            <strong><?php echo $compras['titulo'] ?></strong>

                            - <?php echo $compras['local_nome'] ?>
                            
                            - R$<?php echo $compras['valor_compra'] ?>
                        
                        </a>

                        <?php endforeach; ?>

                    </div>

                </div>
               
            </div>
        
        </div>
        <div class="col-md-12">

        
        <br>
        <br>
        <br>


            <?php

                include 'includes/rodape.php';

            ?>

        </div>

        <script src="lib/js/bootstrap.min.js"></script>

    </body>

</html>