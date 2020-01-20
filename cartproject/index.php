<?php 
session_start();
if (!isset($_SESSION['user']))
 {
	header('location:adminlogin.php');
}


 ?>

<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />


    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <!-- Brand -->
  <a class="navbar-brand" href="index.php">&nbsp<i class="fas fa-mobile-alt"></i>&nbsp Cart Project</a>

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
	<div id="message">
		
	</div>
	<div class="row mt-2 pd-3">
		<?php 
		include 'config.php';
		$stmt = $con->prepare("SELECT* FROM product");
		$stmt->execute();
		$result = $stmt->execute();
		$result = $stmt->get_result();
		while($row = $result->fetch_assoc()):
		 ?>
		 <div class="col-sm-6 col-md-4 col-lg-3 mb-2">
		 	<div class="card-deck">
		 		<div class="card p-2 boder-secondary mb-2">
		 			<img src="<?= $row['product_image']?>" class="card-img-top" height="330";width="200">
		 			<div class="card-body p-1">
		 				<h4 class="card-title text-center text-info"><?= $row['product_name']?>
		 					
		 				</h4>
		 				<h5 class="card-text text-center text-danger"><i class="fas fa-rupee-sign"></i>&nbsp<?=number_format($row['product_price'],2)  ?>/- 
		 					
		 				</h5>
		 			</div>
		 			<div class="card-footer p-1">
		 				<form action="" class="form-submit">
		 				<input type="hidden" name="" class="pid" value="<?= $row['id']?>">
		 				<input type="hidden" name="" class="pname" value="<?=$row['product_name']?>">
		 				<input type="hidden" name="" class="pprice" value="<?=$row['product_price']?>">
		 				<input type="hidden" name="" class="pimage" value="<?=$row['product_image']?>">	<input type="hidden" name="" class="pcode" value="<?=$row['product_code']?>">
		 				<button class="btn btn-info btn-block addItemBtn"><i class="fas fa-cart-plus"></i>&nbsp &nbspAdd To Cart </button>

		 				</form>
		 				<!-- <a href="action.php?id=<?= $row['id'] ?>" class="btn btn-info btn-block"><i class="fas fa-cart-plus"></i>&nbsp &nbspAdd To Cart</a> -->
		 			</div>
		 		</div>
		 	</div>
		 	
		 </div>
		 <?php 
		 	endwhile;	?>
	</div>



</div>



 
      
      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".addItemBtn").click(function(e){
			e.preventDefault();
			var $form = $(this).closest(".form-submit");
			var pid = $form.find(".pid").val();
			var pname = $form.find(".pname").val();
			var pprice = $form.find(".pprice").val();
			var pimage = $form.find(".pimage").val();
			var pcode = $form.find(".pcode").val();
			$.ajax({
				url:'action.php',
				method:'post',
				data:{pid:pid,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
				success:function(response){
					$("#message").html(response);
					window.scrollTo(0,0);
					load_cart_item_number();
				}
			});
		});

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