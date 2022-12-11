<!DOCTYPE html>
<?php 
    require_once 'includes/funcoes.php';
    require_once 'core/conexao_mysql.php';
    require_once 'core/sql.php';
    require_once 'core/mysql.php';

    foreach($_GET as $indice => $dado){
        $$indice = limparDados($dado);
    }

    $usuario = buscar(
        'usuario',
        [
            'nome',
            'email',
            'telefone',
            
        ],
        [
            ['usuario_id', '=', $usuario]
        ]
);
        $usuario = $usuarios[0];

?>
<html>
    <head>
        <title><?php echo $usuarios['nome']?></title>
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    </head>
    <body>
    
            <div class="row" style="min-height: 500px;">
            <div class="col-md-12">

<?php include 'includes/menu.php'; ?>

</div>
            <div class="col-md-10"> 
                <div class="card-body">
                    <h5 class="card-title"><?php echo $usuario['nome']?></h5>
                    <h5 class="card-subtitle mb-2 text-muted">
                        <?php echo $data?> Por <?php echo $usuario['nome']?>
                    </h5>
                    <div class="card-text">
                        <?php echo html_entity_decode($usuario['email'])?>
                        </div>
                        <div class="card-text">
                        <?php echo html_entity_decode($usuario['telefone'])?>
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