<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Purchase Manager</title>
    <link rel="stylesheet" href="lib/css/tela_cadastro.css">
</head>
<body>

    <div class="container">

        <div class="form-image">
            <img src="lib/img/LOGO.png"> 
        </div>
        
        <div class="form">

            <?php 
                    
                require_once 'includes/funcoes.php' ;

                require_once 'core/conexao_mysql.php' ;
                    
                require_once 'core/sql.php' ;
                    
                require_once 'core/mysql.php' ;

                if (isset($_SESSION['login'])) 
                {
                    $id = (int) $_SESSION['login']['usuario']['id'];

                    $criterio = [
                        ['id', '=', $id]
                    ];

                    $retorno = buscar (
                        'usuario',
                        ['id', 'nome', 'email'],
                        $criterio
                    );

                        $entidade = $retorno[0];
                    }

            ?>

            <form method="POST" action="core/usuario_repositorio.php">

                <input type="hidden" name="acao" 
                        value="<?php echo empty($id) ? 'insert' : 'update' ?>">

                <input type="hidden" name="id" 
                        value="<?php echo $entidade['id'] ?? '' ?>">

                <div class="container-titule-button">

                        <h2 class="titule">Usuário</h2> 
                        
                        <button id="button" type="submit">Cadastrar</button>
                </div>

                <br>
                
                <div class="input group">
                     
                    <div class="input-box">
                     
                        <label for="nome">Nome</label>

                        <input class="form-control" type="text" placeholder="Digite seu nome"
                            require="required" id="nome" name="nome" 
                            value="<?php echo $entidade['nome'] ?? '' ?>">

                    </div>

                    <div class="input-box">
                        
                        <label for="email"> E-mail </label>
                        
                        <input class="form-control" type="text" placeholder="Digite seu e-mail"
                                require="required" id="email" name="email" 
                                value="<?php echo $entidade['email'] ?? '' ?>">
                    
                    </div>

                    <div class="input-box">

                        <label for="telefone"> Telefone </label>

                        <input class="form-control" type="tel" placeholder="(XX) XXXXX-XXXX "
                                require="required" id="telefone" name="telefone"
                                value="<?php echo $entidade['telefone'] ?? '' ?>">
                    
                    </div>

                    <?php if (!isset($_SESSION['login'])) : ?>

                    <div class="input-box">
                    
                        <label for="senha"> Senha </label>
                        
                        <input class="form-control" type="password" placeholder="Digite sua senha"
                                require="required" id="senha" name="senha">
                    
                    </div>
                 
                </div>

                <?php endif; ?>

            </form>
        </div>
    </div>
</body>
</html>