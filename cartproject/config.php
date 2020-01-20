<?php 
$con = new mysqli("localhost","root","","system_cart");
if($con->connect_error){
die("connction failed".$con->connect_error);
}

 ?>