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

    $usuario = buscar(
        'usuario',
        [
            'nome',
            'email',
            'telefone',
            'usuario_id'
        ],
        [
            ['usuario_id', '=', $usuarios]
        ]
);
        $usuarios = $usuario[0];

?>
<html>
    <head>  
    <title>Purchase Manager</title>
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/usuario_detalhe.css">
    </head>
    <body>

            <div class="col-md-12" style="min-height: 100px;">

                <?php include 'includes/menu.php'; ?>

                <h2 class="h2"><?php echo $usuarios['nome']?></h2>

                <div class="form-row">
                                
                    <div class="form-group col-md-6">

                        <label for="nome">Email</label>

                        <input class="form-control" type="text" placeholder="<?php echo $usuarios['email']?>" readonly>

                    </div>
                                
                </div>
                <div class="form-row">
                                
                    <div class="form-group col-md-6">

                        <label for="nome">Telefone</label>

                        <input class="form-control" type="text" placeholder="<?php echo $usuarios['telefone']?>" readonly>

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