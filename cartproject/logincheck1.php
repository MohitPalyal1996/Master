<?php 
 session_start();
   $con = mysqli_connect('localhost','root');
   if($con) 
   {
    echo "connecion successful";
     } else{
            "no connecion";
  }

$db = mysqli_select_db($con, 'system_cart');


if (isset($_POST['submit'])) {
   $username = $_POST['user'];
   $password = $_POST['pass'];


   $sql = " select * from admintable where user = '$username' and pass = '$password' ";

   $query = mysqli_query($con,$sql);

   $row = mysqli_num_rows($query);
    if($row == 1)
    {
        echo "login successful";
        $_SESSION['user'] = $username;
        header('location:index.php');
    
    }

    else{
        echo "login faild";
        header('location:adminlogin.php');
    
   }

}



 ?>