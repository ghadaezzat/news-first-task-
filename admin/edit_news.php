
<?php include './header.php';
 include '../classes/news.php';
 $news=new news($conn);
if(isset($_GET['id'])){
        $post=$news->edit();

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
        <div class="col-xs-9">

<div class="page-header">
    <h1>Edit post </h1>
</div>

<!--  START -->
    <div class="row">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            <div class="col-lg-6">
                <input type="hidden" name="id" value="<?= $post['id'];?>" >

                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="title">Enter title</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="title" value="<?= $post['title'];?>"  placeholder="Enter title" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="post">Enter Post</label>
                    <div class="input-group">
                        <textarea name="post"  class="form-control" rows="5" required><?= $post['post'];?></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tag">Enter tags seperated by -</label>
                    <div class="input-group">
                        <input type="text" class="form-control"  name="tags" placeholder="Enter tags" value="<?= $post['tags'];?>" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">                   
                        <select name="cat" style="width: 200px;" required>
                            <option>select a category</option>
                               <?php   $cat=new category($conn);
                                       $cats=$cat->getdata();
                              ?>
                                    <?php foreach($cats as $item) :?>
                            <option value="<?= $item['id'] ?>"  <?php if($post['catgeory_id'] == $item['id']){?> selected="selected" <?php } ?> ><?= $item['name']; ?></option> 
                                    <?php endforeach; ?>
                        </select>
                 </div>  
                <input type="submit" name="update"  value="Update" class="btn btn-info pull-right">
            </div>
        </form>

    </div>
</div>
<!-- END -->

</div>

        </div>

  </body>
</html>
<?php 
$news->update();
?>








