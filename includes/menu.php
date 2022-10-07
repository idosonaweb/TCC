<div class="card">

    <div class="card-header">

        Menu

    </div>

    <div class="card-body">

        <ul class="nav flex-column">

            <li class="nav-item">

                <a class="nav-link" href="index.php">Home</a>

            </li>

            <li class="nav-item">

                <a class="nav-link" href="usuario_formulario.php">Cadastre-se</a>

            </li>


fazer esse sumir depois de logar 
            <li class="nav-item">

                <a class="nav-link" href="login_formulario.php">Login</a>

            </li>

            <?php if (isset($_SESSION['login'])) : ?>

            <li class="nav-item">

                <a class="nav-link" href="post_formulario.php">Compras e Listas</a>

            </li>

            <?php endif; ?>

            <?php if (isset($_SESSION['login'])) : ?>

            <li class="nav-item">

                <a class="nav-link" href="post_formulario.php">Mercados</a>

            </li>

            <?php endif; ?>

            <?php if (isset($_SESSION['login'])) : ?>

            <li class="nav-item">

                <a class="nav-link" href="post_formulario.php">Produtos</a>

            </li>

            <?php endif; ?>

        </ul>

    </div>

</div>