
<?php 

    include "header.php";
    include "banner.php";
 ?>
<!-- content part -->
    <section id="content">
    	<div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                	<h2 class="post-heading wow fadeInDown" data-wow-duration="2s">All Posts</h2>
                    <!-- post-container -->
                    <div class="post-container wow fadeInLeft" data-wow-duration="2s">
                        <?php 
                        $limit = 3;
                          //$page = $_GET['page'];
                          if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                          } else {
                            $page = 1;
                          }

                          $offset = ($page - 1) * $limit;
                          
                          //mysql query
                          $query = "SELECT event.event_id,event.event_title, event.description, event.starting_date,category.category_name,category.category_id, event.category,event.image FROM `event`
                              LEFT JOIN  `category` ON event.category = category.category_id
                              ORDER BY event.event_id DESC LIMIT {$offset} , {$limit}";

                        $result = mysqli_query($con,$query) or die("Query unsuccessful.");
                      //Check records are added or not from db

                      if(mysqli_num_rows($result) > 0){
                        while($row = (mysqli_fetch_assoc($result))){
 
                         ?>
                        <div class="post-content ">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo base64_encode($row['event_id']); ?>"><img src="admin/upload/<?php echo $row['image'];?>" alt=""/></a>
                                </div>
                                <div class="col-md-8">
                                    <div class="inner-content clearfix">
                                        <h3><a href='single.php?id=<?php echo base64_encode($row['event_id']); ?>&cid=<?php echo base64_encode($row['category']); ?>'><?php echo $row['event_title'];?></a></h3> 
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <a href='category.php?cid=<?php echo base64_encode($row['category']); ?>'><?php echo $row['category_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['starting_date']; ?>
                                            </span>
                                        </div>
                                        <p class="description">
                                            <?php echo substr($row['description'], 0,120) . '...'; ?>
                                        </p>
                                        <a class='read-more pull-right' href='single.php?id=<?php echo base64_encode($row['event_id']); ?>&cid=<?php echo base64_encode($row['category']); ?>'>read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                            }
                        }
                          
                        $query1 = "SELECT * FROM `event`";
                        $result1 = mysqli_query($con,$query1) or die("Query unsuccessful.");

                        if(mysqli_num_rows($result1) > 0){
                          $total_records = mysqli_num_rows($result1);

                          $total_page = ceil($total_records/$limit);

                          echo "<ul class='pagination admin-pagination'>";
                          if($page > 1){
                            echo '<li><a href="index.php?page='.($page - 1).'">Prev</a></li>';
                          }
                          for ($i=1; $i <= $total_page; $i++) {
                            if($page == $i){
                              $active = "active";
                            }else{
                              $active = "";
                            }

                            echo '<li class = '.$active.'><a href="index.php?page='.$i.'">'.$i.'</a></li>';
                          }
                          if($total_page > $page){
                            echo '<li><a href="index.php?page='.($page + 1).'">Next</a></li>';
                          }
                          echo "</ul>";
                        }


                        ?>
                    </div><!-- /post-container -->
                </div>
                <?php include "sidebar.php";?>
                </div>
        </div>
    </div>
    <?php include "footer.php";  ?>