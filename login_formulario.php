<!DOCTYPE html>

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

        <form method="POST" action="core/usuario_repositorio.php">

            <h2>Login</h2>

            <input type="hidden" name="acao" value="login">

                <div class="inputBox">

                    <label for="email">E-Mail</label>

                    <input type="text" required="required" id="email" name="email">

                    <i></i>

                </div>

                <div class="inputBox">

                    <input type="password" required="required" id="senha" name="senha">

                    <label for="senha">Senha</label>

                    <i></i>

                </div>

                <div class="links">
                    
                    <a href="mercado_formulario.php">Cadastre-se como Mercado</a>

                    <a href="usuario_formulario.php">Cadastre-se como Usuario</a>

                </div>

                <div class="container-btn">

                    <input type="submit" value="Login">

                </div>

                <footer class='container-footer'>

                    <span>&copy; PURCHASE MANAGER</span>

                </footer>

        </form>

      </div>
      
    </div>

</body>
</html>