<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('../header.php'); ?>
    <title>Nuevo Comentario</title>
</head>
<body>
    <?php 
        require_once('./navbar.php');
        include('../../controller/Entry/mainController.php');

        $objEntry = new EntryActions();
        $entry = $objEntry->getEntry(2, $_GET['entry']);
    ?>
    <header class="header-default">
        <h1>Crear Comentario</h1>
    </header>
    <form action="../../controller/Comment/commentsController.php?q=create" method="POST" class="container" style="min-height: 500px;">
        <div>
            <p>Comentario para la entrada <a href="#"><?php echo($entry['titulo']); ?></a></p>
        </div>
        <input type="hidden" name="entry_id" value="<?php echo($_GET['entry']); ?>">
        <div class="form-group">
          <textarea class="form-control" name="value" id="value" placeholder="Escribe tu comentario aqui" rows="3"></textarea>
        </div>
        <div id="message-error">

        </div>
        <input type="submit" id="btn-comment-submit" value="Publicar" class="btn btn-primary">
    </form>
    <?php
        include('./foot.php');
        include_once('../footer.php');
    ?>
</body>
</html>