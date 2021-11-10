<?php include ('db_connect.php');
session_start();
$username = $_SESSION['user']; 

?>
 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <meta charset="utf-8">
    <title>Dashboard</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Quicksand:wght@500&family=Roboto+Slab:wght@500&display=swap">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>

  <body>
    
  <nav>
    <a class="logo" href="DashboardSalesDept.php">XYT Co.</a>
    <ul>
      <li><a class="active" href="DashboardSalesDept.php">Dashboard</a></li>
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
          <li class="more"><a href="DiscountCart.php">Discount</a></li>
        </ul>
      </li>
      <li><a href="Login.php">Logout</a></li>
    </ul>
  </nav>

    <table>
      <thead>
        <th colspan="4"><?php
          $t=time();
          date_default_timezone_set("Asia/Manila");
          echo(date("m-d-Y ",$t));
          echo date("h:ia");
          ?>
        </th>
      </thead>
      <tbody>
  <tr>
          <td>
              <div class="forms">
              <a><h3><center>Products</center></h3></a>

              <table class="insidetableproducts" style="
                  display: block;
                  overflow-y: scroll;
                  overflow-x: hidden;
                  height: 350px;
                  width: 100%;
                  margin-top: -9px;">
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM inventory")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td style="padding-top: 10px;">No. of Products</td>
                  <td class="insidetableproductsTD" style="padding-top: 10px;"> <?php echo $row; ?></td>
                </tr>
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * from category group by Category_Name")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>No. of Categories</td>
                  <td class="insidetableproductsTD"><?php echo $row; ?></td>
                </tr>
                <tr>
                   <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM inventory ORDER BY Item_Sold DESC LIMIT 1")){

    $row = $stmt->fetch_assoc();
  
}   
?>
                  <td>Top Product Sales</td>
                  <td class="insidetableproductsTD"><?php echo $row['product_name']; ?></td>
                </tr>
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM inventory ORDER BY Item_Sold ASC LIMIT 1")){

    $row = $stmt->fetch_assoc();
  
}   
?>
                  <td>Least Product Sales</td>
                  <td class="insidetableproductsTD"><?php echo $row['product_name']; ?></td>
                </tr>
                <tr>
                  <tr><th colspan="2">Out of Stock Products</th>
                  </tr>
                </tr>
                <tbody style="text-align: center; text-decoration: none;">
                  <tr>
                    <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT product_name,quantity FROM inventory WHERE quantity = 0")){

    
      if ($stmt->num_rows > 0) {
        while ($row = $stmt -> fetch_assoc()) {
          
?>
                    <td colspan="2" style="font-weight: normal;"><?php echo $row["product_name"];?></td>
                  
                 
                </tr>
                </tbody>
                 <?php 
                     }
      }
}   
                  ?>
              </table>
            </div>
          </td>


          <td>
            <div class="forms">
              <a><h3><center>Customers</center></h3></a>
              <table class="insidetable">
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM customer where type = 'Online Customer'")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>Online Customers</td>
                  <td><?php echo $row; ?></td>
                </tr>
                <tr>
                   <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM customer where type = 'Regular'")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>Regular Customers</td>
                  <td><?php echo $row; ?></td>
                </tr>
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM transaction where customername = ' ' ")){

    $row = $stmt->num_rows;
    $Walkin = $row;
 
}   
?>
                  <td>Walk-in Customers</td>
                  <td><?php echo $Walkin; ?></td>
                </tr>
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM customer where status = 'Active' ")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>Active Customers</td>
                  <td><?php echo $row; ?></td>
                </tr>
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM customer where status = 'Inactive' ")){

    $row = $stmt->num_rows;

}   
?>
                  <td>Inactive Customers</td>
                  <td><?php echo $row; ?></td>
                </tr>
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM customer")){

    $row = $stmt->num_rows;

}   
?>
                  <td>Total No. of Customers</td>
                  <td><?php echo $row + $Walkin; ?></td>
                </tr>
              </table>
            </div>
          </td>


          <td rowspan="2">
            <div class="shortforms">
              <a><h3><center>Reports</center></h3></a>
              <table class="insidetable">
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM sales_report")){

    $row= $stmt->num_rows;
    $row1 = $row;
 
}   
?>
                  <td>Sales Report</td>
                  <td><?php echo $row1; ?></td>
                </tr>
                <tr>
 <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM inventory_report")){

    $row = $stmt->num_rows;
    $row2 = $row;
}   
?>
                  <td>Inventory Report</td>
                  <td><?php echo $row2; ?></td>
                </tr>

                <tr>
                  <td>Total No. of Reports</td>
                  <td><?php echo $row1 + $row2; ?></td>
                </tr>
              </table>
            </div>
            <div class="shortforms">
              <a><h3><center>Suppliers</center></h3></a>
              <table class="insidetable">
                <tr>
                   <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM supplier where status='Active'")){

    $row = $stmt->num_rows;
 
}
?>
                  <td>Active Suppliers</td>
                  <td><?php echo $row; ?></td>
                </tr>
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM supplier where status='Inactive'")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>Inactive Suppliers</td>
                  <td><?php echo $row; ?></td>
                </tr>
                <tr>
                   <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM supplier")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>Total No. of Suppliers</td>
                  <td><?php echo $row; ?></td>
                </tr>
              </table>
            </div>
          </td>
          
          <td>
            <div class="forms">
              <a><h3><center>Employees</center></h3></a>
              <table class="insidetable">
                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM employee where Employee_Department='Accounting Department'")){

    $row = $stmt->num_rows;
 
}   
?>
                  <td>Accounting Department</td>
                  <td><?php echo $row; ?></td>
                </tr>

                <tr>
                   <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM employee where Employee_Department='Admin'")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>CEO Assistants/Admins</td>
                  <td><?php echo $row; ?></td>
                </tr>
                <tr>

                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM employee where Employee_Department='Logistic Department'")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>Logistics Department</td>
                  <td><?php echo $row; ?></td>
                </tr>

                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM employee where Employee_Department='Purchasing Department'")){

    $row = $stmt->num_rows;

}   
?>
                  <td>Purchasing Department</td>
                  <td><?php echo $row; ?></td>
                </tr>

                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM employee where Employee_Department='Sales Department'")){

    $row = $stmt->num_rows;
 
}   
?>
                  <td>Sales Department</td>
                  <td><?php echo $row; ?></td>
                </tr>

                <tr>
                  <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM employee where Employee_Department='Warehouse Department'")){

    $row = $stmt->num_rows;
  
}   
?>
                  <td>Warehouse Department</td>
                  <td><?php echo $row; ?></td>
                </tr>

                <tr>
                   <?Php
