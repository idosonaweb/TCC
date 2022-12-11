<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">

    <meta name="viewport" cont ent="width=device-width, initial-scale=1">

    <meta name="description" content="">    

    <title>Purchase Manager</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/carousel/">

    <link href="lib/css/bootstrap.min.css" rel="stylesheet" >
    
    <meta name="theme-color" content="#712cf9">

    <link rel="stylesheet" href="lib/css/style.css">

    <link href="lib/css/features.css" rel="stylesheet">

    <link href="lib/css/carousel.css" rel="stylesheet">
</head>
    <body>
        <div class="row" style="min-height: 500px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php'; ?>
            </div>
        </div>
        <div class="bd-example bd-example-tabs">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active show" id="pills-profile-tab" data-toggle="pill" href="#usuario" role="tab" aria-controls="pills-profile" aria-selected="true">Usuário</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#mercado" role="tab" aria-controls="pills-contact" aria-selected="false">Mercado</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="usuarios" role="tabpanel" aria-labelledby="pills-profile-tab">
                <p>
                    <?php
                        include 'usuarios.php';
                    ?>
                </p>
                </div>
                <div class="tab-pane fade" id="mercado" role="tabpanel" aria-labelledby="pills-contact-tab">
                <p>
                    <?php
                        include 'mercados.php';
                    ?>
                </p>
            </div>
        </div>
        </div>
    
        <script src="lib/js/bootstrap.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <script src="lib/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    </body>
</html>