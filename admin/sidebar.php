        <div class="col-md-2 col-xs-3 sidebar-content">
          <ul class="nav nav-sidebar">
              <li><a href="index.php">All news</a></li>
              <li><a href="add_news.php">Add </a></li>
              <li  class="divider"></li>
              <li><h4>&nbsp;Categories</h4></li>
              <?php foreach($cats as $item) :?>
                <li><a href="cat_posts.php?cat_id=<?= $item['id']; ?>"><?= $item['name']; ?></a></li>  
              <?php endforeach; ?> 
                
                
            </ul>            
        </div>
