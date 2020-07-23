
<!DOCTYPE html>
<html lang="en">
<?php  session_start(); if(! isset($_SESSION['loggedInId'])){ header('Location: index.php');}?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Blank</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


    <!-- Custom fonts for this template-->
    <link href="../static/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../static/css/sb-admin-2.min.css" rel="stylesheet">
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

            <?php include('navbar.php');?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Users</h1>


                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6  style="display: inline;" class="m-0 font-weight-bold text-primary">User Type: &nbsp; <a href="#" class="btn btn-light btn-sm">Admin</a> <a href="#" class="btn btn-secondary btn-sm">Moderator</a> </h6>     <button data-toggle="modal" data-target="#addUser" class="btn btn-circle btn-dark btn-sm" style="margin-left: 70%;"><i  class="fas fa-user-plus"></i></button>
                     </div>
                    <div class="card-body">
                        <?php if(isset($_GET['userCreated'])){ echo("<div class='alert alert-success'>New User Created</div>"); } ?>
                        <?php if(isset($_GET['userUpdated'])){ echo("<div class='alert alert-warning'> User Updated</div>"); } ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                    <?php
                                        require_once ('../models/User.php');
                                        $users = User::getUsers();
                                        foreach ($users as $user)
                                    {
                                        ?>
                                        <tr <?php if($user->getLevel() == "M"){ echo("class='bg-secondary text-white'");}?>  >
                                            <td id="nameCellFor<?php echo($user->getId());?>"><?php echo($user->getName()) ?></td>
                                            <td id="emailCellFor<?php echo($user->getId());?>"><?php echo($user->getEmail()) ?></td>
                                            <td id="usernameCellFor<?php echo($user->getId());?>"><?php echo($user->getUsername()) ?></td>
                                            <td id="passwordCellFor<?php echo($user->getId());?>"><?php echo($user->getPassword()) ?></td>
                                            <td><a href="../controllers/UserController.php?deleteUser=true&d_id=<?php echo($user->getId()) ?>" class="btn btn-sm btn-circle btn-danger"><i class="fas fa-trash"></i> </a> </td>
                                            <td><a data-toggle="modal" id="<?php echo($user->getId());?>"  class="btn btn-sm btn-circle btn-warning user-update-click text-white"><i class="fas fa-user-edit"></i> </a> </td>
                                            <span hidden="hidden" id="levelCellFor<?php echo($user->getId());?>"><?php echo($user->getLevel()); ?></span>

                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
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
                    <span>Copyright &copy; Your Website 2020</span>
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
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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






<!-- Modal -->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="../controllers/UserController.php">

                <div class="modal-header bg-dark text-white">
                <h5 class="modal-title " id="exampleModalLabel">Add User</h5>
                <button type="button text-white" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
        <div class="modal-body">

                <input type="text" class="form-control mb-2" placeholder="Full Name" name="d_name"/>
                <input type="text" class="form-control mb-2" placeholder="Email" name="d_email"/>
                <input type="text" class="form-control mb-2" placeholder="Username" name="d_username"/>
                <input type="password" class="form-control mb-2" placeholder="Password" name="d_password"/>
                <select class="form-control mb-2" name="d_level">
                    <option value="A">Admin</option>
                    <option value="M">Moderator</option>
                </select>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-dark">Add User</button>
        </div>
            </form>
        </div>
    </div>
</div>




<!-- Update Modal -->


<div class="modal fade" id="updateUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="../controllers/UserController.php">

                <div class="modal-header bg-dark text-white">
                    <h5 class="modal-title " id="exampleModalLabel">Update User</h5>
                    <button type="button text-white" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" id="updateId" name="d_id_u" value=""/>
                    <input type="text" class="form-control mb-2" id="updateName" placeholder="Full Name" name="d_name_u"/>
                    <input type="text" class="form-control mb-2" id="updateEmail" placeholder="Email" name="d_email_u"/>
                    <input type="text" class="form-control mb-2" id="updateUsername" placeholder="Username" name="d_username_u"/>
                    <input type="password" class="form-control mb-2" id="updatePassword" placeholder="Password" name="d_password_u"/>
                    <select class="form-control mb-2" name="d_level_u" id="updateLevel">
                        <option value="A">Admin</option>
                        <option value="M">Moderator</option>
                    </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-dark">Update User</button>
                </div>
            </form>
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

<script src="../static/js/demo/datatables-demo.js"></script>



<script>

    //Script for opening Update Modal

    $(document).ready(function(){
        $(".user-update-click").click(function() {

            let id = $(this).attr("id");
            let name = $("#nameCellFor"+id).text();
            let email = $("#emailCellFor"+id).text();
            let username = $("#usernameCellFor"+id).text();
            let password = $("#passwordCellFor"+id).text();
            let level = $("#levelCellFor"+id).text();


            console.log(email);

            $("#updateEmail").val(email);
            $("#updateLevel").val(level);
            $("#updateName").val(name);
            $("#updatePassword").val(password);
            $("#updateUsername").val(username);
            $("#updateId").val(id);

            $("#updateUser").modal('show');


        });
    });

</script>


</body>

</html>
