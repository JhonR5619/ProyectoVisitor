<?php

session_start();
require "../../../Modelo/Visitante.php";


if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}
$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];

if($_SESSION["user"] != "1" && $_SESSION["user"] != "2" && $_SESSION["user"] != "3" && $_SESSION["user"] != "4"){
    header('Location: Index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Visitor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Scripts -->
    <?php include("Includes/imports.php") ?>

</head>


<body>

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <?php include("Includes/topBar.php") ?>
    <!-- Top Bar End -->

    <!-- ========== Left Sidebar Start ========== -->
    <?php include("Includes/leftSideBar.php") ?>
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
                            <h4 class="page-title float-left">Visitor</h4>

                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                                <li class="breadcrumb-item"><a href="#">Gestión de visitantes</a></li>
                                <li class="breadcrumb-item active">Actualizar visitantes</li>
                            </ol>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <!-- start content row -->

                <div class="row">

                    <?php if (!isset($_GET["IdVisitante"])){ ?>
                        <div class="alert alert-icon alert-danger alert-dismissible fade show">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="mdi mdi-block-helper"></i>
                            No se pudo actualizar al visitante.<strong> Error: no se encontro la informacion del visitante.</strong> Puede administrar los visitantes desde <a href="ListarVisitantes.php" class="alert-link">Aquí</a>.
                        </div>
                    <?php }else{
                    $IdVisitante = $_GET["IdVisitante"];
                    $_SESSION["IdVisitante"] = $IdVisitante;
                    $objVisitante = Visitante::buscarId($IdVisitante);
                    ?>



                    <div class="col-lg-10 center-page">

                        <div class="card-box">


                            <h4 class="text-center text-custom">ACTUALIZAR VISITANTES</h4>

                            <br>

                            <form role="form" method="post" action="../../../Controlador/ControlVisitantes.php?accion=Editar">
                                <div class="row ">
                                    <div class="col-xs-9 center-page" style="width: 83%">





                                            <input type="text" value="<?php echo $_SESSION["DataUser"]["IdFuncionario"]?>" name="IdRegistrador" id="IdRegistrador"
                                                   class="form-control"  hidden/>


                                        <div class="row">
                                            <div class="col-lg-6">

                                                <label for="Cedula">Cedula </label>

                                                <input type="text" value="<?php echo $objVisitante->getCedula(); ?>" name="Cedula" id="Cedula"
                                                       class="form-control"  required/>
                                            </div>
                                            <div class="col-lg-6">

                                                <label for="Nombre1">Nombre 1 </label>

                                                <input type="text" value="<?php echo $objVisitante->getNombre1(); ?>" name="Nombre1" id="Nombre1"
                                                       class="form-control"  required/>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Nombre2">Nombre2 </label>
                                                <input type="text" value="<?php echo $objVisitante->getNombre2(); ?>" name="Nombre2" id="Nombre2"
                                                       class="form-control"  />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido1">Apellido 1 </label>
                                                <input type="text" value="<?php echo $objVisitante->getApellido1(); ?>" name="Apellido1" id="Apellido1"
                                                       class="form-control" required />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Apellido2">Apellido 2 </label>
                                                <input type="text" value="<?php echo $objVisitante->getApellido2(); ?>" name="Apellido2" id="Apellido2"
                                                       class="form-control"  />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="UrlImagen">Url </label>
                                                <input type="text" value="<?php echo $objVisitante->getUrlImagen(); ?>" name="UrlImagen" id="UrlImagen"
                                                       class="form-control"  />
                                            </div>

                                            <div class="col-lg-6">


                                                <label>Permiso</label>
                                                <select class="form-control" id="TipoVisitante" required name="TipoVisitante">
                                                    <option <?php echo ($objVisitante->getTipoVisitante() == "Visitante Ocasional") ? "selected" : ""; ?> value="1">Visitante Ocasional</option>
                                                    <option <?php echo ($objVisitante->getTipoVisitante() == "Visitante Interno") ? "selected" : ""; ?> value="2">Visitante Interno</option>
                                                    <option <?php echo ($objVisitante->getTipoVisitante() == "Abogados") ? "selected" : ""; ?> value="3">Abogados</option>
                                                    </select>


                                            </div>

                                            <div class="col-lg-6">
                                                <label for="TarjetaProfesional">Tarjeta profesional</label>
                                                <input type="text" value="<?php echo $objVisitante->getTarjetaProfesional(); ?>" name="TarjetaProfesional" id="TarjetaProfesional"
                                                       class="form-control"  />
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="Observaciones">Observaciones</label>
                                                <input type="text" value="" name="Observaciones" id="Observaciones"
                                                       class="form-control"  />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" value="<?php echo date('Y/m/d H:i:s')?>" class="form-control" id="Fecha" name="Fecha"parsley-trigger="change" hidden >
                                            </div>
                                            <br><br>



                                        </div>


                                        <div class="form-group text-center">

                                            <button onclick=" location.href='ListarVisitantes.php'" type="reset" class="btn btn-gris font-15" style="border-radius: 5px">
                                                <strong>Cancelar</strong>
                                            </button>



                                            <button type="submit" class="btn btn-verde  font-15" value="validate"   style= "border-radius: 5px">
                                                <strong>Guardar</strong>
                                            </button>

                                        </div>

                                    </div>
                                </div>
                        </div>


                        </form>
                    </div> <!-- end card-box -->
                </div>
                <!-- end col -->

                <?php }?>

            </div>

        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer text-right">
        2018 Software ADSI Visitor
    </footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->


</div>
<!-- END wrapper -->

<?php include("Includes/scripts.php") ?>

</body>
</html>
