<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <meta name="description" content="">
        
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        
        <meta name="generator" content="Hugo 0.104.2">
        
        <title>Purchase Manager</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

        <link href="lib/css/bootstrap.min.css" rel="stylesheet" >
            
        <meta name="theme-color" content="#712cf9">
        
        <link rel="stylesheet" href="lib/css/style.css">

        <link href="lib/css/features.css" rel="stylesheet">

        <link href="lib/css/carousel.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- TOPO//-->
                    <?php
                        include 'includes/topo.php';
                        ?>
                </div>
            </div>
            <div class="row" style="min-height: 500px;">
                <div class="col-md-12">
                    <!--menu//---> 
                    <?php
                        include 'includes/menu.php';
                        ?>
                </div>
                <div class="col-md-10" style="padding-top: 50px;">
                    <!--conteudo//-->
                    <h2>Pagina Inicial </h2>
                    <?php
                        include 'includes/busca.php'
                    ?>
                    
                    <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        foreach($_GET as $indice => $dados){
                                $$indice = limparDados($dados);
                        }

                        $data_atual = date('Y-m-d h:i:s');

                        $criterio = [
                            ['data_postagem', '<=', $data_atual]
                        ];

                        if(!empty($busca)) {
                            $criterio[] = [
                                'AND',
                                'nome_lista',
                                'like', 
                                "%{$busca}%"
                            ];
                        }

                        $posts = buscar(
                            'lista',
                            [
                                'nome_lista',
                                'data_postagem',
                                'id',
                                '(select nome
                                    from usuario
                                    where usuario.id = lista.usuario_id) as nome'
                            ], 
                            $criterio,
                            'data_postagem DESC'
                        );
                    ?>
                    
                    <div>
                        <div class="list-group">
                            <?php
                            foreach($posts as $post):
                                $data = date_create($post['data_postagem']);
                                $data = date_format($data,'d/m/Y H:i:s');
                            ?>
                            <br>
                            <a class="list-grouo-item list-group-item-action"
                                href="listas_detalhe.php?lista=<?php echo $lista['id']?>">
                                <strong><?php echo $lista ['nome_lista']?></strong>
                                [<?php echo $lista['nome_lista']?>]
                                <span class="badge badge-dark"><?php echo $data?></span>
                            </a>
                            <br>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!--- rodapé //--> 
                    <?php 
                    include 'includes/rodape.php'; 
                    ?>
                </div>
            </div>
        </div>
        <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>