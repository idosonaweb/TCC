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
        
            <img src="../TCC/lib/img/LOGO.png"> 
        
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
                        ['id_mercado', 'nome_mercado', 'email_mercado','endereco', 'cnpj', 'senha_mercado', 'foto', 'foto_nome'],
                        $criterio
                    );

                    $entidade = $retorno[0];
                }

            ?>
            
            <form method="POST" action="core/mercado_repositorio.php">

                <input type="hidden" name="acao" 
                        value="<?php echo empty($id) ? 'insert' : 'update' ?>">

                <input type="hidden" name="id" 
                        value="<?php echo $entidade['id'] ?? '' ?>">
                
                <div class="container-titule-button">
                
                    <h2 class="titule">Mercado</h2> 
                    
                    <button id="button" type="submit">Cadastrar</button>
                
                </div>
                
                <br>
                
                <div class="input group">
                     
                    <div class="input-box">
                    
                        <label for="nome_mercado">Nome</label>
                        
                        <input class="form-control" type="text" placeholder="Digite o nome do mercado"
                            require="required" id="nome_mercado" name="nome_mercado" 
                            value="<?php echo $entidade['nome_mercado'] ?? '' ?>">                     
                    </div>

                    <div class="input-box">
                        
                        <label for="rua">Endereço</label>
                        
                        <input class="form-control" type="text" placeholder="Digite seu endereco"
                                require="required" id="endereco" name="endereco" 
                                value="<?php echo $entidade['endereco'] ?? '' ?>">                    
                    </div>

                    <div class="input-box">
                        
                        <label for="email"> E-mail </label>
                        
                        <input class="form-control" type="text" placeholder="Digite o e-mail"
                                require="required" id="email_mercado" name="email_mercado" 
                                value="<?php echo $entidade['email_mercado'] ?? '' ?>">
                    
                    </div>

                    <?php if (!isset($_SESSION['login'])) : ?>

                    <div class="input-box">
                    
                        <label for="senha"> Senha </label>
                        
                        <input class="form-control" type="password" placeholder="Digite sua senha"
                                require="required" id="senha_mercado" name="senha_mercado">
                    
                    </div>

                    <div class="input-box">
                    
                        <label for="cnpj">CNPJ</label>
                        
                        <input class="form-control" type="text" placeholder="Digite seu cnpj"
                                require="required" id="cnpj" name="cnpj" >
                    </div>
                    
                    <?php endif; ?> 

                    <div class="input-box">

                        <label for="foto">Foto Produto</label>

                        <input class="form-control" type="file" require="required" id="foto" name="foto[]" accept="image/*">
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
