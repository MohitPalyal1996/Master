<?php
include 'config.php';

$grand_total = 0;
$allItems = '';
$items= array();

$sql = "SELECT CONCAT(product_name,'(',qty,')') AS itemQty, total_price FROM cart";
$stmt = $con->prepare($sql);
$stmt->execute();						
$result = $stmt->get_result();
while($row = $result->fetch_assoc()){
	$grand_total +=$row['total_price'];
	$items[] = $row['itemQty'];

}
	$allItems = implode(",",$items);
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		chechout
	</title>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />


    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">&nbsp<i class="fas fa-mobile-alt"></i>&nbsp checkout Cart Prject</a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link active" href="index.php">products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="checkout.php">checkout</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart"></i> <span id="cart-item" class="badge badge-danger"></span></a>
      </li>
      <li>
	 <?php  $_SESSION['user'] ?>
	<a style="padding: 0px; margin-top: 9px;"  class="btn btn-danger" href = "adminlogout.php">Log Out</a> 
</li>
    </ul>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-lg-6 px-4 pb-4">
			<
		</div>
	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
	load_cart_item_number();

function load_cart_item_number(){
$.ajax({
	url: 'action.php',
	method:'get',
	data:{cartItem:"cart_item"},
	success:function(response){
		$("#cart-item").html(response);
		}
	
})

}

	});

</script>
</body>


</html>





