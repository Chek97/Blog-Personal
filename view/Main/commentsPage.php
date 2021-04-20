<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../header.php'); ?>
    <title>Comentarios</title>
</head>

<body>
    <?php require_once('./navbar.php'); ?>
    <div class="container">
        <header>
            <h1>COMENTARIOS</h1>
        </header>
        <?php 
            //si no hay entradas colocar alerta que no hay cartas
        ?>
        <div class="alert alert-message m-5 pt-5 pb-5" role="alert">
            <strong>No hay comentarios todavia</strong>
        </div>
        <div class="m-3">
            <div class="card mb-5">
                <div class="card-header">
                    {{Author}} ha comentado en {{nombreEntrada}}
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>A well-known quote, contained in a blockquote element.</p>
                        <footer class="blockquote-footer">Comentado el<cite title="Source Title"> 16 abr 2021</cite></footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('./foot.php');
    require_once('../footer.php');
    ?>
</body>

</html>