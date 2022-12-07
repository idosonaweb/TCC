<html>

    <head>

        <title>Purchase Manager</title>

        <link rel="stylesheet" href="lib/css/bootstrap.min.css">

    </head>

    <body>
        
        <div>

            <div>

                <div class="col-md-12">

                    <?php include 'includes/menu.php'; ?>

                </div>
            
            </div>

            <div>

                <div class="col-md-12">

                    <?php 
                    
                        require_once 'includes/funcoes.php' ;

                        require_once 'core/conexao_mysql.php' ;
                    
                        require_once 'core/sql.php' ;
                    
                        require_once 'core/mysql.php' ;

                        foreach($_GET as $indice => $dado){
                            $$indice = limparDados($dado);
                        }

                        if(!empty($id)){
                            $id = (int)$id;

                            $criterio = [
                                ['id_produto', '=', $id]
                            ];

                            $retorno = buscar(
                                'produto',
                                ['*'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>

                    <h2>Registro de Produtos cadastrados</h2>

                    <br>
                    <form method="post" action="core/produto_repositorio.php" enctype="multipart/form-data">
                        
                        <input type="hidden" name="acao"
                            value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        
                        <input type="hidden" name="id_produto"
                            value="<?php echo $entidade['id_produto'] ?? '' ?>">
                        
                        <div class="form-group">
                                
                            <label for="titulo_compra">Título da Compra:</label>
                                
                            <input class="form-group" type="text"
                                    require="require" id="titulo" name="titulo" rows="2"
                                    value="<?php echo $entidade['titulo'] ?? '' ?>">
                        </div>

                        <div class="form-group">

                                <label for="descricao">Descrição:</label>
                                
                                <textarea class="form-control" type="text"
                                    require="require" id="descricao" name="descricao" rows="5">
                                    <?php echo $entidade['descricao'] ?? '' ?>
                                </textarea>
                        </div>

                        <div class="form-group">

                            <label for="texto">Data de realização:</label>

                            <?php 
                                
                                $data = (!empty($entidade['data_postagem'])) ?
                                    explode(' ', $entidade['data_postagem'])[0] : '';
                            ?>

                            <div class="row">
                                
                                <div class="col-md-3">  

                                <input class="form-control" type="date"
                                        require="required"
                                        id="data_postagem"
                                        name="data_postagem"
                                        value="<?php echo $data ?>">
                                </div>
                        </div> 
                        <br>
                        <div class="form-group">

                            <label for="local_nome">Estabelecimento:</label>
                            
                            <textarea class="form-control" type="text"
                                    require="require" id="local_nome" name="local_nome" rows="2">
                                    <?php echo $entidade['local_nome'] ?? '' ?>
                            </textarea>

                        </div>

                        <div class="form-group">
                                
                            <label for="valor_compra">Valor:</label>
                            
                            <textarea class="form-control" type="text"
                                    require="require" id="valor_compra" name="valor_compra" rows="2">
                                    <?php echo $entidade['valor_compra'] ?? '' ?>
                            </textarea>

                        </div>

                        <div class="form-group">
                            
                            <label>Foto da nota fiscal:</label>
                        
                            <input  type="file" 
                                        id="foto" 
                                        name="foto[]" 
                                        accept="image/*" 
                                        required>
                        </div>
                        
                        <div class="texto-right">  
                        
                            <button class="btn btn-primary"
                                    type="submit">Salvar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-12">

                <?php

                    include 'includes/rodape.php';
                
                ?>

            </div>
        </div>
    </div>

    <script src="lib/bootstrap-4.2.1-dist/js/boostrap.min.js"></script>   
    
    </body>
</html>