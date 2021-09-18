<h1 class="text-primary"><i class="fal fa-tachometer-alt-average"></i> DahsBoard <small>Statistics Overview</small></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active">DahsBoard</li>
                        </ol>
                    </nav>


                    <?php 
                       $count_stu=mysqli_query($conn,"SELECT * FROM `student_info`");
                       $total_stu=mysqli_num_rows($count_stu);

                       $count_user=mysqli_query($conn,"SELECT * FROM `user`");
                       $total_user=mysqli_num_rows($count_user);
                       
                    ?>

                    <div class="row">
                    <div class="col-sm-4">
                            <div class="card bg-primary">
                                <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-users fa-5x text-white"></i>
                                    </div>
                                    <div class="col-sm-9 ">
                                        <div class="float-right  text-white " style="font-size: 45px;"><?php echo $total_stu;?></div>
                                        <div class="clearfix"></div>
                                        <div class="float-right text-white ">All Student</div>
                                    </div>
                                </div>
                            </div>

                                <a href="index.php?page=all-student">
                                <div class="card-footer">
                                    <span class="float-left text-white">All Students</span>
                                    <span class="float-right text-white"><i class="fas fa-arrow-right"></i></i></span>
                                    <div class="clearfix"></div>
                                </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="card bg-primary">
                                <div class="card-header">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <i class="fa fa-users fa-5x text-white"></i>
                                    </div>
                                    <div class="col-sm-9 ">
                                        <div class="float-right  text-white " style="font-size: 45px;"><?php echo $total_user;?></div>
                                        <div class="clearfix"></div>
                                        <div class="float-right text-white ">All Users</div>
                                    </div>
                                </div>
                            </div>

                                <a href="index.php?page=all-users">
                                <div class="card-footer">
                                    <span class="float-left text-white">All Users</span>
                                    <span class="float-right text-white"><i class="fas fa-arrow-right"></i></i></span>
                                    <div class="clearfix"></div>
                                </div>
                                </a>
                            </div>
                        </div>

                       
                    </div>
                    <hr class="hr">

                    <h3>New Student</h3>
                     <div class="table-responsive">
                     <table id="data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Roll</th>
                                <th>City</th>
                                <th>Contact</th>
                                <th>Photo</th>
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
                                 <td><?php echo ucwords($row['city']); ?></td>
                                 <td><?php echo $row['contact']; ?></td>
                                 <td><img style="width: 100px;" src="student_img/<?php echo $row['photo']; ?>" alt=""></td>
                             </tr>
                             <?php
                                  
                                }
                             ?>
                        </tbody>
                    </table>
                     </div>