<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../header.php'); ?>
    <title>Blog Personal</title>
</head>

<body class="landing-body">
    <?php require_once('./navbar.php'); ?>
    <header class="landing-header">
        <h1>¿QUE PUEDES HACER CON UN BLOG?</h1>
    </header>
    <div class="container mt-5">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img class="img img-thumbnail p-5" src="../../public/img/modelo.svg" alt="blog">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">Escribe Tus Pensamientos</h2>
                        <p class="card-text">
                            En este blog podras escribir todo lo que quieras desde objetivos y pequeñas notas,
                            hasta reseñas y criticas personales y constructivas sobre los temas que prefieras.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title">Gana Dinero</h2>
                        <p class="card-text">
                            Conforme vayas adquiriendo mas popularidad y te sigan muchas personas
                            podras monetizar tus entradas y empezar a ganar dinero por todas tus 
                            publicaciones ¿Genial no?.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img class="img img-thumbnail p-5" src="../../public/img/bolsa-de-dinero.png" alt="dinero">
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