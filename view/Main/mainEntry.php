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

    $entrys = $objEntry->getEntrys();
    if(isset($_POST['entry-search'])){
        $entrys = $objEntry->searchEntries($_POST['searcEntry']);
    }
    ?>
    <div class="container">
    <?php
        session_start(); 
        if(isset($_SESSION['message'])){
            echo(
                '<div class="alert mt-2 alert-' . $_SESSION['status'] . ' alert-dismissible fade show" role="alert">
                    ' . $_SESSION['message'] . '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
        }
        session_destroy();   
    ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12">
                <header class="header-default">
                    <h1>ENTRADAS CREADAS</h1>
                </header>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-12">
                <?php 
                    if($entrys == false){
                ?>
                    <div class="alert alert-message m-5 pt-5 pb-5" role="alert">
                        <strong>No hay entradas todavia</strong>
                    </div>
                <?php
                } else {
                ?>
                    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="container">
                        <div class="input-group">
                            <input type="text" name="searcEntry" placeholder="Buscar Entrada" class="form-control">
                            <input type="submit" name="entry-search" class="btn btn-update-entry" value="Buscar">
                        </div>
                    </form>
                    <div class="body-entry">
                        <?php 
                            foreach ($entrys as $entry){
                                $comments = $objComm->getCommentsCount($entry['id']);
                        ?>
                        <div class="card border-primary mt-3">
                            <div class="card-header card-custom-entry"><i class="fa fa-user" aria-hidden="true"></i> Autor: <strong> Cristian Checa</strong></div><!-- ASPECTO DE ESTE NOMBRE -->
                            <div class="card-body card-custom-body row">
                                <h5 class="card-title"><a href="./createEntry.php?entry=<?php echo($entry['id']); ?>"><?php echo($entry['titulo']); ?></a></h5>
                                <p>Ultima Actualizacion: <?php echo($entry['fecha']); ?></p>
                                <p class="card-text">
                                    <i class="fa fa-eye" aria-hidden="true"></i> <?php echo($entry['vistas']); ?>
                                    <a href="./commentsPage.php?id=<?php echo($entry['id']); ?>">
                                        <i class="fa fa-comment" aria-hidden="true"></i> <?php echo($comments); ?>
                                    </a>
                                </p>
                                <p class="card-text"><span class="<?php echo($entry['activo'] == 1 ? 'badge badge-primary' : 'badge badge-secondary'); ?>"> <?php echo($entry['activo'] == 1 ? 'publicado' : 'borrador'); ?></p>
                                <a href="./createComment.php?entry=<?php echo($entry['id']); ?>" role="button" class="btn btn-update-entry ml-auto">
                                    Comentar
                                </a>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                <?php   
                }
                ?>
            </div>
        </div>
        <div class="m-5 text-center">
            <a href="../../controller/Entry/mainController.php?q=create" class="btn btn-create-entry btn-block">
                <i class="fa fa-plus" aria-hidden="true"></i> Nueva entrada
            </a>
        </div>
    </div>
    <?php
    include('./foot.php');
    include_once('../footer.php');
    ?>
</body>

</html>