<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog C</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/logo.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
require_once "Header.php";
require_once "Conexion.php";
?>

<body>
    <div class="container mt-4 ">

        <?php
        require_once 'Conexion.php';
        $sql = "SELECT * FROM  noticias order by id desc";
        $res = mysqli_query($conexion, $sql);
       
        while ($noticias = mysqli_fetch_array($res)) {
            $query = "SELECT count(*) as total from comentar where id_noticia ='$noticias[id]' ";

            if ($result = mysqli_query($conexion, $query)) {
    
                $data = mysqli_fetch_assoc($result);
    
               
            }
        ?>
            <section class="dark-grey-text">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-xl-4">
                        <div class="view overlay rounded z-depth-1-half mb-lg-0 mb-4">
                            <img class="img-fluid" src="<?php echo $noticias['foto']; ?>" alt="imagen">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-xl-8">
                        <form action="Noticias.php" method="post">
                            <h4 class="font-weight-bold mb-3"><strong><?php echo $noticias['titulo']; ?></strong></h4>
                            <input style="display: none" name="nota" value="<?php echo $noticias['id']; ?>">
                            <p class="dark-grey-text"><?php echo $noticias['detalle']; ?></p>
                            <p>por <a class="font-weight-bold"><?php echo $noticias['autor']; ?></a>,
                                <?php echo $noticias['fecha']; ?> , <?php echo $noticias['hora']; ?></p>
                                <p  > <a class="font-weight-bold " ><samp  class="badge badge-primary badge-pill"><?php echo $data['total']; ?></samp> comentarios</a></p>
                            <input href="Noticias.php" type="submit" value="Ver más" class="btn blue-gradient btn-md mx-0 btn-rounded">
                        </form>
                    </div>
                </div>
                <hr class="my-4">
            </section>
        <?php } ?>
    </div>
</body>


<?php include_once "Footer.php" ?>

<script type="text/javascript " src="js/jquery.min.js "></script>
<script type="text/javascript " src="js/popper.min.js "></script>
<script type="text/javascript " src="js/bootstrap.min.js "></script>
<script type="text/javascript " src="js/mdb.min.js "></script>
</body>

</html>