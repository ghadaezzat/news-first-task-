
<?php include './header.php';
 include '../classes/news.php';
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
    <h1>Add new post </h1>
</div>

<!--  START -->
    <div class="row">
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="title">Enter title</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="title"  placeholder="Enter title" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>


                <div class="form-group">
                    <label for="post">Enter Post</label>
                    <div class="input-group">
                        <textarea name="post"  class="form-control" rows="5" required></textarea>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="tag">Enter tags seperated by -</label>
                    <div class="input-group">
                        <input type="text" class="form-control"  name="tags" placeholder="Enter tags" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                 <div class="form-group">                   
                        <select name="cat" style="width: 200px;" required>
                            <option>select a category</option>
                               <?php   
                              ?>
                                    <?php foreach($cats as $item) :?>
                                        <option value="<?= $item['id'] ?>"><?= $item['name']?></option> 
                                    <?php endforeach; ?> 
                        </select>
                 </div>
                <div class="form-group">
                     <label for="image">*choose image</label>
                        <div class="input-group">
                            <input type="file" name="image" required/>
                        </div>                
                </div>
                <input type="submit" name="submit"  value="Submit" class="btn btn-info pull-right">
            </div>
        </form>

    </div>
</div>
<!-- END -->

</div>

        </div>

  </body>
</html>
<?php $news=new news($conn);

        $news->insertdata();
    
?>







