<?php

require "../../../Modelo/Interno.php";


session_start();
if (empty($_SESSION["DataUser"]["IdFuncionario"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdFuncionario"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
    header('Location: Index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Administrar Cursos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Controlador Necesario -->
    <?php require "../../../Controlador/ControlInternos.php" ?>

    <!-- Imports -->

    <?php include ("Includes/imports.php")?>

</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include ("Includes/topBar.php")?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("Includes/leftSideBar.php")?>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <!-- start row -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Administración</a></li>
                                <li class="breadcrumb-item active">Internos</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <h4 class="text-center text-custom">LISTA DE INTERNOS</h4>
                            <?php
                    $IdRegistro = $_GET["IdRegistro"];
                    $_SESSION["IdRegistro"] = $IdRegistro;
                    ?>

                            

                            <div class="panel-body">
                                <table class="table table-hover m-0 table-colored-bordered table-bordered-inverse tickets-list table-actions-bar dt-responsive nowrap" cellspacing="0" width="100%" id="datatable">

                                    <div class="pad-btm form-inline">
                                        <div class="row">
                                            <div class="col-sm-6 text-xs-center">
                                                <div class="form-group">
                                                    <button onclick="location.href='RegistrarInternos.php'" id="Registrar" class="btn btn-success m-b-20"><i class="fa fa-plus m-r-5"></i>Añadir Registro</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <?php echo ControlInternos::adminTableVisitante(); ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2018 © Institución Educativa Técnica de Nazareth Nobsa
        </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php include ("Includes/scripts.php")?>

</body>
</html>
