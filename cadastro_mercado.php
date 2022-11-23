<html>

    <head>

        <title>Usuário | Projeto para Web com PHP</title>

        <link rel="stylesheet" href="lib/css/bootstrap.min.css">

    </head>

    <body>
        
        <div class="container">

            <div class="row">

                <div class="col-md-12">

                    <?php include 'includes/topo.php'; ?>

                </div>
            
        </div>

        <div class="row" style="min-height: 500px;">

            <div class="col-md-12">

                <br>
                
                <a class="nav-link" href="index.php">Voltar para Home</a>
                
                <br>
                
                <h2> Cadastro de Mercado </h2>

                </div>

                <div class="col-md-10" style="padding-top: 50px ;">

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
                                ['id_mercado', 'nome_mercado', 'rua','bairro', 'cidade', 'estado'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }

                    ?>

                    <h2>Mercado</h2>

                    <form method="POST" action="core/mercado_repositorio.php">

                        <input type="hidden" name="acao" 
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">

                        <input type="hidden" name="id" 
                                value="<?php echo $entidade['id_mercado'] ?? '' ?>">

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

                        <?php endif; ?>

                        <div class="text-right">

                            <button class="btn btn-success" 
                            type="submit">Salvar</button>

                        </div>

                    </form>
                
                </div>
            
            </div>
            
            <div class="row">

                <div class="col-md-12">

                    <?php include 'includes/rodape.php'; ?>

                </div>
                        
            </div>

        </div>

        <script src="lib/js/bootstrap.min.js"></script>

    </body>

</html>