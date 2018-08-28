<?php
session_start();

if (empty($_SESSION["DataUser"]["IdPermiso"])){
    header("Location: login.php");
}

$_SESSION["user"]=$_SESSION["DataUser"]["IdPermiso"];
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

                </div>
                <!-- end row -->

                <!-- start content row -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box">
                            <div class="clearfix"></div>
                            <img src="assets/images/LogoMomentaneo.jpg" width="100%" height="auto">
                        </div>
                    </div>
                </div>
                <!-- end content row -->

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer text-right">
            2018 Sofware ADSI Visitor
        </footer>

    </div>




</div>
<!-- END wrapper -->

<?php include ("Includes/scripts.php")?>

</body>
</html>
