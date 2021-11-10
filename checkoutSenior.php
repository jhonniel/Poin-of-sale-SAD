<!DOCTYPE html>
<html>
<head>
	<title>Checkout</title>
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
      <li class="mains"><a href="Sales.php">Sales</a></li>
      <li class="mains"><a href="CustomerSalesDept.php">Customer</a></li>
      <li class="mains"><a href="InventorySalesDept.php">Inventory</a></li>
    </ul>
      </li>
      <li><a>Choose Cart</a>
        <ul>
          <li class="more"><a class="active" href="RegularCart.php">Regular</a></li>
          <li class="more"><a href="DiscountCart.php">Discount</a></li>
        </ul>
      </li>
      <li><a href="Login.php">Logout</a></li>
    </ul>
  </nav>

	<?php

	


	function currentDateTime()
{
    $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $date = $date->format('Y-m-d h:ia');
    return $date;
}
		$currentDateTime = currentDateTime();

		$name = $_POST['customer'];
		$logistics = $_POST['logistics'];
		$type = $_POST['type'];
		$expiryDate=$_POST['date'];			
		$total = $_POST['total'];

					if($expiryDate<=$currentDateTime){
						$expired = "Yes";
						$GrandTotal = $total;
						$VAT = round($total - ($total / 1.12),2);
					}else{
						$expired = "No";
						$GrandTotal = ($total/1.12)-(($total/1.12)*0.20);
						$VAT = 0.0; 	
					}

					if($logistics=="Pick-Up"){
						$deliveryFee = 0;
					}
					else
					{
						if($GrandTotal<10000){
							$deliveryFee = 300;
						}else{
							$deliveryFee = 0;
						}
					}
					$GrandTotal = round($GrandTotal + $deliveryFee,2);
	?>	
<div class="container">
	<form method="POST" action="SeniorReceipt.php">
		
						<label>Customer Name</label><br>
						<input type="text" name="customer_name" value="<?php echo $name; ?>">
						<br><br>
						<label>Senior Expired?</label><br>
						<input readonly type="text" value="<?php echo $expired; ?>"><br><br>
						<label>VAT</label><br>
						<input readonly type="number" value="<?php echo $VAT; ?>" name="VAT"><br><br>
						<label>Subtotal</label><br>
						<input readonly type="number" value="<?php echo $total; ?>"><br><br>
						<label>Delivery Fee</label><br>
						<input readonly type="number" value="<?php echo $deliveryFee; ?>"><br><br>
						<label>Grand Total</label><br>
						<input readonly type="text" name="grandTotal" value="<?php echo $GrandTotal; ?>"><br><br>
						<label>Logistics</label><br>
						<input readonly type="text" name="logistics" value="<?php echo $logistics; ?>" ><br><br>
						<label>Type</label><br>
						<input readonly type="text" name="type" value="<?php echo $type; ?>"><br><br>
						<label>Input Cash</label><br>
						<input type="number" min="<?php echo $GrandTotal; ?>" step="0.01" name="cash" required><br><br>
						

		<input type="submit" name="btnPlaceOrder" value="Place Order"><br><br>
		<a href="DiscountCart.php">Return to Cart</a>
	</form>
</div>
</body>
</html>

<style type="text/css">
	
body{
	height: 1000px;
}

	div.container{

	text-align: center;
	padding-top: 50px;
    margin-top: 20px;
    width: 315px;
    height: 850px;
    margin-right: auto;
    margin-left: auto;
    text-align: center;
    background-color: #a9cfe7;
    font-family: 'Quicksand', sans-serif;
    box-shadow: 1px 1px 5px -1px #296d98;
}

 nav{
  background: #296d98;
  height: 80px;
  width: 100%;
}

  
a.logo{
  font-family: 'Montserrat', sans-serif;
  color: white;
  font-size: 35px;
  line-height: 80px;
  padding: 0 100px;
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


  .order{
    margin-top: 20px;
    width: 315px;
    height: 380px;
    margin-right: auto;
    margin-left: auto;
    text-align: center;
    background-color: #a9cfe7;
    font-family: 'Quicksand', sans-serif;
    box-shadow: 1px 1px 5px -1px #296d98;
  }

  table{
    margin-top: 20px;
    background-color: white;
    font-family: 'Quicksand', sans-serif;
    font-size: 15px;
    text-align: center;
    margin-right: auto;
    margin-left: auto;
  }

  th, td {
    text-align: left;
    font-family: 'Quicksand', sans-serif;
  }

  td{
    border: 1px solid #296d98;
    font-size: 15px;
    padding: 5px;
  }

  th{
    padding: 10px;
    text-align: center;
    font-size: 15px;
    font-weight: bold;
    color: white;
    background-color: #296d98;
    position: sticky;
    top: 0;
    z-index: 1;
  }

  tbody:nth-child(even) {
    background-color: #a9cfe7; 
  }

  input[type=text],input[type=number]{
    width: 220px;
    padding: 5px 5px;
    border: 1px solid #296d98;
    border-radius: 5px;
    box-sizing: border-box;
  }

  select[name="logistics"], select[name="type"], select[name="customer"]{
     width: 220px; 
     height: 35px; 
     border: 1px solid #296d98;
     border-radius: 5px;
  }

  input[name=btnPlaceOrder]{
    width: 220px;
    height: 40px;
    padding: 5px 5px;
    border: none;
    border-radius: 5px;
    box-sizing: border-box;
    background-color: #418ac8;
    color: white;
    box-shadow: 0px 1px 0px 0px #171617;
  }

  input[name=btnPlaceOrder]:hover{
    background-color: #296d98;
  }

</style>