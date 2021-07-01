<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../header.php'); ?>
    <title>Comentarios</title>
</head>

<body>
    <?php
        require_once('./navbar.php');
        require_once('../../controller/Comment/commentsController.php');
        require_once('../../controller/Entry/mainController.php');
        require_once('../../controller/Author/autorController.php');
        $objCom = new CommentActions();
        $objAut = new AutorActions();
        $objEntry = new EntryActions();
    ?>
    <div class="container">
        <header class="header-default">
            <h1>COMENTARIOS</h1>
        </header>
        <?php
            if (isset($_GET['id'])) {
                $listComments = $objCom->getComments($_GET['id']);
                if ($listComments == false) { 
        ?>
                    <div class="alert alert-message" role="alert">
                        <strong>No hay comentarios todavia</strong>
                    </div>
        <?php   }else{
                    foreach ($listComments as $comment) { 
                        $entry = $objEntry->getEntry(2, $comment['entrada_id']);
                        $autor = $objAut->getAuthor($comment['autor_id']);
        ?>
                        <div class="m-3">
                            <div class="card mb-5">
                                <div class="card-header card-custom-entry">
                                    <strong><?php echo($autor['nombre'] . " " . $autor['apellido']); ?></strong> ha comentado en <strong><?php echo($entry['titulo']); ?></strong>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p><?php echo($comment['valor']); ?></p>
                                        <footer class="blockquote-footer">Comentado el<cite title="Source Title"> <?php echo($comment['fecha']); ?><!-- 16 abr 2021 --></cite></footer>
                                    </blockquote>
                                    <a href="./createComment.php?entry=<?php echo($entry['id']); ?>&com=<?php echo($comment['id']); ?>" role="button" class="btn btn-update-entry mt-3">Editar</a>
                                </div>
                            </div>
                        </div>
            <?php   }
                }
            } else {
                $allComments = $objCom->getComments();
                if ($allComments == false) { 
        ?>
                    <div class="alert alert-message m-5 pt-5 pb-5" role="alert">
                        <strong>No hay comentarios todavia</strong>
                    </div>
        <?php   }else{
                    foreach ($allComments as $comment) { 
                        $entry = $objEntry->getEntry(2, $comment['entrada_id']);
                        $autor = $objAut->getAuthor($comment['autor_id']);
        ?>
                        <div class="m-3">
                            <div class="card mb-5">
                                <div class="card-header card-custom-entry">
                                    <strong><?php echo($autor['nombre'] . " " . $autor['apellido']); ?></strong> ha comentado en <strong><?php echo($entry['titulo']); ?></strong>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p><?php echo($comment['valor']); ?></p>
                                        <footer class="blockquote-footer">Comentado el<cite title="Source Title"> <?php echo($comment['fecha']); ?></cite></footer>
                                    </blockquote>
                                    <a href="./createComment.php?entry=<?php echo($entry['id']); ?>&com=<?php echo($comment['id']); ?>" role="button" class="btn btn-update-entry mt-3">Editar</a>
                                </div>
                            </div>
                        </div>
        <?php       }
                } 
            }
        ?>
        </div>
        <?php
            include('./foot.php');
            require_once('../footer.php');
        ?>
</body>

</html>