<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container pt-5">
         <a href="admin/login.php" class="btn btn-primary float-right">login</a>
         <h1 class="text-center pt-5">WelCome to Student Management System</h1> 

         <div class="row justify-content-center d-flex pt-3">
             <div class="col-sm-4 ">
             <form action="" method="post">
           
           <table class="table table-strip border text-center">
               <tr>
                   <td colspan="2"><label for="">Student Information</label></td>
                   
               </tr>

               <tr>
                   <td><label for="choose">Choose class</label></td>
                   <td>
                       <select class="form-control" name="choose" id="choose">
                           <option value="">select</option>
                           <option value="1st">1st</option>
                           <option value="2nd">2nd</option>
                           <option value="3rd">3rd</option>
                           <option value="4th">4th</option>
                           <option value="5th">5th</option>
                       </select>
                   </td>
               </tr>

               <tr>
                   <td><label for="roll">Roll</label></td>
                   <td><input class="form-control" type="text" name="roll" pattern="[0-9]{6}" placeholder="Roll"></td>
               </tr>
               <tr>
                   <td colspan="2"><input type="submit" value="show_info" name="show_info"></td>
                   <td></td>
               </tr>
           </table>

         </form>
             </div>
         </div>

       
     
     <br/>

     <?php
     require_once './admin/db.php';
        if(isset($_POST['show_info'])){
            $choose=$_POST['choose'];
            $roll=$_POST['roll'];

           $result=mysqli_query($conn,"SELECT * FROM `student_info` WHERE `class`='$choose' AND `roll`='$roll'");
           if(mysqli_num_rows($result)==1){
                 $row=mysqli_fetch_assoc($result);
                 
                  ?>
                   <div class="row d-flex justify-content-center">
         <div class="col-sm-6">
               <table class="table table-bordered">
                   <tr>
                       <td rowspan="4"><img style="width: 150px;" src="admin/student_img/<?php echo $row['photo']; ?>" alt=""></td>
                       <td>Name</td>
                       <td><?php echo ucwords($row['name']); ?></td>
                   </tr>
                   <tr>
                       
                       <td>Roll</td>
                       <td><?php echo $row['roll']; ?></td>
                   </tr>
                   <tr>
                      
                       <td>Class</td>
                       <td><?php echo $row['class']; ?></td>
                   </tr>
                   <tr>
                       
                       <td>City</td>
                       <td><?php echo ucwords($row['city']); ?></td>
                   </tr>
                  
               </table>
         </div>
     </div>
                  <?php
           }else{
               ?>

            <script type="text/javascript">
              alert("data not found");
            </script>

               <?php
           }
       

       }
     
     ?>

     


    </div>
  


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>