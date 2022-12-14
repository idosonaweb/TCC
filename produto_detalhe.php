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

    $produto = buscar(
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
        [
            ['id_produto', '=', $produtos]
        ]
);
        $produtos = $produto[0];
        $data = date_create($produtos['data_final']);
        $data = date_format($data, 'd/m/Y');

?>
<html>
    <head>  
        <title>Purchase Manager</title>
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    </head>
    <body>
    
        <div class="row" style="min-height: 100px;">
        <div class="col-md-12">

            <?php include 'includes/menu.php'; ?>

        </div>
            <div class="col-md-10" style="padding-top: 50px;"> 
                <div align='center' class="card-body">
                <img src="upload/<?php echo $produtos['foto_nome'] ?>" height="300px">
                    <h5 class="card-title"><?php echo $produtos['nome_produto']?> - R$ <?php echo $produtos['valor']?></h5>
                    <h5 class="card-subtitle mb-2 text-muted">
                        Mercado <?php echo $produtos['nome_mercado']?>
                    </h5>
                    <div class="card-text"> Marca <?php echo html_entity_decode($produtos['marca'])?> - <?php echo $produtos['quantidade']?> unidades</div>
                    <div class="card-text"> Data de Validade: <?php echo $data ?> </div>
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