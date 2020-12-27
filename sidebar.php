<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="search.php" method ="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search .....">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php
          // mysql query to insert data

          $limit = 4;
          
          //mysql query
          $query = "SELECT event.event_id,event.event_title, event.starting_date,category.category_name,category.category_id, event.category, event.image FROM event
              LEFT JOIN  category ON event.category = category.category_id
              ORDER BY event.event_id DESC LIMIT {$limit}";

            $result = mysqli_query($con,$query) or die("Query unsuccessful.");
          //Check records are added or not from db

          if(mysqli_num_rows($result) > 0){
            while($row = (mysqli_fetch_assoc($result))){
        ?>
        <div class="recent-post">
            <a class="post-img" href="single.php?id=<?php echo base64_encode($row['event_id']); ?>&cid=<?php echo base64_encode($row['category']); ?>">
                <img src="admin/upload/<?php echo $row['image'];?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?id=<?php echo base64_encode($row['event_id']); ?>&cid=<?php echo base64_encode($row['category']); ?>"><?php echo $row['event_title'];?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href="category.php?cid=<?php echo base64_encode($row['category']); ?>&cid=<?php echo base64_encode($row['category']); ?>"><?php echo $row['category_name']; ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['starting_date']; ?>
                </span>
                <a class="read-more" href="single.php?id=<?php echo base64_encode($row['event_id']); ?>&cid=<?php echo base64_encode($row['category']); ?>">read more</a>
            </div>
        </div>
    <?php 

        }
    }
     ?>
        </div> 
    <!-- /recent posts box -->
</div>