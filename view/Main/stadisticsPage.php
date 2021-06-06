<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../header.php'); ?>
    <title>Estadisticas</title>
</head>

<body>
    <?php require_once('./navbar.php'); ?>
    <div class="container" style="height: 500px;">
        <header class="header-default">
            <h1>Estadisticas</h1>
        </header>
        <div class="m-3">
            <ul class="list-group" style="color: #187AE1;">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-pen"></i> Numero de Entradas
                    </div>
                    <span class="badge custom-badge badge-pill">{numero}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa fa-comment" aria-hidden="true"></i> Comentarios Realizados
                    </div>
                    <span class="badge custom-badge badge-pill">{numero}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fa fa-eye" aria-hidden="true"></i> Visitas Totales
                    </div>
                    <span class="badge custom-badge badge-pill">{numero}</span>
                </li>
            </ul>
        </div>
    </div>
    <?php
    include('./foot.php');
    require_once('../footer.php');
    ?>
</body>

</html>