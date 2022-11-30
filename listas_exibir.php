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
                            'nome_lista',
                            'like',
                            "%{$busca}%"
                        ];
                    }

                    $listas = buscar(
                        'listas',
                        [
                            'nome_lista',
                            'data_postagem',
                            'id_lista',
                            '(select nome from usuario 
                                        where usuario.id = listas.usuario_id) as nome'
                        ],

                        $criterio,
                        'data_postagem DESC'

                    );
                
                ?>

                <br>

                <div>

                <li><a href="listas_formulario.php" class="nav-link text-dark px-3 ">Adicionar Lista</a></li>


                    <div class="list-group">

                        <?php

                            foreach ($listas as $listas): 
                            {
                                $data = date_create($listas['data_postagem']) ;

                                $data = date_format($data, 'd/m/Y H:i:s') ;
                            }

                        ?>

                        <a class="list-group-item list-group-item-action"
                            href="listas_detalhe.php?lista=<?php echo $listas['id_lista'] ?>">
                        
                            <strong><?php echo $listas['nome_lista'] ?></strong>

                            [<?php echo $listas['nome_lista'] ?>]

                            <span class="badge badge-dark"><?php echo $data ?></span>
                        
                        </a>

                        <?php endforeach; ?>

                    </div>

                </div>
               
            </div>
        

        <script src="lib/js/bootstrap.min.js"></script>

    </body>

</html>