
<?php include './header.php';?>
<?php include '../classes/news.php';
$news=new news($conn);
if (isset($_GET['cat_id'])){
    $post=$news->get_post_category();
}elseif ($_GET['search']) {
    $post=$news->searchPosts();
}
?>
<html>
    <head>
        <title>admin page</title>
    </head>
<body>


    <div class="container-fluid content">
        <div class="row ">

        <?php include './sidebar.php'; ?>
        <div class="col-sm-9 ">
          <h1><?= $post['title']; ?></h1>
        
          <div class="row ">
          <div class="table-responsive">
            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>title</th>
                  <th>tags</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($post as $row) :?>

                <tr>
                    <td>
                        <a href="details.php?id=<?= $row['id'];?>"><?= $row['title']; ?></a></td>
                  <td><?= $row['tags']; ?></td>
                  <td colspan="4">                  
                    <a href="edit_news.php?id=<?= $row['id'] ?>" class='btn btn-success btn-sm' >Edit</a>
                  </td>
                  <td>
                    <a href="index.php?id=<?= $row['id'] ?>" class='btn btn-danger btn-sm' >Delete</a>                  
  
                  </td>
                </tr>
               <?php endforeach; ?>

              </tbody>
            </table>
          </div> 
         </div>
        </div>
 
        
      </div>
        </div>
  </body>
</html>


