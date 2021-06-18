<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        include_once('../header.php'); 
        require('../../controller/Entry/mainController.php');
        require('../../controller/Element/elementController.php');
        require('../../controller/Comment/commentsController.php');
        $objEntry = new EntryActions();
        $objElement = new ElementActions();
        $objComent = new CommentActions();

        $entryInfo = $objEntry->getEntry($_GET['id']);//get the entry
        $elements = $objElement->getElements($entryInfo['id']);
        $comments = $objComent->getComments($entryInfo['id']);
    ?>
    <title><?php echo($entryInfo['titulo'])?></title>
    <!-- BORRAR ESTO DESPUES -->
    <style>
        .content-body {
            background-color: rosybrown;
        }

        .content-info {
            background-color: greenyellow;
        }

        .content-comment {
            background-color: orange;
            width: 100%;
        }
    </style>
</head>
<body>
    <?php require_once('./navbar.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 content-body">
                <header class="header-default">
                    <h1><?php echo($entryInfo['titulo']); ?></h1>
                </header>
                <div>
                    <?php foreach($elements as $element){
                        if($element['tipo'] == 'titulo'){
                            echo("<h2>" . $element['valor'] .  "</h2>");
                        }else{
                            echo("<p>" . $element['valor'] .  "</p>");
                        }//crear una funcion que maneje esto mejor
                        //agregar condicionales de imagen y otros elementos    
                    ?>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 content-info">
                <h2>Informacion Adicional</h2>
                <hr>
                <p>Fecha de creacion: <?php echo($entryInfo['fecha']); ?></p>
                <p>Nombre del autor: Cristian Checa</p>
            </div>
            <div class="content-comment">
                <h2>Comentarios</h2>
                <?php 
                    if($comments == false){
                ?>
                    <p>No hay comentarios todavia</p>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <?php
        include('./foot.php');
        include_once('../footer.php');
    ?>
</body>
</html>