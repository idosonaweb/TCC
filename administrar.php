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

    <link rel="stylesheet" href="lib/css/administrar.css">

</head>
    <body>
        <div class="row" style="min-height: 100px;">
            <div class="col-md-12">
                <?php include 'includes/menu.php'; ?>
            </div>
        </div>
        <div class="bd-example bd-example-tabs">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <button class="btn btn-outline-primary my-2 my-sm-0">Usuarios</button></a>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <p>
                    <?php
                        include 'usuarios.php';
                    ?>
                </p>
                </div>
                
            </div>
        </div>
        </div>
        <br>
        <br>
        <br>

<?php

include 'includes/rodape.php';

?>
    </body>
</html>