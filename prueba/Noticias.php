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
?>

<body>

    <div class="container mt-4 ">

        <?php

        require_once 'Conexion.php';

        if (isset($_POST['nota'])) {
            $Noti = $_POST['nota'];
        }
        $Id_N = $Noti;

        $sql = "SELECT * FROM  noticias WHERE id = '$Id_N'";
        $res = mysqli_query($conexion, $sql);
        while ($noticias = mysqli_fetch_array($res)) {
            $query = "SELECT count(*) as total from comentar where id_noticia ='$noticias[id]' ";

            if ($result = mysqli_query($conexion, $query)) {

                $data = mysqli_fetch_assoc($result);
            }
        ?>


            <!--Section: Content-->
            <section class="text-center">

                <h4 class="font-weight-bold mb-3"><strong><?php echo $noticias['titulo']; ?></strong></h4>
                <!-- Featured image -->
                <img width=40% src="<?php echo $noticias["foto"]; ?>" class="img-fluid z-depth-1 rounded mb-4 imgMediana" alt="foto">

                <p class="mb-4">
                    <strong>
                        Posteado <?php echo $noticias["fecha"]; ?> by
                        <a href="About.php" class="indigo-text mx-2">
                            <img src="https://image.freepik.com/vector-gratis/perfil-hombre-dibujos-animados_18591-58482.jpg" class="rounded z-depth-1" style="width: 31px; height: 31px;">
                            <strong class="ml-1"><?php echo $noticias["autor"]; ?>, a las
                                <?php echo $noticias["hora"]; ?></strong>
                        </a>
                        <p class="dark-grey-text"><?php echo $noticias['detalleLargo']; ?></p>

                    </strong>
                </p>
                <hr><br>

            </section>

            <p> <a class="font-weight-bold "><samp><?php echo $data['total']; ?></samp> comentarios</a></p>

        <?php } ?>




        <?php
        //echo "$Id_N";
        $sql_2 = "SELECT * FROM  comentar WHERE id_noticia = '$Id_N'";
        $res2 = mysqli_query($conexion, $sql_2);
        while ($comentario = mysqli_fetch_array($res2)) {
        ?>


            <div class="media d-block d-md-flex mt-3">
                <img class="card-img-64 rounded z-depth-1 d-flex mx-auto mb-3" src="https://images.vexels.com/media/users/3/144066/isolated/lists/00c9f19169fbda083382d2d1bbaa5d37-burbuja-de-comentarios.png" alt="Generic placeholder image">
                <div class="media-body text-center text-md-left ml-md-3 ml-0">
                    <p class="font-weight-bold my-0">
                        <?php echo $comentario['nombre']; ?>, <?php echo $comentario['email'];
                                                                ?>
                        <a href="#" class="pull-right ml-1">
                            <i class="fas fa-reply"></i>
                        </a>
                    </p>
                    <?php echo $comentario['texto']; ?>
                    <h6><?php echo $comentario['fecha'];
                        ?></h6>
                </div>
            </div>
        <?php } ?>





        <div class="form-group mt-4">

            <form action="" method="post">
             
                <label for="quickReplyFormComment">Tu comentario</label>
                <?php
                $sql3 = "SELECT * FROM  noticias where id = '$Id_N'";
                $res3 = mysqli_query($conexion, $sql3);
                while ($noticias = mysqli_fetch_array($res3)) {
                ?>
                    <input style="display: none" name="nota" value="<?php echo $noticias['id']; ?>">
                <?php } ?>
                <div class="container">
                    <div class="row">
                        <div class="col-sm md-form ml-0 mr-0">
                            <input type="text" name="nombre"required type="text" id="Nom" class="form-control form-control-sm validate ml-0">
                            <label data-error="wrong" data-success="right" required for="Nom" class="ml-0">Nombre</label>
                        </div>
                        <div class="col-sm md-form ml-0 mr-0">
                            <input type="text" name="email" type="text" id="Ema" class="form-control form-control-sm validate ml-0">
                            <label data-error="wrong" data-success="right" for="Ema" class="ml-0" >Email</label>
                        </div>
                    </div>
                </div>

                <textarea name="cajas" class="form-control" id="cajas" rows="4"required></textarea>
                <div class="text-center my-4">
                    <button class="btn blue-gradient btn-sm" type="submit">Comentar!!</button>
                </div>
            </form>

        </div>
    </div>


    <div id="todolist">
        <?php
        if (
            isset($_POST['nota']) && isset($_POST['cajas']) && isset($_POST['nombre']) && isset($_POST['nombre'])
        ) {

            $noticia = $_POST['nota'];
            $Cja = $_POST['cajas'];
            $Nombre = $_POST['nombre'];
            $Email = $_POST['email'];
            $date = date('Y/m/d h:i:s', time());

            $sql1 = "select * from comentar where texto='$Cja' AND id_noticia = '$noticia' AND nombre ='$Nombre'";
            $result = mysqli_query($conexion, $sql1);
            if (mysqli_num_rows($result) > 0) {
                // Si es mayor a cero imprimimos que ya existe el usuario
                echo "Ya existe el registro que intenta registrar";
            } else {
                //print_r($_POST);
                $sql = "INSERT INTO comentar (texto,nombre,email,id_noticia,fecha) VALUES ('$Cja','$Nombre','$Email','$noticia','$date') ";
                if ($conexion->query($sql) == true) {
                    echo "Comentario publicado, refresca la paguina";
                } else {
                    echo "error al insertar";
                }
            }
            $conexion->close();
        }
        ?>
    </div>

    <?php include_once "Footer.php" ?>

    <script type="text/javascript " src="js/jquery.min.js "></script>
    <script type="text/javascript " src="js/popper.min.js "></script>
    <script type="text/javascript " src="js/bootstrap.min.js "></script>
    <script type="text/javascript " src="js/mdb.min.js "></script>
</body>

</html>