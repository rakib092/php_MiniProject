<h1 class="text-primary"><i class="fa fa-user"></i> Add Student <small>Add New Student</small></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"> <a href="index.php?page=dashboard">DahsBoard</a></li>
                            <li class="breadcrumb-item active"><i class="fa fa-user-plus"></i> Add Student</li>
                        </ol>
                    </nav>



                    <?php    
                    
                     if(isset($_POST['add-student'])){
                         $name=$_POST['name'];
                         $roll=$_POST['roll'];
                         $city=$_POST['city'];
                         $contact=$_POST['contact'];
                         $class=$_POST['class'];
                         


                         $photo=explode('.',$_FILES['photo']['name']);
                         $photo=end($photo);
                         $photo_name=$roll.'.'.$photo;
                         

                         $query="INSERT INTO `student_info`( `name`, `roll`, `class`, `city`, `contact`, `photo`) VALUES ('$name','$roll','$class','$city','$contact','$photo_name')";
                         $result=mysqli_query($conn,$query);

                         if($result){
                             $success="Data insert Success";
                             move_uploaded_file($_FILES['photo']['tmp_name'],'student_img/'.$photo_name);
                         }else{
                             $error="Data Not Inserted";
                         }
                         
                     }
                    
                    
                    ?>

 <div class="row">
     <div class="col-sm-6">
        <?php if(isset($success)){echo '<p class="alert alert-success">'.$success.'</p>';}?>
      
        <?php if(isset($error)){echo '<p class="alert alert-danger">'.$error.'</p>';}?>
     </div>
 </div>

<div class="row">
    <div class="col-sm-6">
        <form action="" method="POST" enctype="multipart/form-data">
           <div class="form-group">
               <label for="name">Student Name</label>
               <input type="text" name="name" id="name" placeholder="Student Name" class="form-control" required>
           </div>

           <div class="form-group">
               <label for="roll">Student Roll</label>
               <input type="text" name="roll" id="roll" placeholder="Student Roll" class="form-control" required>
           </div>


           <div class="form-group">
               <label for="city">City</label>
               <input type="text" name="city" id="city" placeholder="City Name" class="form-control" required>
           </div>

           <div class="form-group">
               <label for="contact">Contact</label>
               <input type="text" name="contact" id="contact" placeholder="01******" class="form-control" required>
           </div>

           <div class="form-group">
               <label for="name">Class</label>
               <select name="class" id="class" class="form-control" required>
                   <option value="">select</option>
                   <option value="1st">1st</option>
                   <option value="2nd">2nd</option>
                   <option value="3rd">3rd</option>
                   <option value="4th">4th</option>
                   <option value="5th">5th</option>
               </select>
               
           </div>

           <div class="form-group">
               <label for="photo">Photo</label>
               <input type="file" name="photo" id="photo" required>
               
           </div>

           <div class="form-group">
              <input type="submit" value="Add_student" name="add-student" class="btn btn-primary float-right">
               
           </div>
           

           
        </form>
    </div>
</div>