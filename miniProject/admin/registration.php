<?php

require_once './db.php';
session_start();
 
  if(isset($_POST['registration'])){
      $name=$_POST['name'];
      $email=$_POST['email'];
      $username=$_POST['username'];
      $password=$_POST['password'];
      $c_password=$_POST['c_password'];

    

      $photo=explode('.',$_FILES['photo']['name']);
      $photo=end($photo);
      $photo_name=$username.'.'.$photo;

      $input_error=array();

       if(empty($name)){
           $input_error['name']="The Name Field is Required";
       }

       if(empty($email)){
        $input_error['email']="The Email Field is Required";
       }
       if(empty($username)){
        $input_error['username']="The UserName Field is Required";
       }
       if(empty($password)){
        $input_error['password']="The password Field is Required";
       }
       if(empty($c_password)){
        $input_error['c_password']="The Conform password Field is Required";
       }
    

       if(count($input_error)==0){
           $email_check=mysqli_query($conn,"SELECT * FROM `user` WHERE `email`='$email';");
            if(mysqli_num_rows($email_check)==0){
                $username_check=mysqli_query($conn,"SELECT * FROM `user` WHERE `username`='$username';");
                if(mysqli_num_rows($username_check)==0){
                   if(strlen($username)>7){
                       if(strlen($password)>7){
                          if($password==$c_password){
                              $password=md5($password);
                              $sql="INSERT INTO `user`(`name`, `email`, `username`, `password`, `photo`, `status`) VALUES ('$name','$email','$username','$password','$photo_name','inactive')";
                              $result=mysqli_query($conn,$sql);

                              if($result){
                                  $_SESSION['Data insert Success']="Data insert Success";
                                   move_uploaded_file($_FILES['photo']['tmp_name'],'image/'.$photo_name);
                                   header('location: registration.php');
                                }else{
                                $_SESSION['Data insert Error']="Data insert Error";
                              }
                         }else{
                              $pass_mass="Password is not Match";
                          }
                       }else{
                        $pass_len="Password more then 8 character";
                       }
                   }else{
                       $username_len="UserName more then 8 character";
                   }
                }else{
                    $username_error="This userName Already Exits";
                }
            }else{
                $email_error="This Email Already Exits";
            }
       }

   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container pt-5">
        <h1 class="text-center">User Registration Form</h1>
        <?php if(isset($_SESSION['Data insert Success'])){echo '<div class="alert alert-success">'.$_SESSION['Data insert Success'].'</div>';}?>
        <?php if(isset($_SESSION['Data insert Error'])){echo '<div class="alert alert-warning">'.$_SESSION['Data insert Error'].'</div>';}?>
        <hr>
        <div class="row justify-content-center d-flex pt-3">
                <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                       <div class="row">
                           <div class="col-md-3">
                              <label for="name">Name</label>
                           </div>
                           <div class="col-md-9">
                              <input type="text" name="name" placeholder="Enter your Name" class="form-control" id="name" value="<?php if(isset($name)){echo $name;}?>">
                              <span class="error">
                                <?php if(isset($input_error['name'])){
                                        echo $input_error['name'];
                                  }?>
                             </span>
                            </div>
                        </div>

                </div>

                <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                              <label for="email">Email</label>
                           </div>
                           <div class="col-md-9">
                              <input type="text" name="email" placeholder="Enter your email" class="form-control" id="email" value="<?php if(isset($email)){echo $email;}?>">
                              <span class="error">
                                 <?php if(isset($input_error['email'])){
                                        echo $input_error['email'];
                                  }?>
                              </span>
                              <span class="error">
                                 <?php if(isset($email_error)){
                                        echo $email_error;
                                  }?>
                              </span>
                            </div>
                        </div>
                </div>
                <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                              <label for="username">Username</label>
                           </div>
                           <div class="col-md-9">
                              <input type="text" name="username" placeholder="Enter your UserName" class="form-control" id="username" value="<?php if(isset($username)){echo $username;}?>">
                              <span class="error">
                                 <?php if(isset($input_error['username'])){
                                        echo $input_error['username'];
                                  }?>
                              </span>

                              <span class="error">
                                 <?php if(isset($username_error)){
                                        echo $username_error;
                                  }?>
                              </span>

                              <span class="error">
                                 <?php if(isset($username_len)){
                                        echo $username_len;
                                  }?>
                              </span>
                            </div>
                        </div>
                </div>

                <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                              <label for="password">Password</label>
                           </div>
                           <div class="col-md-9">
                              <input type="password" name="password" placeholder="Enter your password" class="form-control" id="password" value="<?php if(isset($password)){echo $password;}?>">
                              <span class="error">
                                  <?php if(isset($input_error['password'])){
                                        echo $input_error['password'];
                                  }?>
                              </span>

                              <span class="error">
                                  <?php if(isset($pass_len)){
                                        echo $pass_len;
                                  }?>
                              </span>
                            </div>
                        </div>
                </div>

                <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                              <label for="c_password">Conform Password</label>
                           </div>
                           <div class="col-md-9">
                              <input type="password" name="c_password" placeholder="Enter your c_password" class="form-control" id="c_password" value="<?php if(isset($c_password)){echo $c_password;}?>">
                             <span class="error">
                                  <?php if(isset($input_error['c_password'])){
                                        echo $input_error['c_password'];
                                  }?>
                              </span>

                              <span class="error">
                                  <?php if(isset($pass_mass)){
                                        echo $pass_mass;
                                  }?>
                              </span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                           <div class="col-md-3">
                              <label for="photo">Photo</label>
                           </div>
                           <div class="col-md-9">
                              <input type="file" name="photo" id="photo">
                           </div>
                        </div>
                    </div>

                    <div class="form-group float-right">
                       <input type="submit" value="Registration" name="registration" class="btn btn-info">
                   </div>
                </form>
            </div>
           <br>
           <p>if you have an account? then please <a href="login.php">Login</a> </p>
            <hr>

            <footer>
                CopyRight &copy; All Right Reserved
            </footer>
        </div>
       
       
   
  


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>