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
    include('../../controller/Element/elementController.php');
    $objEntry = new EntryActions();
    $objElement = new ElementActions();

    $entry = $objEntry->getEntry(1);
    $elements = $objElement->getElements($entry['id']);

    ?>
    <div class="container m-3">
        <header>
            <h1>EDITAR ENTRADA</h1>
        </header>
        <form action="../../controller/Element/elementController.php?q=update" method="POST"><!-- crear la actualizacion multiple -->
            <div class="form-group">
                <label for="title">Titulo:</label>
                <input type="hidden" name="id" id="title" class="form-control" value="<?php echo ($entry['id']); ?>">
                <input type="text" name="title" id="title" class="form-control" value="<?php echo ($entry['titulo']); ?>">
                <small id="helpId" class="text-muted">Nombre de la entrada</small>
            </div>
            <!-- Crear interfaz para agregar elementos a la entrada -->
            <!--
                AQUI VAN LOS ELEMENTOS QUE YA ESTAN ALMACENADOS EN LA BD
           -->
                <?php 
                    include_once('../Shared/entryElements.php');
                ?>
                <br>
                <button class="btn btn-success" type="submit">
                    Actualizar <i class="fa fa-upload" aria-hidden="true"></i>
                </button>
        </form>
        <form action="../../controller/Element/elementController.php?q=create" method="POST">
                <div class="form-group">
                    <input type="hidden" name="id" id="title" class="form-control" value="<?php echo ($entry['id']); ?>">
                    <label for="list">Agregar Elementos</label>
                    <select class="custom-select" name="list" id="list">
                        <option selected>Elige una opcion</option>
                        <option value="1">Encabezado</option>
                        <option value="2">Parrafo</option>
                        <option value="3">Imagen</option>
                        <option value="4">Video</option>
                    </select>
                </div>
                <div class="mt-2 text-center">
                    <button class="btn btn-primary btn-lg" type="submit">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                </div>
        </form>
    </div>
</body>

</html>