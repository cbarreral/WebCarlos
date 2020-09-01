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
<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container">


            <a class="navbar-brand waves-effect" href="Index.php">
                <img src="img/logo.png" alt="Logo">
            </a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarSupportedContent">


                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <div class="text-center">
                            <a href="salir.php" class="btn red-gradient btn-sm ml-0">Salir <i class="far fa-paper-plane ml-2"></i></a>
                        </div>
                    </li>

                </ul>


                <ul class=" navbar-nav nav-flex-icons ">
                    <li class="nav-item ">
                        <a href="https://www.facebook.com/carlosalberto.barreralugo " class="nav-link waves-effect " target="_blank ">
                            <i class="fab fa-facebook-f "></i>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="https://api.whatsapp.com/api/send?phone=7721049800 " class="nav-link waves-effect " target="_blank " rel="noopener ">
                            <i class="fab fa-whatsapp "></i>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="https://github.com/cbarreral?tab=repositories " class="nav-link waves-effect " target="_blank ">
                            <i class="fab fa-github "></i>
                        </a>
                    </li>

                </ul>

            </div>

        </div>
    </nav>


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
</header>

<?php

require_once "Conexion.php";
session_start();
if (isset($_SESSION['pass'])) {
    echo "";
} else {
    header("Location: About.php");
    exit();
}

?>

<body>


    <hr class="my-4">
    <form action="CRUD.php" method="post" class="container">
        <input type="text" name="id" id="id" placeholder="(id) a ELIMINAR/EDITAR">
        <input type="text" name="titulo" id="titulo" placeholder="Titulo">
        <input type="text" name="detalle" id="detalle" placeholder="Detalle">
        <input type="text" name="autor" id="autor" placeholder="Autor">
        <input type="text" name="foto" id="foto" placeholder="url foto"><br><br>
        <textarea type="text" name="descripcion" class="form-control" rows="2" id="descripcion" placeholder="Descripcion completa"></textarea>
        <input type="submit" name="bnt" class="btn blue-gradient btn-md mx-0 btn-rounded" value="Insertar">
        <input type="submit" name="bnt" class="btn peach-gradient btn-md mx-0 btn-rounded" value="Eliminar">
        <input type="submit" name="bnt" class="btn aqua-gradient btn-md mx-0 btn-rounded" value="Editar">

    </form>

    <hr class="my-4">
<div class="container">
<a href="Crud_Post.php" type="button"class="btn purple-gradient btn-md mx-0 btn-rounded" >Actualizar tabla</a>
<div class="table-wrapper-scroll-y my-custom-scrollbar">

<table class="table table-striped table-bordered table-sm" cellspacing="0"
  width="100%">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Titulo</th>
      <th scope="col">Detalle</th>
      <th scope="col">Autor</th>
      <th scope="col">Fecha</th>
      <th scope="col">Hora</th>
      <th scope="col">Descripcion</th>
    </tr>
  </thead>
  <tbody> <?php
        require_once 'Conexion.php';
        $sql = "SELECT * FROM  noticias order by id desc";
        $res = mysqli_query($conexion, $sql);
       
        while ($noticias = mysqli_fetch_array($res)) {
            $query = "SELECT count(*) as total from comentar where id_noticia ='$noticias[id]' ";

            if ($result = mysqli_query($conexion, $query)) {
    
                $data = mysqli_fetch_assoc($result);
    
               
            }
        ?>
    <tr>
    <th ><?php echo $noticias['id']; ?></th>
      <th ><?php echo $noticias['titulo']; ?></th>
      <th ><?php echo $noticias['detalle']; ?></th>
      <th ><?php echo $noticias['autor']; ?></th>
      <th ><?php echo $noticias['fecha']; ?></th>
      <th ><?php echo $noticias['hora']; ?></th>
      <th ><?php echo $noticias['detalleLargo']; ?></th>
    </tr>
        <?php }?>
  </tbody>
</table>

</div>
</div><br><hr><br>
    <div id="todolist">
        <?php /*
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
                echo "Ya existe el registro que intenta registrar";
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
                    } else {
                        echo "error al insertar";
                    }
                }
            }


            $conexion->close();
        }*/
        ?>
    </div>
</body>

<?php include_once "Footer.php" ?>
<script type="text/javascript " src="js/jquery.min.js "></script>
<script type="text/javascript " src="js/popper.min.js "></script>
<script type="text/javascript " src="js/bootstrap.min.js "></script>
<script type="text/javascript " src="js/mdb.min.js "></script>
</body>

</html>