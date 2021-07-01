<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('../header.php'); ?>
    <title>Blog Personal</title>
</head>

<body>
    <?php require_once('../Main/navbar.php'); ?>
    <header class="text-center header-default">
        <h1>SOBRE MI</h1>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="img-about-custom ">
                    <img src="../../public/img/blogger.png" alt="">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-6">
                <div class="about-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusamus quas laboriosam aspernatur? Ad consequatur doloremque
                        ipsa quidem maxime illo expedita nam sequi earum quibusdam est,
                        incidunt nulla assumenda libero rem!
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('../Main/foot.php');
    include_once('../footer.php');
    ?>
</body>

</html>