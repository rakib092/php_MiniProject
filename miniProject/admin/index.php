<?php
session_start();
require_once './db.php';
if (!isset($_SESSION['user_login'])) {
    header("location:login.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.min.css">
     
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SMS</a>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="logout.php"><i class="fa fa-user"></i> Welcome: Rakib Hasan</a>
                </li>
                <li>
                    <a class="nav-link" href="registration.php"><i class="fa fa-user-plus"></i> Add User</a>
                <li>
                    <a class="nav-link" href="index.php?page=user-profile"><i class="fa fa-user"></i> Profile</a>
                </li>
                <li>
                    <a class="nav-link" href="logout.php"><i class="fa fa-power-off"></i> Logout</a>
                </li>

            </ul>

        </div>
    </nav>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-sm-3">
                <div class="list-group">
                    <a href="index.php?page=dashboard" class="list-group-item list-group-item-action active"><i class="fa fa-dashboard"></i> DahsBoard</a>
                    <a href="index.php?page=add-student" class="list-group-item list-group-item-action"><i class="fa fa-user"></i> Add Student</a>
                    <a href="index.php?page=all-student" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Student</a>
                    <a href="index.php?page=all-users" class="list-group-item list-group-item-action"><i class="fa fa-users"></i> All Users</a>

                </div>
            </div>
            <div class="col-sm-9">
                <div class="content">
                   <?php 
                   if(isset($_GET['page'])){
                    $page = $_GET['page'].'.php';
                   }
                   else{
                       $page='dashboard.php';
                   }
                   
                    if(file_exists($page)){
                        require_once $page;
                    }else{
                        require_once '404.php';
                    }
                   
                   ?>
                </div>
            </div>
           

        </div>
    </div>

     <footer class="footer-area mt-2">
         <p class="text-white"> CopyRight &copy; 2021 Student Management System All Right Are Reserved</p>
     </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
       $(document).ready( function () {
          $('#data').DataTable();
        } );
     </script>
</body>

</html>