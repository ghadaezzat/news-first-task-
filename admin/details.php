<?php include './header.php';?>
<?php include '../classes/news.php';
$news=new news($conn);
$post=$news->edit();
?>
<html>
    <head>
        <title>admin page</title>
    </head>
<body>


    <div class="container-fluid content">
        <div class="row ">

        <?php include './sidebar.php'; ?>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
          <h1><?= $post['title']; ?></h1>
        
          <div class="row ">
            <div class="col-xs-3 ">
                <img src="../images/<?= $post['image']; ?>" width="200" height="200" class="img-fluid" alt="Generic placeholder thumbnail">
            </div>
              <div class="col-xs-6">
                  <h4 class="well"><?= $post['post']; ?></h4>
                  <br/>
                  tags:
                  <p><?= $post['tags']; ?></p>
              </div>  
         </div>
        </div>
 
        
      </div>
        </div>
  </body>
</html>


