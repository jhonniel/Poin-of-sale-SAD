<?php  include('db_connect.php')?>


<!DOCTYPE html>
<html>
<head>
	<title>Sales</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Quicksand:wght@500&family=Roboto+Slab:wght@500&display=swap">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
 	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
  <nav>
    <a class="logo" href="DashboardSalesDept.php">XYT Co.</a>
    <ul>
      <li><a href="DashboardSalesDept.php">Dashboard</a></li>
      <li><a>Main</a>
      	<ul class="main">
		  <li class="mains"><a class="active" href="Sales.php">Sales</a></li>
		  <li class="mains"><a href="CustomerSalesDept.php">Customer</a></li>
		  <li class="mains"><a href="InventorySalesDept.php">Inventory</a></li>
		</ul>
      </li>
      <li><a>Choose Cart</a>
        <ul>
          <li class="more"><a href="RegularCart.php">Regular</a></li>
          <li class="more"><a href="DiscountCart.php">Discount</a></li>
        </ul>
      </li>
      <li><a href="Login.php">Logout</a></li>
    </ul>
  </nav>


<body>
  
<?php  
  $connect = mysqli_connect('Localhost','root','','xytcompany');
			$query = "SELECT * FROM inventory where quantity >0 and status = 'active' ";
			$query2 = "SELECT * FROM cart ORDER by id ASC";
			$result = mysqli_query($connect, $query);
			$result2 = mysqli_query($connect, $query2);

			session_start();
			if ($result):
				if (mysqli_num_rows($result)>0):

					while ($product = mysqli_fetch_assoc($result)):
					?>
					<div class="col-md-2">
						<form method="POST">
							<center>
							<div class="products">
								<br>
								<div class="img">
							    <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $product['IMAGE'] ).'  " width ="130"  height ="130">';?>
							    </div>
								<h4 class="text-info"><?php echo $product['product_name']; ?></h4>

								<h4>Php <?php echo $product['price']; ?></h4>

								<label>Stock</label><h4<?php if ($product['quantity']<=30){?>
					               style = "color:red"
					             <?php }  ?> >
					              <?php echo $product['quantity']; ?></h4>

								<input type="number" name="quantity" min="0" />

								<input type="hidden" name="pname" value="<?php echo $product['product_name']?>"/>

								<input  type="hidden" name="id" value="<?php echo $product['id']?>"/>

								<input  type="hidden" name="price" value="<?php echo $product['price']?>"/>

								<br><br>
								<input type="submit" name="addToCart" class="btn btn-info" value="Add to cart">
								<br><br>
							</div>
							</center>
						</form>
					</div>

					<?php
						endwhile;
					endif;
				endif;	
							
					        if(isset($_POST['addToCart'])) {
					        	$id=$_POST['id'];
					            $name=$_POST['pname'];
					            $qty = (int)$_POST['quantity'];
					            $price = (int)$_POST['price'];
					            $total = (int)$_POST['price'] * (int)$_POST['quantity'];

					            $getID = "SELECT * FROM cart WHERE id='$id'";
					          	$getIDresult = mysqli_query($conn,$getID);

					          	
					          	if(mysqli_num_rows($getIDresult)==0){
					          		$sqlinsert="INSERT INTO cart(id,productname,quantity,price) VALUES 
          									('$id','$name','$qty','$total')";
          							mysqli_query($conn,$sqlinsert);
					          	}

					          		
					          	else{
					          		while ($row=mysqli_fetch_assoc($getIDresult)) {
					          		$cartID = $row['id'];
						          		if($id==$cartID){
						          			$newqty=(int)$row['quantity']+$qty;
						          			$newprice=(int)$row['price']+$total;
						          			$sqlupdateqty = "UPDATE cart SET quantity='$newqty' WHERE id='$id'";
						          			mysqli_query($conn,$sqlupdateqty);
						          			$sqlupdateprice = "UPDATE cart SET price='$newprice' WHERE id='$id'";
						          			mysqli_query($conn,$sqlupdateprice);
						          			 
						          		}	
					          		}
					          	}
					        }
					        $totalcart = "SELECT SUM(price) AS Total FROM cart";
					        $totalcartresult = mysqli_query($conn,$totalcart);
					        	$row=mysqli_fetch_assoc($totalcartresult); 

					        
?> 

</body>
</html>

<style type="text/css">

nav{
  background: #296d98;
  height: 80px;
  width: 100%;
}

body{
  overflow-y: auto;
  overflow-x: hidden;
  width: 100%;
  height: 100%;
}

  
a.logo{
  font-family: 'Montserrat', sans-serif;
  color: white;
  font-size: 35px;
  line-height: 80px;
  margin-left: 100px;
  font-weight: bold;
}

a.logo:hover{
  cursor: pointer;
  background-color: #296d98;
}

a.active,a:hover{
  background:  #1ca7ec;
  color: white;
  transition: .5s;
  text-decoration: none;
}

nav ul{
  float: right;
  margin-right: 20px;
}

nav ul li{
  font-family: 'Roboto Slab', serif;
  display: inline-block;
  line-height: 80px;
  margin: 0 10px;
}

nav ul li a{
  color: white;
  font-size: 17px;
  padding: 7px 13px;
  border-radius: 3px;
  text-transform: uppercase;
}

nav ul li ul{
  width: 150px;
  display: none;
  position: absolute;
  background-color: #296d98;
  margin-left: -2px;
  margin-top: -5px;
  padding-left: 0px;
  text-align: center;
  z-index: 2;
}

.main{
  width: 165px;
  display: none;
  position: absolute;
  background-color: #296d98;
  margin-left: -46px;
  margin-top: -5px;
  padding-left: 0px;
  text-align: center;
  z-index: 2;
}

.mains{
	margin-left: auto;
	margin-right: auto;
}

.more{
	margin-left: auto;
	margin-right: auto;
}

nav ul li:hover ul {
  display: block;
}

nav ul li ul li a:hover{
color: white;
background-color:  #1ca7ec;  
}

a.active,a:hover{
  background:  #1ca7ec;
  color: white;
  transition: .5s;
  text-decoration: none;
}

input[type=text]{
  width: 200px;
  padding: 5px 5px;
  border: 1px solid #296d98;
  border-radius: 5px;
  box-sizing: border-box;
}

.products{
	width: 180px;
	height: 400px;
	margin-top: 30px;
  	border-radius: 15px;
  	box-shadow: 1px 1px 5px 1px #848e7b;
  	font-family: 'Quicksand', sans-serif;
}

input[name=quantity]{
  	border: 1px solid #296d98;
  	border-radius: 5px;
  	width: 100px;
}


</style>