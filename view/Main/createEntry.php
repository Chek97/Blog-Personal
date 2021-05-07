<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once('../header.php'); ?>
    <title>Crear Entrada</title>
</head>
<body>
    <?php 
        require_once('./navbar.php');
        include('../../controller/Entry/mainController.php');
        $obj = new EntryActions();

        $entry = $obj->getEntry(1);
    ?>
    <header>
        <h1>EDITAR ENTRADA</h1>
    </header>
    <div class="container">
        <form action="">
            <div class="form-group">
              <label for="title">Titulo:</label>
              <input type="text" name="title" id="title" class="form-control" value="<?php echo($entry['titulo']); ?>">
              <small id="helpId" class="text-muted">Nombre de la entrada</small>
              <!-- Crear interfaz para agregar elementos a la entrada -->
            </div>
        </form>
    </div>
</body>
</html>