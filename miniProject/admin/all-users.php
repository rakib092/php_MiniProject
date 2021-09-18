

<h1 class="text-primary"><i class="fa fa-users"></i> All Users <small> All Users</small></h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"> <a href="index.php?page=dashboard">DahsBoard</a></li> 
                            <li class="breadcrumb-item active"><i class="fa fa-user-plus"></i> All Users</li>
                        </ol>
                    </nav>


<div class="table-responsive">
                     <table id="data" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                
                                <th>Name</th>
                                <th>email</th>
                                <th>username</th>
                                <th>photo</th>
                               
                               
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                               $query="SELECT * FROM `user`";
                               $result=mysqli_query($conn,$query);

                               while($row=mysqli_fetch_assoc($result)){?>
                             
                             <tr>
                                 
                                 <td><?php echo $row['name'];?></td>
                                 <td><?php echo $row['email']; ?></td>
                                 <td><?php echo $row['username']; ?></td>
                                 
                                 
                                 <td><img style="width: 100px;" src="image/<?php echo $row['photo']; ?>" alt=""></td>
                                
                                </tr>
                             <?php
                                  
                                }
                             ?>
                        </tbody>
                    </table>
                     </div>