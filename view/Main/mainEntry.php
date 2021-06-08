<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../header.php'); ?>
    <title>Entradas</title>
</head>

<body>
    <?php
    require_once('./navbar.php');
    require_once('../../controller/Entry/mainController.php');
    require_once('../../controller/Comment/commentsController.php');
    $objEntry = new EntryActions();
    $objComm = new CommentActions();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <header class="header-default">
                    <h1>ENTRADAS CREADAS</h1>
                </header>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-12">

            </div>
        </div>
        <?php 
            //si no hay entradas colocar alerta que no hay cartas
            $entrys = $objEntry->getEntrys();
            if($entrys == false){
        ?>
            <div class="alert alert-message m-5 pt-5 pb-5" role="alert">
                <strong>No hay entradas todavia</strong>
            </div>
        <?php
        } else {
            foreach ($entrys as $entry){
                $comments = $objComm->getCommentsCount($entry['id']);
        ?>
            <div class="body-entry mb-5">
                <div class="card border-primary mt-3">
                    <div class="card-header"><i class="fa fa-user" aria-hidden="true"></i> Autor: <strong> Cristian Checa</strong></div><!-- ASPECTO DE ESTE NOMBRE -->
                    <div class="card-body">
                        <h5 class="card-title"><?php echo($entry['titulo']); ?></h5>
                        <p class="card-text"><span class="<?php echo($entry['activo'] == 1 ? 'badge badge-primary' : 'badge badge-secondary'); ?>"> <?php echo($entry['activo'] == 1 ? 'publicado' : 'borrador'); ?>
                        </span> Ultima Actualizacion: <?php echo($entry['fecha']); ?></p>
                        <p class="card-text">
                            <i class="fa fa-eye" aria-hidden="true"></i> <?php echo($entry['vistas']); ?> visitas
                            <a href="./commentsPage.php?q=<?php echo($entry['id']); ?>">
                                <i class="fa fa-comment" aria-hidden="true"></i> <?php echo($comments); ?> comentarios
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        <?php
            }
        }
        ?>
        <div class="m-5 text-center">
            <a href="../../controller/Entry/mainController.php?q=create">
                <button type="button" class="btn btn-primary p-3"> <i class="fa fa-plus" aria-hidden="true"></i> Nueva entrada</button>
            </a>
        </div>
    </div>
    <?php
    include('./foot.php');
    include_once('../footer.php');
    ?>
</body>

</html>