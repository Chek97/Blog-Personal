<!DOCTYPE html>
<html lang="en">

<head style="text-align: justify;">
    <?php include_once('../header.php'); ?>
    <title>Blog Personal</title>
</head>

<body class="landing-body">
    <?php require_once('./navbar.php'); ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <header class="landing-header text-center">
                    <h1>BIENVENIDO A TU BLOG PERSONAL</h1>
                    <p class="text-muted">
                        En este sitio podras escribir sobre todo lo que tu quieras
                    </p>        
                </header>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="card mb-3 card-full">
                    <div class="row no-gutters">
                        <div class="col-xs-12 col-md-4 p-5">
                            <img class="img img-thumbnail image-card-custom" src="../../public/img/modelo.svg" alt="blog">
                        </div>
                        <div class="col-xs-12 col-md-8 card-body-custom">
                            <div class="card-body">
                                <h2 class="card-title text-center pb-2">ESCRIBE TUS PENSAMIENTOS</h2>
                                <p class="card-text">
                                    En este blog podras escribir todo lo que quieras desde objetivos y pequeñas notas,
                                    hasta reseñas y criticas personales y constructivas sobre los temas que prefieras.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <div class="card mb-3 card-full">
                    <div class="row no-gutters">
                        <div class="col-xs-12 col-md-4 p-5">
                            <img class="img img-thumbnail image-card-custom" src="../../public/img/bolsa-de-dinero.png" alt="dinero">
                        </div>
                        <div class="col-xs-12 col-md-8 card-body-custom-left">
                            <div class="card-body">
                                <h2 class="card-title">Gana Dinero</h2>
                                <p class="card-text">
                                    Conforme vayas adquiriendo mas popularidad y te sigan muchas personas
                                    podras monetizar tus entradas y empezar a ganar dinero por todas tus
                                    publicaciones ¿Genial no?.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('./foot.php');
    include_once('../footer.php');
    ?>
</body>

</html>