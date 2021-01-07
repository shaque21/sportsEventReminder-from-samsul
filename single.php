<?php 

include "header.php";

 ?>

 <div id="main-content">
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8">
                  <!-- post-container -->
                   <?php

                          
                          $event_id = base64_decode($_GET['id']);
                          $cat_id = base64_decode($_GET['cid']);
                          
                          //mysql query
                          $query = "SELECT event.event_id,event.event_title, event.description, event.starting_date,category.category_name, event.category, event.image,event.ending_date,category.category_id FROM event
                              LEFT JOIN  category ON event.category = category.category_id
                              WHERE event.event_id = {$event_id}";

                        $result = mysqli_query($con,$query) or die("Query unsuccessful.");
                      //Check records are added or not from db

                      if(mysqli_num_rows($result) > 0){
                        while($row = (mysqli_fetch_assoc($result))){

                        ?>
                    <div class="post-container wow fadeInLeft" data-wow-duration="2s">
                        <div class="post-content single-post">
                            <h3><?php echo $row['event_title'];?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <a href="category.php?cid=<?php echo base64_encode($row['category']); ?>"><?php echo $row['category_name']; ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $row['starting_date']; ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="admin/upload/<?php echo $row['image'];?>" alt=""/>
                            <p class="description">
                                <?php echo $row['description']; ?>
                            </p>
                            <h2 style="font-size: 20px">Time Left For Registration : </h2>
                            <div id="getting-started" data-countdown="<?php echo $row['ending_date']; ?>"></div>
                            <?php if(isset($_SESSION['ROLE'])){ 
                              if($row['category'] == $cat_id){
                                $tournament = strtolower($row['category_name']);
                              ?>
                              <a href="<?php echo $tournament?>-tournament-registration.php" class="btn btn-block mt-4  btn-primary">Apply Now</a>
                            <?php 
                               }
                             } ?>
                        </div>
                    </div>
                <?php }} ?>
                    <!-- /post-container -->
                </div>
                <?php 

                	include "sidebar.php";
                 ?>
                 </div>
        </div>
    </div>
    <?php 
                  include "single-footer.php"; ?>
