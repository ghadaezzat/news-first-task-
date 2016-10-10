<html>    
    <head>
        <meta charset="utf-8">

        <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="../bower_components/jquery/dist/jquery.min.js" ></script>
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js" ></script>
        <script src="../js/dashboard.js"></script>
        <link href="../css/dashboard.css"/>
    </head>
    <body>
           <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Target News</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Contact</a></li>

            </ul>
            <ul class="nav navbar-nav navbar-right">

              <li> 
                  <div class="search" style="margin-top: 10px;">
                <form class="form-inline pull-right " method="get" action="cat_posts.php">
                        <input type="text" name="query" placeholder="search"/>
                        <input type="submit" name="search" value="search"/>
                </form>
                  </div>
                  </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
    </body>
</html>
<?php
 include '../classes/connect.php';
 include '../classes/category.php';

 $conn=new connect();
 $cat=new category($conn);
 $cats=$cat->getdata();