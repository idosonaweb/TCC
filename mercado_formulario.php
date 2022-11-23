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
        
            <img src="./img/LOGO.png"> 
        
        </div>
        
        <div class="form">

            <?php 
                    
                require_once 'includes/funcoes.php' ;

                require_once 'core/conexao_mysql.php' ;
                    
                require_once 'core/sql.php' ;
                    
                require_once 'core/mysql.php' ;

                if (isset($_SESSION['login'])) 
                {
                    $id = (int) $_SESSION['login']['mercado']['id_mercado'];

                    $criterio = [
                        ['id_mercado', '=', $id]
                    ];

                    $retorno = buscar (
                        'mercado',
                        ['id_mercado', 'nome', 'email'],
                        $criterio
                    );

                        $entidade = $retorno[0];
                    }

            ?>
            
            <form method="POST" action="core/mercado_repositorio.php">

                <input type="hidden" name="acao" 
                        value="<?php echo empty($id) ? 'insert' : 'update' ?>">

                <input type="hidden" name="id" 
                        value="<?php echo $entidade['id_mercado'] ?? '' ?>">
                
                <div class="container-titule-button">
                
                    <h2 class="titule">Cadastre-se</h2> 
                    
                    <button id="button" type="submit">Cadastrar</button>
                
                </div>
                
                <br>
                
                <div class="input group">
                     
                    <div class="input-box">
                    
                        <label for="nome">Nome</label>
                        
                        <input class="form-control" type="text" placeholder="Digite o nome do mercado"
                            require="required" id="nome" name="nome" 
                            value="<?php echo $entidade['nome_mercado'] ?? '' ?>">                     
                    </div>

                    <div class="input-box">
                        
                        <label for="rua">Rua</label>
                        
                        <input class="form-control" type="text" placeholder="Digite sua rua"
                                require="required" id="rua" name="rua" 
                                value="<?php echo $entidade['rua'] ?? '' ?>">                    
                    </div>

                    <div class="input-box">
                    
                        <label for="bairro">Bairro</label>
                        
                        <input class="form-control" type="text" placeholder="Digite seu bairro"
                                require="required" id="bairro" name="bairro" 
                                value="<?php echo $entidade['bairro'] ?? '' ?>">                    
                    </div>

                    <div class="input-box">
                    
                        <label for="cidade">Cidade</label>
                        
                        <input class="form-control" type="text" placeholder="Digite sua cidade"
                                require="required" id="cidade" name="cidade" 
                                value="<?php echo $entidade['cidade'] ?? '' ?>">                    
                    </div>

                    <div class="input-box">
                    
                        <label for="estado">Estado</label>
                        
                        <input class="form-control" type="text" placeholder="Digite seu estado"
                                require="required" id="estado" name="estado" 
                                value="<?php echo $entidade['estado'] ?? '' ?>">                    
                    </div>

                    <?php if (!isset($_SESSION['login'])) : ?>

                    <div class="input-box">
                    
                        <label for="cnpj">CNPJ</label>
                        
                        <input class="form-control" type="text" placeholder="Digite seu cnpj"
                                require="required" id="cnpj" name="cnpj" 
                                value="<?php echo $entidade['cnpj'] ?? '' ?>">                    
                    </div>
                </div>

                <?php endif; ?>

            </form>
        </div>
    </div>
</body>
</html>
