<!DOCTYPE html>
<html lang="en">
<?php session_start(); if(! isset($_SESSION['loggedInId'])){ header('Location: index.php');}?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pages - Contact - Admin - Danish CMS</title>

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
                <h1 class="h3 mb-4 text-gray-800">Pages - Contact </h1>




                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#welcomeText" class="d-block card-header py-3" data-toggle="collapse" role="button"
                       aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">
                           Contact Information
                        </h6>

                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="welcomeText">
                        <div class="card-body">



                            <?php


                            if (isset($_GET['contactChanged'])) {
                                echo("<div class='alert alert-success'>Contact Information  changed successfully.</div>");
                            }
                            ?>
                            <form action="../controllers/ContactController.admin.php" METHOD="POST" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php
                                        require("../models/Config.php");
                                        $config = Config::object();
                                        ?>


                                        <input type="text" placeholder="Emails Comma Seperated" name="d_emails_cs" class="form-control mt-2"  value="<?php echo(implode(",", $config->getEmails()));?>"/>
                                        <small>Write comma seperated multiple emails</small>



                                        <input type="text" placeholder="Phone Numbers Comma Seperated" name="d_phonenumbers_cs" class="form-control mt-2" value="<?php echo(implode(",", $config->getPhoneNumbers()));?>"/>
                                        <small>Write comma seperated multiple phone numbers</small>


                                        <input type="text" placeholder="Complete Address. " name="d_address" class="form-control mt-2" value="<?php echo($config->getAddress());?>"/>
                                        <small>Please write the correct address to be shown on the map at front end. </small>


                                    </div>

                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" name="submit" class="btn btn-dark mt-5 btn-block" value="Change Contact Information "/>
                                    </div>
                                    <div class="col-md-4"></div>
                                </div>
                            </form>

                        </div>


                    </div>
                </div>











                <div class="card shadow mb-4">
                    <!-- Card Header - Accordion -->
                    <a href="#welcomeText" class="d-block card-header py-3" data-toggle="collapse" role="button"
                       aria-expanded="true" aria-controls="collapseCardExample">
                        <h6 class="m-0 font-weight-bold text-primary">
                            Social Media
                        </h6>

                    </a>
                    <!-- Card Content - Collapse -->
                    <div class="collapse show" id="welcomeText">
                        <div class="card-body">



                            <?php


                            if (isset($_GET['socialChanged'])) {
                                echo("<div class='alert alert-success'>Social Sites information changed successfully.</div>");
                            }
                            ?>
                            <form action="../controllers/ContactController.admin.php" METHOD="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php

                                        ?>

                                        <small>Facebook Link  <i class="text-warning"> eg. https://www.facebook.com/example</i></small>
                                        <input type="url" placeholder="Facebook Link" value="<?php echo($config->getFacebook());?>" name="d_facebook" class="form-control mb-2"/>

                                        <small>Instagram Link  <i class="text-warning"> eg. https://www.instagram.com/example</i></small>
                                        <input type="url" placeholder="Instagram Link" value="<?php echo($config->getInstagram());?>" name="d_instagram" class="form-control mb-2"/>

                                        <small>LinkedIn Link  <i class="text-warning"> eg. https://www.linkedin.com/in/example</i></small>
                                        <input type="url" placeholder="LinkedIn Link" value="<?php echo($config->getLinkedin());?>" name="d_linkedin" class="form-control mb-2"/>

                                        <small>Github Link  <i class="text-warning"> eg. https://www.github.com/example</i></small>
                                        <input type="url" placeholder="Github Link" value="<?php echo($config->getGithub());?>" name="d_github" class="form-control mb-2"/>


                                    </div>

                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="submit" name="submit" class="btn btn-dark mt-5 btn-block" value="Change Social Media Information "/>
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
