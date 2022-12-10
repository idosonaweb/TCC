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
                    <form method="POST" action="core/produto_repositorio.php" enctype="multipart/form-data">

                        <input type="hidden" name="acao"
                                value="<?php echo empty($id) ? 'insert' : 'update' ?>">
                        
                        <input type="hidden" name="id_produto"
                            value="<?php echo $entidade['id_produto'] ?? '' ?>">

                        <div class="form-row">
                            
                            <div class="form-group col-md-3">
                            
                                <label for="nome_produto">Nome</label>
                            
                                <input class="form-control" type="text"
                                    require="require" id="nome_produto" name="nome_produto"
                                    value="<?php echo $entidade['nome_produto'] ?? '' ?>">
                            
                            </div>
                            
                        </div>

                        <div class="form-row">
                        
                            <div class="form-group col-md-3">
                            
                                <label for="marca">Marca</label>
                            
                                <input class="form-control" type="text"
                                    require="require" id="marca" name="marca"
                                    value="<?php echo $entidade['marca'] ?? '' ?>">
                            
                            </div>
                            
                        </div>
                            
                        <div class="form-row">
                            
                            <div class="form-group col-md-3">
                            
                                <label for="valor">Valor</label>
                            
                                <input class="form-control" type="text"
                                    require="require" id="valor" name="valor"
                                    value="<?php echo $entidade['valor'] ?? '' ?>">
                            
                            </div>
                            
                            <div class="form-group col-md-3">
                                
                                <label for="quantidade">Quantidade</label>
                            
                                <input class="form-control" type="number"
                                    require="require" id="quantidade" name="quantidade"
                                    value="<?php echo $entidade['quantidade'] ?? '' ?>">
                                                                
                            </div>
                        
                        </div>

                        <div class="form-row">
                            
                            <div class="form-group col-md-3">
                            
                                <label for="nome_mercado">Nome do Mercado</label>
                            
                                <input class="form-control" type="text"
                                    require="require" id="nome_mercado" name="nome_mercado"
                                    value="<?php echo $entidade['nome_mercado'] ?? '' ?>">
                            
                            </div>
                            
                            <div class="form-group col-md-3">
                                
                                <label for="date">Data de Validade</label>
                            
                                <?php 
                                    
                                    $data = (!empty($entidade['data_final'])) ?
                                        explode(' ', $entidade['data_final'])[0] : '';
                                ?>

                                <div lass="form-group col-md-3">

                                    <input class="form-control" type="date"
                                        require="required"
                                        id="data_final"
                                        name="data_final"
                                        value="<?php echo $data ?>">
                                </div> 
                            
                            </div>
                            
                        </div>
                        
                        </div>

                        <div class="input-group mb-3 col-md-6">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="foto">Foto Produto</span>
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