<!DOCTYPE html>
<?php 
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado){
        $$indice = limparDados($dado);
    }

    $compras = buscar(
        'compras',
        [
            'titulo',
            'descricao',
            'local_nome',
            'valor _compra',
            'foto_nome',
            'data_postagem',
            'usuario_id',
            '(select nome from usuario 
                        where usuario.usuario_id = compra.usuario_id) as nome'
        ],
        [
            ['id_compra', '=', $compra]
        ]
);
        $compra = $compras[0];
        $data = date_create($compras['data_postagem']);
        $data = date_format($data, 'd/m/Y H:i;s');

?>
<html>
    <head>  
        <title><?php echo $compras['titulo']?></title>
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    </head>
    <body>
            <!-- <div>
                <?php
                    foreach($compra as $compras) : 
                        $fotos = explode(';', $compras['foto_nome']);
                ?>
            </div>
            <div>
                <?php foreach($fotos as $foto) : ?>
                    <?php if ($foto != '') : ?>
                        <img src='<?php echo"../../upload/".$foto; ?>' style="height: 250px;">
                    <?php endif; ?>
                <?php endforeach ?>
            </div> -->
            <div>
                
            </div>
    
            <div class="row" style="min-height: 500px;">
            <div class="col-md-12">

<?php include 'includes/menu.php'; ?>

</div>
            <div class="col-md-10" style="padding-top: 50px;"> 
                <div class="card-body">
                    <h5 class="card-title"><?php echo $compra['titulo']?></h5>
                    <h5 class="card-subtitle mb-2 text-muted">
                        <?php echo $data?> Por <?php echo $compra['nome']?>
                    </h5>
                    <div class="card-text">
                        <?php echo html_entity_decode($compra['descricao'])?>
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
        <script src="lib/js/bootstrap.min.js"></script>
        <?php endforeach; ?>
    </body>
</html>