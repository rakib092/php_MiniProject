<?php
 
require_once './db.php';
session_start();

if(isset($_SESSION['user_login'])){
    header("location:index.php");
}

if(isset($_POST['login'])){

    $username=$_POST['username'];
    $password=$_POST['password'];
    

    $query="SELECT * FROM `user` WHERE `username`='$username'";
    $username_cheek=mysqli_query($conn,$query);
    if(mysqli_num_rows($username_cheek)>0){
       $row=mysqli_fetch_assoc($username_cheek);
        if($row['password']==md5($password)){
           if($row['status']=='active'){
               $_SESSION['user_login']=$username;
               header("location: index.php");
           }else{
               $status_inactive="Please status is active";
           }
        }else{
            $wrong_pass="Password is wrong";
        }
    }else{
        $user_not_found="User name is not Found";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="admin/style.css">
</head>
<body>
    <div class="container pt-5 animated shake">
        <h1 class="text-center">Student Management System</h1>

        <div class="row justify-content-center d-flex pt-3">
            <div class="col-sm-4">
                <h2 class="text-center pb-2">Admin login Form</h2>
               <form action="" method="POST">
                    <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                              <label for="username">User Name : </label>
                           </div>
                           <div class="col-md-8">
                              <input type="text" id="username" name="username" placeholder="Username" class="form-control" require="" value="<?php if(isset($username)){echo $username;}?>">
                            </div>
                       </div>
                    </div>

                   <div class="form-group">
                       <div class="row">
                           <div class="col-md-4">
                              <label for="password">Password : </label>
                           </div>
                           <div class="col-md-8">
                             <input type="password" id="password" name="password" placeholder="password" class="form-control" require="" value="<?php if(isset($password)){echo $password;}?>">
                           </div>
                       </div>
                    </div>

                   <div class="form-group float-right">
                       <input type="submit" value="login" name="login" class="btn btn-info">
                   </div>
                  
               </form>
                        
            </div>
        </div>
                        <div class="d-flex justify-content-center"> <?php if(isset($user_not_found)){
                                echo '<div class="alert alert-danger col-sm-3 d-flex justify-content-center ">'.$user_not_found.' </div>';
                                
                         }?></div>
                          <div class="d-flex justify-content-center"> <?php if(isset($wrong_pass)){
                                echo '<div class="alert alert-danger col-sm-3 d-flex justify-content-center ">'.$wrong_pass.' </div>';
                                
                         }?></div>
                         <div class="d-flex justify-content-center"> <?php if(isset($status_inactive)){
                                echo '<div class="alert alert-danger col-sm-3 d-flex justify-content-center ">'.$status_inactive.' </div>';
                                
                         }?></div>
    </div>
  


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>