require "db_connect.php";

if($stmt = $conn->query("SELECT * FROM employee")){

    $row = $stmt->num_rows;

}   
?>
                  <td>Total No. of Employees</td>
                  <td><?php echo $row; ?></td>
                </tr>
              </table>
            </div>
          </td>

        </tr>
       
      </tbody>
    </table>

<!--     <div class="profile">
      <h2><center>Welcome, Username!</center></h2>
      <table class="profileform">
        <tr>
          <td>First Name</td>
          <td>Levi</td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td>Ackerman</td>
        </tr>
        <tr>
          <td>Email</td>
          <td>nanikoreuwu@gmail.com</td>
        </tr>
        <tr>
          <td>Address</td>
          <td>Ph99 Blk 99 L99 Paradis Island Wall Maria</td>
        </tr>
        <tr>
          <td>Contact Number</td>
          <td>09971234567</td>
        </tr>
        <tr>
          <td>Department</td>
          <td>Accounting</td>
        </tr>
      </table>
      <center><button class="submit" name='Edit'>Edit Profile</button></center>
      <center><button class="submit" name='Cancel'>Cancel</button></center>
    </div> -->
        <div class="profile">
     <?php 
     
      $sql = "SELECT * FROM employee WHERE Employee_Username = '$username'";
      $result = mysqli_query($conn,$sql);
      $count = mysqli_num_rows($result);  
      $row = mysqli_fetch_array($result);
      
     ?> 
      <h2><center>Welcome, <?php echo $row['Employee_Username']; ?> </center></h2>
      <table class="profileform">
        <tr>
          <td>First Name</td>
          <td><?php echo $row['Employee_Firstname']; ?></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td><?php echo $row['Employee_Lastname']; ?></td>
        </tr>
        <tr>
          <td>Email</td>
          <td><?php echo $row['email']; ?></td>
        </tr>
        <tr>
          <td>Address</td>
          <td><?php echo $row['Employee_Address']; ?></td>
        </tr>
        <tr>
          <td>Contact Number</td>
          <td><?php echo $row['Employee_ContactNumber']; ?></td>
        </tr>
        <tr>
          <td>Department</td>
          <td><?php echo $row['Employee_Department']; ?></td>
        </tr>
      </table>
    </div>

  </body>
</html>



<style type="text/css">
body{
  background-color: white;
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

a:hover{
  background:  #1ca7ec;
  color: white;
  transition: .5s;
  text-decoration: none;
}

.checkbtn{
  font-size: 30px;
  color: white;
  float: right;
  line-height: 80px;
  margin-right: 40px;
  cursor: pointer;
  display: none;
}

#check{
  display: none;
}

@media (max-width: 952px){
  label.logo{
    font-size: 30px;
    padding-left: 50px;
  }

  nav ul li a{
    font-size: 16px;
  }
}

