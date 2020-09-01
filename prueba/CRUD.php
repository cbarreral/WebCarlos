<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Insertar Datos</title>
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
<div class="card card-intro colorRosa ">

        <div class="card-body white-text rgba-black-light text-center ">
            <div class="row d-flex justify-content-center ">
                <div class="col-md-6 ">
                    <p class="h5 mb-2 ">
                        Este es mi Blog
                    </p>
                    <p class="mb-0 ">Las nuevas formas de interactuar con las tecnologias</p>
                </div>
            </div>
        </div>
    </div>
    <body>
        
<div class="container my-5 py-5 z-depth-1">


    <!--Section: Content-->
    <section class="text-center px-md-5 mx-md-5 dark-grey-text">

        <h3 class="font-weight-bold">Acceso No autorizado</h3>

        <a href="Index.php" type="button"class="btn purple-gradient btn-md mx-0 btn-rounded" >OK</a>
    </section>
    <!--Section: Content-->


</div>

<?php include_once "Footer.php" ?>
<script type="text/javascript " src="js/jquery.min.js "></script>
<script type="text/javascript " src="js/popper.min.js "></script>
<script type="text/javascript " src="js/bootstrap.min.js "></script>
<script type="text/javascript " src="js/mdb.min.js "></script>
</body>

</html>
<?php
require_once "Conexion.php";

if (isset($_POST['bnt'])) {
    $bandera = $_POST['bnt'];


    if ($bandera == 'Eliminar') {
        if (
            isset($_POST['id'])
        ) {

            $id = $_POST['id'];
            $sql = "DELETE FROM noticias where id =('$id')";
            if ($conexion->query($sql) == true) {
                echo "OK";
                header("Location: Crud_Post.php");
            } else {
                echo "error al eliminar";
            }
        }


        $conexion->close();
    } else if ($bandera == 'Insertar') {
        if (
            isset($_POST['titulo']) && isset($_POST['detalle']) && isset($_POST['autor'])
            && isset($_POST['descripcion']) && isset($_POST['foto'])
        ) {

            $titulo = $_POST['titulo'];
            $detalle = $_POST['detalle'];
            $autor = $_POST['autor'];
            $descripcion = $_POST['descripcion'];
            $foto = $_POST['foto'];
            $fecha = date('Y/m/d');
            $hora = date("H:i:s", time() + 18000);
            echo $hora;
            if (mysqli_num_rows($result) > 0) {
                // Si es mayor a cero imprimimos que ya existe el usuario

                echo "<h1>Ya existe el registro que intenta registrar</h1>";
                header("Location: Crud_Post.php");
            } else {
                $sql1 = "select * from noticias where titulo='$titulo' or detalle='$detalle' or foto='$foto'";
                $result = mysqli_query($conexion, $sql1);
                if (mysqli_num_rows($result) > 0) {
                    // Si es mayor a cero imprimimos que ya existe el usuario
                    echo "Ya existe el registro que intenta registrar";
                } else {
                    //print_r($_POST);
                    $sql = "INSERT INTO noticias(titulo,detalle,autor,fecha,hora,detalleLargo,foto) VALUES('$titulo','$detalle','$autor','$fecha','$hora','$descripcion','$foto')";
                    if ($conexion->query($sql) == true) {
                        echo "OK";
                        header("Location: Crud_Post.php");
                    } else {
                        echo "error al insertar";
                    }
                }
            }
            $conexion->close();
        }
    } else if ($bandera == 'Editar') {
        if (
            isset($_POST['id']) && isset($_POST['titulo']) && isset($_POST['detalle']) && isset($_POST['autor'])
            && isset($_POST['descripcion']) && isset($_POST['foto'])
        ) {
            $idE = $_POST['id'];
            $tituloE = $_POST['titulo'];
            $detalleE = $_POST['detalle'];
            $autorE = $_POST['autor'];
            $descripcionE = $_POST['descripcion'];
            $fotoE = $_POST['foto'];
            $fechaE = date('Y/m/d');
            $horaE = date("H:i:s", time() + 18000);
            echo $hora;
            $sql = "UPDATE noticias SET titulo ='$tituloE',detalle ='$detalleE',autor ='$autorE',fecha ='$fechaE',hora ='$horaE',detalleLargo ='$descripcionE', foto ='$fotoE' WHERE id = '$idE'";
            if ($conexion->query($sql) == true) {
                echo "OK";
                header("Location: Crud_Post.php");
            } else {
                echo "error al insertar";
            }
        }
    } else {
        echo ("error");
    }
}
