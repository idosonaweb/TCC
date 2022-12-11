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
                            $$INDICE = limparDados($dado);
                        }

                        if(!empty($id_lista)){
                            $id_lista = (int)$id;

                            $criterio = [
                                ['id_lista', '=', $id_lista]
                            ];

                            $retorno = buscar(
                                'listas',
                                ['*'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>

                    <h2>Registro de Lista de Compras</h2>

                    <br>
                    <form method="lista" action="core/listas_repositorio.php">
                        
                        <input type="hidden" name="acao"
                            value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        
                        <input type="hidden" name="id_lista"
                            value="<?php echo $entidade['id_lista'] ?? '' ?>">
                        
                        <div class="form-group">
                                
                            <label for="nome_lista">Nome da Lista:</label>
                                
                            <input class="form-group" type="text"
                                    require="require" id="nome_lista" name="nome_lista" rows="2"
                                    value="<?php echo $entidade['nome_lista'] ?? '' ?>">
                        </div>

                        <div class="form-group">

                                <label for="itens">Itens:</label>
                                
                                <textarea class="form-control" type="text"
                                    require="require" id="itens" name="itens" rows="5">
                                    <?php echo $entidade['itens'] ?? '' ?>
                                </textarea>
                        </div>

                        <div class="form-group">


                        <div class="form-group">
                                
                            <label for="valor_compra">Quantidade de Itens:</label>
                            
                            <textarea class="form-control" type="text"
                                    require="require" id="qtd_produtos" name="qtd_produtos">
                                    <?php echo $entidade['qtd_produtos'] ?? '' ?>
                            </textarea>

                        </div>

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
    
    <?php

    header("Location: ../listas_exibir.php");
                
                ?>
    
    </body>
</html>