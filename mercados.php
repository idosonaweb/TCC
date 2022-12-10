<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <meta name="viewport" cont ent="width=device-width, initial-scale=1">

    <meta name="description" content="">    

    <title>Purchase Manager</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    <link href="lib/css/bootstrap.min.css" rel="stylesheet" >
    
    <meta name="theme-color" content="#712cf9">

    <link rel="stylesheet" href="lib/css/style.css">

    <link href="lib/css/features.css" rel="stylesheet">

    <link href="lib/css/carousel.css" rel="stylesheet">

</head>
    <body>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-10" style="padding-top: 50px;">
                <?php include 'includes/busca.php'; ?>
                <?php
                        require_once 'includes/funcoes.php';
                        require_once 'core/conexao_mysql.php';
                        require_once 'core/sql.php';
                        require_once 'core/mysql.php';

                        foreach($_GET as $indice => $dado){
                            $$indice = limparDados($dado);
                        }

                        $data = date('Y-m-d');

                        $criterio = [];

                        if(!empty($busca)){
                            $criterio[] = ['nome_mercado', 'email_mercado', "%{$busca}%"];
                        }

                        $result = buscar(
                            'mercado',
                            [
                                'id_mercado',
                                'nome_mercado',
                                'email_mercado',
                                'rua',				
                                'bairro',			
                                'cidade',				
                                'estado',
                                'cnpj',
                                'ativo',
                            ],
                            $criterio,
                            'data_criacao DESC, nome ASC'
                        );

                    ?>

                        <br>

                    <table class="table table-bordered table-hover table-striped
                        table-responsive{-sm|-md|-lg|-xl}">
                    <thead>
                        <tr>
                            <td>Nome</td>
                            <td>E-mail</td>
                            <td>Data cadastro</td>
                            <td>Ativo</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($result as $entidade):
                                $data = date_create($entidade['data_criacao']);
                                $data = date_format($data, 'd/m/Y');
                        ?>
                        <tr>
                            <td><?php echo $entidade['nome_mercado'] ?></td>
                            <td><?php echo $entidade['email_mercado'] ?></td>
                            <td><?php echo $data ?></td>
                            <td><a href='core/usuario_repositorio.php?acao=status&id=<?php echo $entidade['id_mercado']?> &valor=<?php echo !$entidade['ativo']?>'><?php echo ($entidade['ativo']==1)  ? 'Desativar' : 'Ativar'; ?> </a></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>
</html>