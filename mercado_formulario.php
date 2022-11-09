<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Purchase Manager</title>
    <link rel="stylesheet" href="lib/css/tela_cadastro.css">
</head>
<body>
    <div class="container">
        <div class="form-image">
            <img src="img/LOGO.png"> 
        </div>
        <div class="form">
            <form action="#">
                <div class="container-titule-button">
                        <h2 class="titule">Cadastre-se</h2> 
                        <button id="button" type="submit" > Cadastrar  </button>
                </div>
                <br>
                 <div class="input group">
                     <div class="input-box">
                         <label for="nome_completo"> Nome Completo </label>
                         <input id="nome_completo" type="text" name="nome_completo" placeholder="Digite seu primeiro nome " required >
                     </div>

                     <div class="input-box">
                        <label for="cnpj"> CNPJ </label>
                        <input id="cnpj" type="text" name="cnpj" placeholder="Digite seu CNPJ " required>
                    </div>

                     <div class="input-box">
                        <label for="mercado"> Nome Mercado </label>
                        <input id="mercado" type="text" name="mercado" placeholder="Digite seu sobrenome " required>
                    </div>

                    <div class="input-box">
                        <label for="email"> E-mail </label>
                        <input id="email" type="text" name="email" placeholder="Digite seu email " required>
                    </div>

                    <div class="input-box">
                        <label for="celular"> Celular </label>
                        <input id="celular" type="text" name="celular" placeholder="(XX) XXXXX-XXXX " required>
                    </div>

                    <div class="input-box">
                        <label for="senha"> Senha </label>
                        <input id="senha" type="text" name="pasword" placeholder="Digite sua senha " required>
                    </div>
                 </div>
            </form>
        </div>
    </div>
</body>
</html>