<?php
                require_once "Conexion.php";
                //print_r($_POST);
                if (
                    isset($_POST['pass'])
                ) {

                    $pass = $_POST['pass'];
                    if(empty($pass)){
                        header("location: About.php"); exit;
                    }
                    $consulta = mysqli_query($conexion, "select * from login where pass='$pass'");
                    if($row = mysqli_fetch_array($consulta)){
                        session_start();
                        $_SESSION['pass'] = $pass;
                        header("location: Crud_Post.php");
                    } else {
                        header("location: About.php");exit;
                    }
/*
                    $consulta = mysqli_query($conexion, "select * from login where pass='$pass'");
                    if (!$consulta) {
                        header("location: Crud_Post.php");
                        echo mysqli_error($conexion);
                    }
                    if ($pass = mysqli_fetch_assoc($consulta)) {
                        header("location: Crud_Post.php");
                    } else {
                        header("location: About.php");
                    }
                    */
                }
?>