@media (max-width: 858px){
    .checkbtn{
    display: block;
  }

  ul{
    position: fixed;
    width: 100%;
    height: 100vh;
    top: 80px;
    left: -100%;
    text-align: center;
    transition: all .5s;
  }

  nav ul li{
    display: block;
    margin: 50px 0;
    line-height: 30px;
  }

  nav ul li a{
    font-size: 20px;
  }

  a:hover,a.active{
    background: none;
    color:  #021B79;
  }

  #check:checked ~ ul{
    left: 0;
  }
}

button[name=Edit]{
  width: 220px;
  height: 30px;
  border: none;
  color: white;
  margin-top: 14px;
  padding: 5px 5px;
  border-radius: 5px;
  box-sizing: border-box;
  background-color: #418ac8;
  box-shadow: 0px 1px 0px 0px #171617;
  font-family: 'Quicksand', sans-serif;
}

button[name=Edit]:hover {
  background-color: #296d98;
}

button[name=Cancel]{
  width: 220px;
  height: 30px;
  border: none;
  color: white;
  margin-top: 10px;
  padding: 5px 5px;
  border-radius: 5px;
  box-sizing: border-box;
  background-color: #d1403f;
  box-shadow: 0px 1px 0px 0px #171617;
  font-family: 'Quicksand', sans-serif;
}

button[name=Cancel]:hover {
  background-color: #a82928;
}

table{
  margin-left: 10px;
  margin-right: auto;
  margin-top: 30px;
  float: left;
}

th{
  padding: 5px 25px 5px 5px;
  font-family: 'Titillium Web', sans-serif;
  font-size: 18px;
  font-weight: bold;
  text-align: right;
}

td{
  padding-right: 20px;
  padding-left: 20px;
  padding-bottom: 20px;
}

.forms{
  width: 220px;
  height: 420px;
  border-radius: 20px;
  background-color: white;
  box-shadow: 1px 1px 5px -1px #296d98;
}

.forms th{
  text-align: left;
}

.shortforms{
  width: 220px;
  height: 200px;
  border-radius: 20px;
  background-color: white;
  box-shadow: 1px 1px 5px -1px #296d98;
}

h3{
  font-family: 'Quicksand', sans-serif;
  background-color: #296d98;
  padding: 10px 10px;
  color: white;
  border-radius: 15px 15px 0px 0px;
}

.profile{
  margin-top: 10px;
  margin-left: auto;
  margin-right: 30px;
  float: right;
  width: 265px;
  height: 500px;
  background-color: white;
  box-shadow: 0px 0px 2px 2px #296D98;
}

h2{
  font-family: 'Roboto Slab', serif;
  padding: 10px 10px;
  margin-top: 0px;
  color: white;
  background-color: #296d98;
}

.insidetableproducts{
  width: 100px;
  font-family: 'Quicksand', sans-serif;
  margin-top: 3px;
  margin-left: auto;
  margin-right: auto;
  overflow-y: auto;
  overflow-x: hidden;
}

.insidetableproductsTD{
  padding-left: 0px;
  padding-right: 30px;
  text-align: center;
}

.insidetableproducts th{
  font-family: 'Quicksand', sans-serif;
  font-size: 16px;
  padding-left: 20px;
  padding-right: 0px;
}

.insidetableproducts td{
  padding-right: 10px;
  padding-bottom: 10px;
  text-align: left;
}

.insidetableproducts td:nth-child(1){
  font-weight: bold;
  font-size: 16px;
}

.insidetableproducts td:nth-child(2){
  font-size: 15px;
}

.insidetable{
  font-family: 'Quicksand', sans-serif;
  margin-top: 3px;
  margin-left: auto;
  margin-right: auto;
  overflow-y: auto;
  overflow-x: hidden;
}

.insidetable th{
  font-family: 'Quicksand', sans-serif;
  font-size: 16px;
}

.insidetable td{
  padding-bottom: 10px;
  text-align: left;
}

.insidetable td:nth-child(1){
  font-weight: bold;
  font-size: 16px;
}

.insidetable td:nth-child(2){
  font-size: 15px;
}

.profileform{
  font-family: 'Quicksand', sans-serif;
  margin-top: -10px;
  margin-left: auto;
  margin-right: auto;
  width: 100%;
  height: 300px;
  border-collapse: collapse;
  table-layout: fixed;
  word-wrap: break-word;
  overflow-y: auto;
  overflow-x: hidden;
}

.profileform td{
  padding-top: 10px;
  padding-bottom: 10px;
  padding-left: 10px;
  vertical-align: top;
  text-align: left;
  /*border: 1px solid blue;*/
}

.profileform td:nth-child(1){
  font-weight: bold;
  font-size: 14px;
  width: 120px;
  padding-right: 0px;
}

.profileform td:nth-child(2){
  padding-right: 10px;
  font-size: 15px;
}

</style>