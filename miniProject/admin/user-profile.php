<h1 class="text-primary"><i class="fas fa-id-badge"></i> Profile <small>My Profile</small></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php?page=dashboard">DahsBoard</a></li>
                            <li class="breadcrumb-item active"><i class="fas fa-id-badge"></i> Profile</li>
                        </ol>
                    </nav>

                    <?php 
                       $session_user= $_SESSION['user_login'];

                       $user_data=mysqli_query($conn,"SELECT * FROM `user` WHERE `username`='$session_user'");

                      $user_row = mysqli_fetch_assoc($user_data);
                    ?>


<div class="row">
    <div class="col-sm-6">
       <table class="table table-bordered">
           <tr>
               <td>UserId</td>
               <td><?php echo $user_row['id'];?></td>
           </tr>
           <tr>
               <td>Name</td>
               <td><?php echo ucwords($user_row['name']);?></td>
           </tr>
           <tr>
               <td>UserName</td>
               <td><?php echo $user_row['username'];?></td>
           </tr>
           <tr>
               <td>Email</td>
               <td><?php echo $user_row['email'];?></td>
           </tr>
           <tr>
               <td>Status</td>
               <td><?php echo ucwords($user_row['status']);?></td>
           </tr>
           <tr>
               <td>SignUpDate</td>
               <td><?php echo $user_row['datetime'];?></td>
           </tr>
       </table>
       <a href="" class="btn btn-info float-right">Edit Profile</a>
    </div>
    <div class="col-sm-6">
        <a href=""><img class="img-thumbnail" src="image/<?= $user_row['photo'];?>" alt=""></a>
        

        <?php 
        
           if(isset($_POST['upload'])){
            $photo=explode('.',$_FILES['profile']['name']);
            $photo=end($photo);
            $photo_name=$session_user.'.'.$photo;
            

              $upload= mysqli_query($conn,"UPDATE `user` SET `photo`='$photo_name' WHERE `username`='$session_user'");
              if($upload){
                move_uploaded_file($_FILES['profile']['tmp_name'],'image/'.$photo_name);
              }
           }
        ?>


        <form action="" class="mt-2" enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="profile">Profile Picture</label>
                <input type="file" name="profile" id="profile" required>
                
            </div>

            <div class="form-group">
              <input type="submit" value="submit" name="upload" id="upload" class="btn btn-info ">
            </div>
        </form>
    </div>
</div>