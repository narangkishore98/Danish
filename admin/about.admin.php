<!DOCTYPE html>
<html lang="en">
<?php session_start(); if(! isset($_SESSION['loggedInId'])){ header('Location: index.php');}?>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pages - About - Admin - Danish CMS</title>

    <!-- Custom fonts for this template-->
    <link href="../static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../static/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">

    <?php include('sidebar.php');?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <?php  include('navbar.php');?>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Pages - About </h1>




                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#welcomeText" class="d-block card-header py-3" data-toggle="collapse" role="button"
                       aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">
                            About Text & Image
                        </h6>

                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="welcomeText">
                        <div class="card-body">



                            <?php


                            if (isset($_GET['changed'])) {
                                echo("<div class='alert alert-success'>About Data changed successfully.</div>");
                            }
                            ?>
                            <form action="../controllers/AboutController.admin.php" METHOD="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        require("../models/Config.php");
                                        $config = Config::object();
                                        ?>
                                        <textarea class="form-control"
                                                  rows="10"
                                                  name="d_about_text"><?php echo $config->getAboutText(); ?></textarea>

                                        <div class="row mt-5">
                                            <div class="col-md-6" style="margin:0px auto;">
                                                <p>Current Image</p>
                                                <img src="../static/img/<?php echo($config->getAboutImage()); ?>" alt="about image" width="200px"/>
                                            </div>
                                            <div class="col-md-6">

                                                <p>Change Image: </p>
                                                <input type="file" name="d_about_image" class="form-control-file"/>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" name="submit" class="btn btn-dark mt-5 btn-block" value="Change About Text & Image"/>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>






            </div>


            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Danish CMS 2020</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../static/vendor/jquery/jquery.min.js"></script>
<script src="../static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../static/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../static/js/sb-admin-2.min.js"></script>

</body>

</html>
