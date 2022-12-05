<!DOCTYPE html>
<?php 
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado){
        $$indice = limparDados($dado);
    }

    $compra = buscar(
        'compra',
        [
            'titulo',
            'data_postagem',
            'id_lista',
            'descricao',
            '(select nome from usuario 
                        where usuario.usuario_id = listas.usuario_id) as nome'
        ],
        [
            ['id_lista', '=', $lista]
        ]
);
        $lista = $listas[0];
        $data = date_create($lista['data_postagem']);
        $data = date_format($data, 'd/m/Y H:i;s');

?>
<html>
    <head>
        <title><?php echo $listas['nome_lista']?></title>
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    </head>
    <body>
    
            <div class="row" style="min-height: 500px;">
            <div class="col-md-12">

<?php include 'includes/menu.php'; ?>

</div>
            <div class="col-md-10" style="padding-top: 50px;"> 
                <div class="card-body">
                    <h5 class="card-title"><?php echo $lista['nome_lista']?></h5>
                    <h5 class="card-subtitle mb-2 text-muted">
                        <?php echo $data?> Por <?php echo $lista['nome']?>
                    </h5>
                    <div class="card-text">
                        <?php echo html_entity_decode($lista['itens'])?>
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
    </body>
</html>