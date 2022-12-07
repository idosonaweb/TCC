<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <nav>
   

    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Design</a></li>
        <li><a href="#">Modelos</a></li>
        <li><a href="#">Especs</a></li>
        <li><a href="#">Lojas</a></li>
        <li><a href="#">Contato</a></li>
    </ul>
</nav>


  <link rel="stylesheet" href="lib/css/tela_produtos.css">
  <script src="./lib/js/tela_produto.js" defer></script>
  <title>Purchase Manager</title>
</head>
<body>

  <div id="wrapper">
    <div id="container">
        <header>
            <div></div>
        </header>
        <div id="content"></div><!--content-->
    </div><!--container-->
</div><!--wrapper-->

  <div class="container-slider">
    <button id="prev-button"><img src="./imagens/seta_s.png" alt="prev-button"></button>
    <div class="container-images">
      <img src="./imagens/Cotonete.jpg" alt="girl" class="slider on">
      <img src="./imagens/escova.jpg" alt="girl" class="slider">
      <img src="./imagens/shampoo.jpg" alt="ok" class="slider">
      <img src="./imagens/banana.jpg" alt="ok" class="slider">
    </div>
    <button id="next-button"><img src="./imagens/seta_s.png" alt="next-button"></button>
  </div>
</body>
</html>