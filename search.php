<?php include 'header.php'; ?>
    <div id="main-content" >
      <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  
                    <?php 
                    if(isset($_GET['search'])){
                        $search_term = mysqli_real_escape_string($con,$_GET['search']);

                    }
                    
                     ?>
                    <h2 class="page-heading"><?php echo $search_term; ?></h2>

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
                          $query = "SELECT event.event_id,event.event_title, event.description, event.starting_date,category.category_name, event.category,event.image FROM `event`
                              LEFT JOIN  `category` ON event.category = category.category_id
                              WHERE event.event_title LIKE '%{$search_term}%' OR event.description LIKE      '%{$search_term}%' OR category.category_name LIKE '%{$search_term}%'          
                              ORDER BY event.event_id DESC LIMIT {$offset} , {$limit}";



                         $result = mysqli_query($con,$query) or die("Query unsuccessful. : post");
 
                         
                      //Check records are added or not from db

                      if(mysqli_num_rows($result) > 0){
                        while($row = (mysqli_fetch_assoc($result))){

                        ?>
                        <div class="post-content ">
                            <div class="row">
                                <div class="col-md-4">
                                    <a class="post-img" href="single.php?id=<?php echo base64_encode($row['event_id']); ?>&cid=<?php echo base64_encode($row['category']); ?>"><img src="admin/upload/<?php echo $row['image'];?>" alt=""/></a>
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
                        else {
                          echo "<div class ='alert alert-danger'>No Records Found.
                          </div>";
                        }
                          //pagination start
                        $query_of_search_pag = "SELECT * FROM `event` 
                        WHERE event.event_title LIKE '%{$search_term}%' 
                        OR event.description LIKE'%{$search_term}%'";

                    $result_of_search_pag = mysqli_query($con, $query_of_search_pag) or die("Query failed : search");
                    //$row_of_search_pag = mysqli_fetch_assoc($result_of_search_pag);

                        if(mysqli_num_rows($result_of_search_pag) > 0){
                          $total_records = mysqli_num_rows($result_of_search_pag);

                          $total_page = ceil($total_records/$limit);

                          echo "<ul class='pagination admin-pagination'>";
                          if($page > 1){
                            echo '<li><a href="search.php?search='.$search_term.'&page='.($page - 1).'">Prev</a></li>';
                          }
                          for ($i=1; $i <= $total_page; $i++) {
                            if($page == $i){
                              $active = "active";
                            }else{
                              $active = "";
                            }

                            echo '<li class = '.$active.'><a href="search.php?search='.$search_term.'&page='.$i.'">'.$i.'</a></li>';
                          }
                          if($total_page > $page){
                            echo '<li><a href="search.php?search='.$search_term.'&page='.($page + 1).'">Next</a></li>';
                          }
                          echo "</ul>";
                        }


                        ?>

                
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
