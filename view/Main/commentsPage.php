<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../header.php'); ?>
    <title>Comentarios</title>
</head>

<body>
    <?php require_once('./navbar.php'); ?>
    <div class="container" style="height: 500px;">
        <header class="header-default">
            <h1>COMENTARIOS</h1>
        </header>
        <div class="alert alert-message m-5 pt-5 pb-5" role="alert">
            <strong>No hay comentarios todavia</strong>
        </div>
    </div>
    <?php
    include('./foot.php');
    require_once('../footer.php');
    ?>
</body>

</html>