<!DOCTYPE html>
<<<<<<< HEAD
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="lib/css/login.css">
   <title>Purchase Manager</title>
</head>
<body>
   <div class="box">
      <div class="form">
        <h2>Login</h2>
        <div class="inputBox">
          <input type="text" required="required">
          <span>E-Mail</span>
          <i></i>
=======

<html>

    <head>

        <title>Login | Projeto para Web com PHP</title>

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

                    <?php include 'includes/menu.php'; ?>

                </div>

                <div class="col-md-10" style="padding-top: 50px ;">

                    <div class="card-header">Login</div>

                    <div class="card-body">

                        <form method="POST" action="core/usuario_repositorio.php">

                            <input type="hidden" name="acao" value="login">

                            <div class="form-group">

                                <label for="email">E-mail</label>

                                <input class="form-control" type="text" 
                                    require="required" id="email" name="email">

                            </div>

                            <div class="form-group">

                                <label for="senha">Senha</label>

                                <input class="form-control" type="password" 
                                    require="required" id="senha" name="senha">

                            </div>

                            <div class="text-right"> 

                            <button class="btn btn-success" type="submit">Acessar</button>

                            </div>

                        </form>
                
                    </div>
            
                </div>
        
            </div>
        
            <div class="row">

                <div class="col-md-12">

                    <?php include 'includes/rodape.php'; ?>

                </div>
                        
            </div>

>>>>>>> 9564c0f397dbb83a293fc55a966af1c296009d50
        </div>
        <div class="inputBox">
          <input type="password" required="required">
          <span>Senha</span>
          <i></i>
        </div>
        <div class="links">
          <a href="tela_cadastro_mercado.html">Cadastre-se como Mercado</a>
          <a href="tela_cadastro_usuario.html">Cadastre-se como Usuario</a>
        </div>
        <div class="container-btn">
          <input type="submit" value="Login">
        </div>
        <footer class='container-footer'>
         <span>&copy; PURCHASE MANAGER</span>
       </footer>
      </div>
    </div>
</body>
</html>