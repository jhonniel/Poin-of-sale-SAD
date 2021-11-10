<?php include('db_connect.php')

 ?> 

<!DOCTYPE html>
<html>
<head>
	<title>Accounting</title>
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
   <a class="logo" href="Dashboard.php">XYT Co.</a>
      <ul>
        <li><a href="Inventory.php">Inventory</a></li>
        <li><a href="Products.php">Products</a></li>
        <li><a class="active" href="Report.php">Reports</a></li>
        <li><a>More</a>
          <ul>
            <li class="more"><a href="Supplier.php">Supplier</a></li>
            <li class="more"><a href="Customer.php">Customer</a></li>
            <li class="more"><a href="Employee.php">Employee</a></li>
            <li class="more"><a href="Registration.php">Register</a></li>
			<li class="more"><a href="DATABASES.php">DATABASES</a></li>
            <li class="more"><a href="Login.php">Log-out</a></li>
          </ul>
        </li>
      </ul>
</nav>
 <?php 
     
      $sql="SELECT * FROM transaction";
		
      $result =$conn -> query($sql); 

 if ($result -> num_rows > 0) { ?>

<div class="left">

  <h2 style="margin-left: 150px; margin-top: 41px; font-family: serif;"> <b>Sales Report</b></h2>
  <table style="text-align: center;" class="date">
    <form method="POST">
    <tr>
      <td><p>From:</p></td>
      <td><input type="date" name="fromdate"/></td>
      <td><p>To:</p></td>
      <td><input type="date" name="todate"/></td>
    </tr>
    <tr>
      <td colspan="4" style="text-align: center;"><button type="submit" name="report">Generate Report</button></td>
    </tr>
    </form>
  </table>


<table class="Sales">
	<thead>
		<th><b>Transaction ID</b></th>
		<th><b>Total</b></th>
    <th><b>Customer Name</b></th>
		<th><b>Transaction Time</b></th>
	</thead>
	

      <?php
        while ( $row = $result -> fetch_assoc()) {
          ?>
	<tbody>
		<tr>
			<td><?php echo $row['transaction_id'];?></td>
			<td><?php echo $row['total'];?></td>
      <td><?php echo $row['customername'];?></td>
			<td><?php echo $row['_dateTime'];?></td>
		</tr>
	</tbody>
	<?php  }

      }else{ ?>


  <div class="left">

  <h2 style="text-align: center; font-family: serif;"> <b>Sales Report</b></h2>
  <table style="text-align: center;" class="date">
    <form method="POST">
    <tr>
      <td><p>From:</p></td>
      <td><input type="date" name="fromdate"/></td>
    </tr>

    <tr>
       <td><p>To:</p></td>
      <td><input type="date" name="todate"/></td>
    </tr>
    <tr>
      <td colspan="4" style="text-align: center;"><button type="submit" name="report">Generate Report</button></td>
    </tr>
    </form>
  </table>


<table class="Sales">
  <thead>
    <th><b>Transaction ID</b></th>
    <th><b>Total</b></th>
    <th><b>Customer Name</b></th>
    <th><b>Transaction Time</b></th>
  </thead>
    <tbody>
      <tr>
        <td colspan="4">You have no Records</td>
      </tr>
    </tbody>
    <?php  } ?>
</table>
</div>
<?php 
if (isset($_POST['report'])) {
  
  $from = $_POST['fromdate'];
  $to = $_POST['todate'];  

function alert($msg) {
    
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

if ($from > $to) {
  
    alert("Invalid! FROM DATE Must be GREATER THAN TO DATE.");
    
  }else{
    session_start();
    $_SESSION['fromdate'] = $from;
    $_SESSION['todate'] = $to;

    header("location:SalesReport.php");
  }

}

?>


<?php 
     
      $sql="SELECT * FROM inventory";
      $result =$conn -> query($sql); 

  $grandtotal = 0 ;
  $quantitytotal = 0;    
 if ($result -> num_rows > 0) { ?>

<div class="right">
  <h2 style="text-align: center; font-family:serif;"> <b>Inventory Report </b></h2>
    <div class="btn">
    <form action="InventoryReport.php" method="POST">
    <button name="report1" type="submit">Generate Report</button>
    </form>
    </div>
<table class="Inventory">
  <thead>
    <th><b>Product ID</b></th>
    <th><b>Product Name</b></th>
    <th><b>Quantity Left</b></th>
    <th><b>Sold</b></th>
    <th><b>Cost per Item</b></th>
    <th><b>Line Total</b></th>
  </thead>
     <?php
        while ( $row = $result -> fetch_assoc()) {

        $linetotal = $row["price"]*$row["quantity"];
          ?>
  <tbody>
    <tr>
      <td><?php echo $row['id'];?></td>
      <td><?php echo $row['product_name'];?></td>
      <td><?php echo $row['quantity'];?></td>
      <td><?php echo $row['Item_Sold'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $linetotal;?></td>
    </tr>
  </tbody>
  <?php  }
      }?>
</table>

</div>

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
  width: 125px;
  display: none;
  position: absolute;
  background-color: #296d98;
  margin-left: -23px;
  margin-top: -5px;
  padding-left: 0px;
  text-align: center;
  z-index: 2;
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

table{
  margin-top: 30px;
  margin-left: auto;
  margin-right: auto;
  display: block;
  width: 450px;
  height: auto;
  border: 3px solid #296d98;
  border-collapse: collapse;
  text-align: left;
  font-family: 'Quicksand', sans-serif;
  font-size: 15px;
  background-color: white;
  overflow-y: auto;
  overflow-x: hidden;
}

td, th{
  padding-right: 10px;
  padding-left: 10px;
  padding-top: 10px;
  padding-bottom: 10px;
}

td{
  border: 1px solid #296d98;
}

th{
  text-align: center;
  font-size: 18px;
  font-weight: bold;
  color: white;
  background-color: #296d98;
  position: sticky;
  top: 0;
}

tbody:nth-child(even){
  background-color: #a9cfe7;
}

button[name=report] {
  font-family: 'Quicksand', sans-serif;
  width: 150px;
  height: 40px;
  border:none;
}

button[name=report1]{
  border:none;
  width: 150px;
  height: 40px;
  margin-left: 257px;
  margin-top: -30px;
  background-color: #a9cfe7;
  font-family: 'Quicksand', sans-serif;
}

input[type=date]{
  width: 150px;
  border:none;
}


.date{
  width: 450px;
  margin-top: 54px;
}

.Inventory{ 
  width: 690px;
  height: 500px;
  margin-top: 0px;
}

.left {
    margin-left: 80px;
    display: block;
    width: 315px;
    height: 530px;
    margin-top: 20px;
    float: left;
    
  } 

  .right { 
    margin-top: 30px;
    height: 460px;
    width: 850px;
    float: right;
    margin-bottom: 200px;
  }
  .btn{
    margin-left: 350px;
  }
</style>