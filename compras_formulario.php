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

                        foreach($_POST as $indice => $dado){

                            $$indice = limparDados($dado);
                        
                        }

                        if(!empty($id)){
                            $id = (int)$id;

                            $criterio = [
                                ['id_compra', '=', $id]
                            ];

                            $retorno = buscar(
                                'compras',
                                ['*'],
                                $criterio
                            );

                            $entidade = $retorno[0];
                        }
                    ?>

                    <h2>Registro de Compra Realizada</h2>

                    <br>
                    <form method="POST" action="core/produto_repositorio.php" enctype="multipart/form-data">

                        <input type="hidden" name="acao"
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        
                        <input type="hidden" name="id_compra"
                            value="<?php echo $entidade['id_compra'] ?? '' ?>">

                        <div class="form-row">
                            
                            <div class="form-group col-md-3">

                                    <label for="titulo_compra">Título da Compra</label>
                                
                                <input class="form-control" type="text"
                                        require="require" id="titulo" name="titulo"
                                        value="<?php echo $entidade['titulo'] ?? '' ?>">
                            
                            </div>
                            
                        </div>

                        <div class="form-row">
                        
                            <div class="form-group col-md-3">

                                <label for="descricao">Descrição</label>
                                
                                <textarea class="form-control" type="text"
                                    require="require" id="descricao" name="descricao" rows="5">
                                    <?php echo $entidade['descricao'] ?? '' ?>
                                </textarea>
                            
                            </div>
                            
                        </div>

                        <div class="form-row">
                            
                            <div class="form-group col-md-3">
                            
                                <label for="local_nome">Estabelecimento</label>
                            
                                <input class="form-control" type="text"
                                    require="require" id="local_nome" name="local_nome"
                                    value="<?php echo $entidade['local_nome'] ?? '' ?>">
                            
                            </div>
                            
                            <div class="form-group col-md-3">
                                
                                <label for="date">Data de Realização</label>
                            
                                <?php 
                                    
                                    $data = (!empty($entidade['data_postagem'])) ?
                                        explode(' ', $entidade['data_postagem'])[0] : '';
                                ?>

                                <div lass="form-group col-md-3">

                                    <input class="form-control" type="date"
                                        require="required"
                                        id="data_postagem"
                                        name="data_postagem"
                                        value="<?php echo $data ?>">
                                </div> 
                            
                            </div>
                            
                        </div>

                        <div class="form-row">
                            
                            <div class="form-group col-md-3">
                            
                                <label for="valor_compra">Valor</label>
                            
                                <input class="form-control" type="text"
                                    require="require" id="valor_compra" name="valor_compra"
                                    value="<?php echo $entidade['valor_compra'] ?? '' ?>">
                            
                            </div>
                            
                        </div>
                        
                        </div>

                        <div class="input-group mb-3 col-md-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="foto">Nota Fiscal</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="foto" name="foto[]" accept="image/*" required>
                                <label class="custom-file-label" for="foto">Escolher arquivo</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">  
                        
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