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

                    $data_Atual = date('Y-m-d H:i:s') ;

                    $criterio = [
                        ['data_postagem', '<=', $data_Atual]
                    ];

                    if (!empty($busca)) 
                    {
                        $criterio[] = [
                            'AND',
                            'texto',
                            'like',
                            "%{$busca}%"
                        ];
                    }

                    $compras = buscar(
                        'lista',
                        [
                            'nome_lista',
                            'data_postagem',
                            'id_lista',
                            '(select nome from usuario 
                                        where usuario.id = lista.usuario_id) as nome'
                        ],

                        $criterio,
                        'data_postagem DESC'

                    );
                
                ?>

                <br>

                <div>

                    <div class="list-group">

                        <?php
                        
                            foreach ($listas as $lista): 
                            {
                                $data = date_create($compra['data_postagem']) ;

                                $data = date_format($data, 'd/m/Y H:i:s') ;
                            }

                        ?>

                        <a class="list-group-item list-group-item-action"
                            href="listas_detalhe.php?lista=<?php echo $lista['id_lista'] ?>">
                        
                            <strong><?php echo $post['nome_lista'] ?></strong>

                            [<?php echo $lista['nome'] ?>]

                            <span class="badge badge-dark"><?php echo $data ?></span>
                        
                        </a>

                        <?php endforeach; ?>

                    </div>

                </div>
               
            </div>
        

        <script src="lib/js/bootstrap.min.js"></script>

    </body>

</html>