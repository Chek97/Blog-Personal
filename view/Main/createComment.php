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
        include('../../controller/Comment/commentsController.php');

        $objEntry = new EntryActions();
        $objComment = new CommentActions();
        $entry = $objEntry->getEntry(2, $_GET['entry']);
        $q = 'create';

        if(isset($_GET['com'])){
            $q = 'update';
            $infoComment = $objComment->getComment($_GET['com']);
        }
        
    ?>
    <header class="header-default">
        <h1>Crear Comentario</h1>
    </header>
    <form action="../../controller/Comment/commentsController.php?q=<?php echo($q); ?>" method="POST" class="container" style="min-height: 500px;">
        <div>
            <p>Comentario para la entrada <a href="#"><?php echo($entry['titulo']); ?></a></p>
        </div>
        <input type="hidden" name="entry_id" value="<?php echo($_GET['entry']); ?>">
        <?php 
            if(isset($infoComment)){ 
        ?>
            <input type="hidden" name="id" value="<?php echo($infoComment['id']); ?>">
        <?php            
            }
        ?>
        <div class="form-group">
          <textarea class="form-control" name="value" id="value" placeholder="Escribe tu comentario aqui" rows="3">
            <?php 
                if(isset($infoComment)){
                    echo($infoComment['valor']);
                }else{
                    echo('');
                }
            ?>
          </textarea>
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