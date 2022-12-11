<?php

    session_start();

?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Menu - Topo</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/headers/">

    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">

    <link href="headers.css" rel="stylesheet">

  </head>
  <body>

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="bootstrap" viewBox="0 0 118 94">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
  </symbol>
</svg>

<main>
  
  <div>
    
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-3 mb-4 border-bottom">
      
        <a href="../index.php" class="d-flex align-items-center col-md-2 mb-2 mb-md-0 text-dark text-decoration-none">
        
            <img class=" col-md-4 me-2" width="40" height="45" role="img" src="lib/img/Manager.png" aria-label="Bootstrap">

            <span class="fs-4">Purchase Manager</span>
      
        </a>

        <?php if (!isset($_SESSION['login'])) :  ?>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

            <li><a href="index.php" class="nav-link text-dark px-4 ">Home</a></li>
            
            <li><a href="#Texto2" class="nav-link text-dark px-4 ">O que é</a></li>
        
            <li><a href="#Texto3" class="nav-link text-dark px-4 ">Funções</a></li>
        
            <li><a href="#Texto4" class="nav-link text-dark px-4 ">Como usar</a></li>
        
        </ul>

        <div class="col-md-2 text-end">

                <a href="login_formulario.php"><button type="button" class="btn btn-outline-primary me-2">Login</button></a>
                <a href="usuario_formulario.php"><button type="button" class="btn btn-outline-primary me-2">Cadastrar-se</button></a>
        </div>
        
            <?php endif ?>
            

            <?php if (isset($_SESSION['login'])) :  ?>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">

              <li><a href="index.php" class="nav-link text-dark px-3 ">Home</a></li>
              
              <li><a href="listas_exibir.php" class="nav-link text-dark px-3 ">Listas</a></li>
          
              <li><a href="produtos_exibir.php" class="nav-link text-dark px-3 ">Produtos</a></li>
          
              <li><a href="compras_exibir.php" class="nav-link text-dark px-3 ">Compras</a></li>

              <?php if ($_SESSION['login']['usuario']['adm']===1) : ?>
                <li><a href="administrar.php" class="nav-link text-dark px-3 ">Administrar</a></li>

            <?php endif; ?>
        
            </ul>

            <div class="text-right">

              Seja Bem-vindo, <?php echo $_SESSION['login']['usuario']['nome'] ?>!

              <a href="usuario_detalhe_exe.php" class="btn btn-link btn-sm" role="button"> Config Usuário </a>

              <a href="core/usuario_repositorio.php?acao=logout" class="btn btn-link btn-sm" role="button"> Sair </a>

          </div>

          <?php endif ?>

        </div>
    
    </header>
</div>
</main>

    <script src="js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
      
  </body>
</html>