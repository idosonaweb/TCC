<!DOCTYPE html>
<?php 
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado){
        $$indice = limparDados($dado);
    }

    $listas = buscar(
        'listas',
        [
            'nome_lista',
            'itens',
            'data_postagem',
            'qtd_produtos',
            '(select nome
                    from usuario
                    where usuario.id = lista.id) as nome_lista'
        ],
        [
            ['id', '=', $lista]
        ]
);
        $listas = $listas[0];
        $data_post = date_create($listas['data_postagem']);
        $data_post = date_format($data_postagem, 'd/m/Y H:i;s');

?>
<html>
    <head>
        <title><?php echo $listas['nome_lista']?></title>
        <link rel="stylesheet" href="lib/bootstrap-4.2.1-dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        include 'includes/topo.php';
                        ?>

                </div>
            </div>
            <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php'; ?>
                </div>
            <div class="col-md-10" style="padding-top: 50px;"> 
                <div class="card-body">
                    <h5 class="card-title"><?php echo $listas['nome_lista']?></h5>
                    <h5 class="card-subtitle mb-2 text-muted">
                        <?php echo $data_post?> Por <?php echo $listas['nome_lista']?>
                    </h5>
                    <div class="card-text">
                        <?php echo html_entity_decode($listas['itens'])?>
                        </div>
                    </div>
                </div>
            </div>
           <div class="row">
                <div class="col-md-12">
                    <?php 
                        include 'includes/rodape.php';
                        ?>
                </div>
           </div> 
        </div>
        <script src="lib/bootstrap-4.2.1-dist/js/bootstrap.min.js"></script>
    </body>
</html>