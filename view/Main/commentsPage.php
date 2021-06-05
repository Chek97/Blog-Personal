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
        $objCom = new CommentActions();
    ?>
    <div class="container">
        <header>
            <h1>COMENTARIOS</h1>
        </header>
        <?php
            if (isset($_GET['q'])) {
                $listComments = $objCom->getComments($_GET['q']);
                if ($listComments == false) { 
        ?>
                    <div class="alert alert-message m-5 pt-5 pb-5" role="alert">
                        <strong>No hay comentarios todavia</strong>
                    </div>
        <?php   }else{
                    foreach ($listComments as $comment) { 
        ?>
                        <div class="m-3">
                            <div class="card mb-5">
                                <div class="card-header">
                                    <?php echo($comment['autor_id']); ?> ha comentado en <?php echo($comment['entrada_id']); ?>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p><?php echo($comment['valor']); ?></p>
                                        <footer class="blockquote-footer">Comentado el<cite title="Source Title"> <?php echo($comment['fecha']); ?><!-- 16 abr 2021 --></cite></footer>
                                    </blockquote>
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
        ?>
                        <div class="m-3">
                            <div class="card mb-5">
                                <div class="card-header">
                                    <?php echo($comment['autor_id']); ?> ha comentado en <?php echo($comment['entrada_id']); ?>
                                </div>
                                <div class="card-body">
                                    <blockquote class="blockquote mb-0">
                                        <p><?php echo($comment['valor']); ?></p>
                                        <footer class="blockquote-footer">Comentado el<cite title="Source Title"> <?php echo($comment['fecha']); ?><!-- 16 abr 2021 --></cite></footer>
                                    </blockquote>
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