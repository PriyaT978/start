
   
   <?php
    if(isset($_POST["delete-btn"]))
    {
      $s=$_POST["delete-id"];
    $link=mysqli_connect("localhost","root","","stack");
   $result= mysqli_select_db($link,"stack"); 
   
   $query_run=mysqli_query($link,"DELETE from product where pid='$s'");
    if($query_run)
    {
        echo "<script> alert('data deleted');</script>";
        header("location:show1.php");
    }
    else{
        echo "<script> alert(' no data deleted');</script>";
    }
   }
?>

