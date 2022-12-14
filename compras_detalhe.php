<?php 

    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach ($_GET as $indice => $dado) 
    {
        $$indice = limparDados($dado) ;
    }

    foreach($_POST as $indice => $dado){

        $$indice = limparDados($dado) ;
    
    }

    $compras = buscar(
        'compras',
        [
            'titulo',
            'descricao',
            'local_nome',
            'valor_compra',
            'foto_nome',
            'data_postagem',
            'id_compra',
            'usuario_id',
            '(select nome from usuario 
                        where usuario.usuario_id = compras.usuario_id) as nome'
        ],
        [
            ['id_compra', '=', $compra]
        ]
);
        $compra = $compras[0];
        $data = date_create($compra['data_postagem']);
        $data = date_format($data, 'd/m/Y');

?>
<html>
    <head>  
    <title>Purchase Manager</title>
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    </head>
    <body>

            <div class="col-md-12" style="min-height: 100px;">

            <?php include 'includes/menu.php'; ?>

            <div class="col-md-10"> 
                <div class="card-body">
                <img src="upload/<?php echo $compra['foto_nome'] ?>" height="300px">
                <br>
                <br>
                    <h5 class="card-title"><?php echo $compra['titulo']?></h5>
                    <h5 class="card-subtitle mb-2 text-muted">
                        <?php echo $data?> Por <?php echo $compra['local_nome']?>
                    </h5>
                    <div class="card-text">
                        <?php echo html_entity_decode($compra['descricao'])?>
                        </div>
                    </div>
                </div>
            </div>
           <div class="col-md-12">
                <?php

                    include 'includes/rodape.php';
                
                ?>
           </div> 
        </div>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>
</html>