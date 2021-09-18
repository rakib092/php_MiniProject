

<h1 class="text-primary"><i class="fa fa-users"></i> All Student <small> All Student</small></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"> <a href="index.php?page=dashboard">DahsBoard</a></li> 
                            <li class="breadcrumb-item active"><i class="fa fa-user-plus"></i>All Student</li>
                        </ol>
                    </nav>


<div class="table-responsive">
                     <table id="data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>Class</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                               $query="SELECT * FROM `student_info`";
                               $result=mysqli_query($conn,$query);

                               while($row=mysqli_fetch_assoc($result)){?>
                             
                             <tr>
                                 <td><?php echo $row['id']; ?></td>
                                 <td><?php echo ucwords($row['name']);?></td>
                                 <td><?php echo $row['roll']; ?></td>
                                 <td><?php echo $row['class']; ?></td>
                                 <td><?php echo ucwords($row['city']); ?></td>
                                 <td><?php echo $row['contact']; ?></td>
                                 <td><img style="width: 100px;" src="student_img/<?php echo $row['photo']; ?>" alt=""></td>
                                 <td>
                                     <a class="btn btn-warning" href="index.php?page=update_student&id=<?php echo base64_encode($row['id']); ?>"> <i class="fas fa-edit text-white"></i> Edit</a>
                                      &nbsp;&nbsp;&nbsp;&nbsp;
                                     <a class="btn btn-danger" href="delete_stu.php?id=<?php echo base64_encode($row['id']); ?>"> <i class="fas fa-trash-alt"></i> Delete</a>
                                 </td>
                                </tr>
                             <?php
                                  
                                }
                             ?>
                        </tbody>
                    </table>
                     </div>