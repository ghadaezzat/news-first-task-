<?php include './header.php';?>
<?php include '../classes/news.php';
$news=new news($conn);
$rows=$news->getdata();
$rand=$news->selectRand();
?>
<html>
    <head>
        <title>admin page</title>
    </head>
<body>


    <div class="container-fluid content">
        <div class="row ">

        <?php include './sidebar.php'; ?>
        <div class=" col-xs-10 ">
          <h1>Dashboard</h1>
        
          <div class="row ">
              <?php  foreach ($rand as $r) { ?>
            <div class="col-xs-3 ">
                <img src="../images/<?= $r['image']; ?>" width="200" height="200" class="img-fluid" alt="Generic placeholder thumbnail">
              <h4><?= $r['title']; ?></h4>
            </div>
            <?php } ?>
         </div>
        </div>
         </div>
        </div>
          <div class='container-fluid' >
          <div class="table-responsive" style="margin-top: 50px;">
            <table class="table table-striped table-condensed">
              <thead>
                <tr>
                  <th>title</th>
                  <th>tags</th>
                  <th>category</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($rows as $row) :?>

                <tr>
                    <td>
                        <a href="details.php?id=<?= $row['id'];?>"><?= $row['title']; ?></a></td>
                  <td><?= $row['tags']; ?></td>
                  <td><?php 
                   echo $cats[$row['catgeory_id']-1]['name']
                   ?></td>
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
      
  </body>
</html>

<?php 
if(isset($_GET[id])){
    $news->delete();
}