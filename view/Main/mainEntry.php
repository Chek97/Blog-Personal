<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../header.php'); ?>
    <title>Entradas</title>
</head>

<body>
    <?php require_once('./navbar.php'); ?>
    <div class="container">
        <header>
            <h1>ENTRADAS CREADAS</h1>
        </header>
        <?php 
            //si no hay entradas colocar alerta que no hay cartas
        ?>
        <div class="alert alert-message m-5 pt-5 pb-5" role="alert">
            <strong>No hay entradas todavia</strong>
        </div>
        <div class="body-entry mb-5">
            <div class="card border-primary mt-3">
                <div class="card-header">...Author: Cristian Checa</div>
                <div class="card-body">
                    <h5 class="card-title">Nombre Entrada</h5>
                    <p class="card-text"><span class="badge badge-secondary"> Estado </span> Ultima Actualizacion: 30/10/2021</p>
                    <p class="card-text">
                        <a href="#" class="mr-3">
                            <i class="fa fa-eye" aria-hidden="true"></i> {numero de} vistas 
                        </a>
                        <a href="#">
                            <i class="fa fa-comment" aria-hidden="true"></i> {numero de} comentarios
                        </a>
                    </p>
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