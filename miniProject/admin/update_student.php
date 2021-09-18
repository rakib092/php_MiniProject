


<h1 class="text-primary"><i class="fas fa-edit "> </i> Update Student <small>Update Student</small></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"> <a href="index.php?page=dashboard"><i class="far fa-tachometer"></i> DahsBoard</a></li>
                            <li class="breadcrumb-item active"> <a href="index.php?page=all-student"><i class="fa fa-user-plus"></i> All student</a></li>
                            <li class="breadcrumb-item active"><i class="fas fa-edit "> </i> Update Student</li>
                        </ol>
                    </nav>




                    
<?php
 $id=base64_decode($_GET["id"]);
 $db_data=mysqli_query($conn,"SELECT * FROM `student_info` WHERE `id`='$id'");
 $db_row=mysqli_fetch_assoc($db_data);





                    
 if(isset($_POST['update_student'])){
     $name=$_POST['name'];
     $roll=$_POST['roll'];
     $city=$_POST['city'];
     $contact=$_POST['contact'];
     $class=$_POST['class'];
     


     

     $query="UPDATE `student_info` SET `name`='$name',`roll`='$roll',`class`='$class',`city`='$city',`contact`='$contact' WHERE `id`='$id'";
     $result=mysqli_query($conn,$query);
     if($result){
         header("location:index.php?page=all-student");
     }

    
     
 }


?>

   


<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
           <div class="form-group">
               <label for="name">Student Name</label>
               <input type="text" name="name" id="name" placeholder="Student Name" class="form-control" required value="<?= $db_row['name']; ?>">
           </div>

           <div class="form-group">
               <label for="roll">Student Roll</label>
               <input type="text" name="roll" id="roll" placeholder="Student Roll" class="form-control" required value="<?= $db_row['roll']; ?>">
           </div>


           <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" id="city" placeholder="City Name" class="form-control" required value="<?= $db_row['city']; ?>">
           </div>

           <div class="form-group">
               <label for="contact">Contact</label>
               <input type="text" name="contact" id="contact" placeholder="01******" class="form-control" required value="<?= $db_row['contact']; ?>">
           </div>

           <div class="form-group">
               <label for="name">Class</label>
               <select name="class" id="class" class="form-control" required >
                   <option  value="">Select</option>
                   
                   <option <?php echo $db_row['class']=='1st'?'selected=""':'';?> value="1st">1st</option>
                   <option <?php echo $db_row['class']=='2nd'?'selected=""':'';?> value="2nd">2nd</option>
                   <option <?php echo $db_row['class']=='3rd'?'selected=""':'';?> value="3rd">3rd</option>
                   <option <?php echo $db_row['class']=='5th'?'selected=""':'';?> value="4th">4th</option>
                   <option <?php echo $db_row['class']=='5th'?'selected=""':'';?> value="5th">5th</option>
                 
               </select>
               
           </div>

          

           <div class="form-group">
              <input type="submit" value="update_student" name="update_student" class="btn btn-primary float-right">
               
           </div>
           

           
        </form>
    </div>
</div>