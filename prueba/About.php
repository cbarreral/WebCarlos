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
    <div class="container my-3 ">
        <div class="row ">
            <div class="col-md-8 col-lg-6 mx-auto ">


                <!-- Section: Block Content -->
                <section>

                    <!-- Card -->
                    <div class="card testimonial-card ">

                        <!-- Background color -->
                        <div class="card-up card-image " style="background-image: url(https://mdbootstrap.com/img/Photos/Horizontal/Work/4-col/img%20%286%29.jpg); ">
                            <div class="rgba-black-strong h-100 p-3 white-text ">
                                <p class="font-weight-normal mb-0 ">Carlos Alberto Barrera Lugo</p>
                                <p class="font-weight-normal mb-0 ">21 años</p>
                                <p class="small mb-0 ">Front-end Developer</p>
                            </div>
                        </div>

                        <!-- Avatar -->
                        <div class="avatar mx-auto white">
                            <img width="350px" src="https://image.freepik.com/vector-gratis/perfil-hombre-dibujos-animados_18591-58482.jpg" class="rounded-circle " alt="woman avatar ">
                        </div>

                        <!-- Content -->
                        <div class="card-body px-3 py-4 ">
                            <div class="row ">
                                <div class="col-sm-4 text-center ">
                                    <p class="font-weight-bold mb-0 ">4</p>
                                    <p class="small text-uppercase mb-0 ">Años de programador</p>
                                </div>
                                <div class="col-sm-4 text-center border-left border-right ">
                                    <p class="font-weight-bold mb-0 ">5</p>
                                    <p class="small text-uppercase mb-0 ">Lenguajes</p>
                                </div>
                                <div class="col-sm-4 text-center ">
                                    <p class="font-weight-bold mb-0 ">8</p>
                                    <p class="small text-uppercase mb-0 ">Proyectos</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <a href="" class="btn red-gradient btn-sm ml-0" data-toggle="modal" data-target="#modalLoginAvatar">Admin<i class="far fa-paper-plane ml-2"></i></a>
                        </div>

                    </div>
                    <!-- Card -->

                </section>
                <!-- Section: Block Content -->
            </div>
        </div>
    </div>
    <?php require_once "Modal.php"; ?>






    <?php include_once "Footer.php" ?>

    <script type="text/javascript " src="js/jquery.min.js "></script>
    <script type="text/javascript " src="js/popper.min.js "></script>
    <script type="text/javascript " src="js/bootstrap.min.js "></script>
    <script type="text/javascript " src="js/mdb.min.js "></script>
</body>

</html>