<?php
include_once 'connect.php';
class news
{  
    private $conn;
    public function __construct($conn){
        $this->conn=$conn;
    }

 public function insertdata()
     {
     if(isset($_POST['submit']))
        {
         var_dump($_POST);
         $title =  strip_tags( $_POST['title']);
         $tags = strip_tags($_POST['tags']);
         $post = strip_tags($_POST['post']);
         $cat=$_POST['cat'];
         $post_image=$_FILES['image']['name'];
         $post_image_tmp=$_FILES['image']['tmp_name'];
         $out=$this->conn->query("INSERT INTO posts (title,tags,post,catgeory_id,image) VALUES('$title','$tags','$post',$cat,'$post_image')") ;
        if ($out){
            
            $uploaded=move_uploaded_file($post_image_tmp, "../images/$post_image");
            if ($uploaded){
                      ?>      <script>alert('post inserted'); </script>

            <?php }
            } 
         }
         
        }
    
 public function getdata()
 {
    $data=$this->conn->query("select * from posts ") or die("query failed"); 
    $rows = [];
    while($row = mysqli_fetch_assoc($data))
    {
        $rows[] = $row;
    }
    return $rows;

  }
  public function selectRand(){
      $data=$this->conn->query("select * from posts order by RAND() LIMIT 0,4");
          $rows = [];
    while($row = mysqli_fetch_assoc($data))
    {
        $rows[] = $row;
    }
    return $rows;

  }
  public function get_post_category(){
       if (isset($_GET['cat_id'])){
           $cat_id=$_GET['cat_id'];
           $data=$this->conn->query("select * from posts where catgeory_id=".$cat_id);
           while($row = mysqli_fetch_assoc($data))
            {
                $rows[] = $row;
            }
            return $rows;
           
  }
  
      }
      
      public function searchPosts(){
            if (isset($_GET['search']) && $_GET['query']){
            $user_query=$_GET['query'];
            $query="select * from posts where tags like  '%$user_query%' ";

            $data=$this->conn->query($query);
            while($row = mysqli_fetch_assoc($data))
            {
                $rows[] = $row;
            }

            return $rows;
    }
      }
 public function edit(){
    $id=$_GET['id'];
    if ((isset($id)) && (!empty($id))){
    $data= $this->conn->query("select * from posts where id=".$id) or die("query failed"); 
    $row=  mysqli_fetch_assoc($data);
    return $row;
    }
 }
 
 public function update()
 {
        if(isset($_POST['update']))
        {
         $title = strip_tags($_POST['title']);
         $tags = strip_tags($_POST['tags']);
         $post = strip_tags($_POST['post']);
         $cat_id=$_POST['cat'];
         $image=$_FILES['image']['name'];
         $image_tmp=$_FILES['image']['tmp_name'];
         $out=$this->conn->query("UPDATE posts SET title='".$title."',
            post='".$post."',
            tags='".$tags."',
            catgeory_id='".$cat_id."'    
        WHERE id=".$_GET['id']) ;
        if ($out){
            ?>
            <script>alert('post updated'); </script>
            <?php
            } 
         }

 }
 public function delete()
    {
        $out=$this->conn->query("DELETE FROM posts WHERE id=".$_GET['id']);
        if ($out){
            ?>
               <script>alert('post deleted successfully')
                      window.open('index.php','_self')
               </script>
               <?php
        }
    }
}
?>
