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
             <h2> Cadastro de Usuário </h2>

                </div>

                <div class="col-md-10" style="padding-top: 50px ;">

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
                                ['id', 'nome', 'email','telefone'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }

                    ?>

                    <h2>Usuário</h2>

                    <form method="POST" action="core/usuario_repositorio.php">

                        <input type="hidden" name="acao" 
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">

                        <input type="hidden" name="id" 
                                value="<?php echo $entidade['id'] ?? '' ?>">

                        <div class="form-group">

                            <label for="nome">Nome</label>

                            <input class="form-control" type="text" 
                                require="required" id="nome" name="nome" 
                                value="<?php echo $entidade['nome'] ?? '' ?>">

                        </div>

                        <div class="form-group">

                            <label for="email">E-mail</label>

                            <input class="form-control" type="text" 
                                require="required" id="email" name="email" 
                                value="<?php echo $entidade['email'] ?? '' ?>">

                        </div>

                        <div class="form-group">

                            <label for="email">Telefone</label>

                            <input class="form-control" type="text" 
                                require="required" id="telefone" name="telefone" 
                                value="<?php echo $entidade['telefone'] ?? '' ?>">

                        </div>

                        <?php if (!isset($_SESSION['login'])) : ?>

                        <div class="form-group">

                            <label for="senha">Senha</label>

                            <input class="form-control" type="password" 
                                require="required" id="senha" name="senha">

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