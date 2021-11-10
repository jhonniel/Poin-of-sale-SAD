<?php include 'db_connect.php'; ?>
<?php 
session_start();
$showcart = "SELECT * FROM cart";
$showcartresult = mysqli_query($conn,$showcart);


$totalcart = "SELECT SUM(price) AS Total FROM cart";
$totalcartresult = mysqli_query($conn,$totalcart);
$rowtotal=mysqli_fetch_assoc($totalcartresult); 



function currentDateTime()
{
    $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $date = $date->format('Y-m-d h:i:s');
    return $date;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Senior Citizen Cart</title>
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
          <li class="more"><a href="RegularCart.php">Regular</a></li>
          <li class="more"><a class="active" href="DiscountCart.php">Discount</a></li>
        </ul>
      </li>
      <li><a href="Login.php">Logout</a></li>
    </ul>
  </nav>

		<table>
			<thead>
				<th><b>ID</b></th>
				<th><b>Product Name</b></th>
				<th><b>Quantity</b></th>
				<th><b>Price</b></th>
				<th><b>Subtotal</b></th>
				<th><b>Action</b></th>
			</thead>

		  <?php 
        if ($showcartresult -> num_rows == 0) {?> <td style="font-family: 'Quicksand', sans-serif; color: gray; text-align: center;" colspan="6">
          <?php echo 'No Items on Cart!';  ?>
          </td> <?php }else{
        while($row=mysqli_fetch_assoc($showcartresult)){
          ?>

			<tbody>
			<tr>
				<form action="Process.php" method="POST">

				<td><input type="text" name="id" style="width: 50px;" value="<?php echo $row['id'] ?>" readonly></td>

				<td><input type="text" name="productname" value="<?php echo $row['productname'] ?>" readonly></td>

				<td><input type="text" name="quantity" style="width: 70px;" value="<?php echo $row['quantity'] ?>" readonly></td>

				<td><input class="input" type="text" name="price" style="width: 100px;" value="<?php echo number_format($row['price'] /  $row['quantity'],2 );  ?>" readonly></td>

				<td><input class="input" type="text" name="subtotal" style="width: 100px;" value="<?php echo $row['price'] ?>" readonly></td>

				<td>
					<button type="submit" name="cancel"  value="<?php echo $row['id']; ?>" class="btn btn-primary a-btn-slide-text" style="background-color: #e8171f; border:none;">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
            			<span>Remove</span>
					</button>
				</td>
			</form>
			</tr>
			</tbody>
			<?php }
    }
		?>
		</table>

		<form method="POST" action="checkoutSenior.php">
			<div class="order"><br>
			<label>Subtotal Amount</label><br>
			<input type="text" value="<?php echo $rowtotal['Total']; ?>" readonly>
			<input type="text" name="total" value="<?php echo $rowtotal['Total']; ?>" hidden><br><br>
         	
         	<label>Date</label><br>
          <input type="date" name="date"  required><br><br>

         	<label>Customer Name</label><br>
					  <select name="customer">
					    <option selected></option>
					    <?php
					    
					        $records = mysqli_query($conn, "SELECT firstname,lastname From customer ");  

					        while($data = mysqli_fetch_array($records))
					        {
                      echo "<option value='". $data['firstname']. ' '.$data['lastname']."'>" .$data['firstname'].' '. $data['lastname']."</option>";
                  }	
					    ?>  
  					</select><br><br>

            <label>Type</label><br>
            <select name="logistics"> 
                    <option value="Pick-Up">Pick Up</option>
                    <option value="Deliver">Deliver</option>
           </select><br><br>
           <select name="type"> 
                    <option value="Walk-In">Walk-In</option>
                    <option value="Regular">Regular</option>
                    <option value="Online">Online</option>
                </select><br><br>

  					<input type="submit" name="Order" value="Place Order">
  					</div>
			</form>




</body>
</html>


<style type="text/css">

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
    height: 460px;
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

  input[name=date]{
    width: 220px;
    height: 35px;
    padding: 5px 5px;
    border: 1px solid #296d98;
    border-radius: 5px;
    box-sizing: border-box;
  }

  input[name=Order]{
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

  input[name=Order]:hover{
    background-color: #296d98;
  }

</style>