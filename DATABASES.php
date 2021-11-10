
<?php include ('db_connect.php');
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Database</title>
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
        <li><a href="Report.php">Reports</a></li>
        <li><a>More</a>
          <ul>
            <li class="more"><a href="Supplier.php">Supplier</a></li>
            <li class="more"><a href="Customer.php">Customer</a></li>
            <li class="more"><a href="Employee.php">Employee</a></li>
            <li class="more"><a href="Registration.php">Register</a></li>
            <li class="more"><a class="active" href="DATABASES.php">Databases</a></li>
            <li class="more"><a href="Login.php">Log-out</a></li>
          </ul>
        </li>
      </ul>
  </nav>

 </div>
 
				<div>
				<button class="button" name="Backup" type="submit" value="submit"><a href="DbBackup.php">BACKUP DATABASE</a></button>
				<button class="button" name="Restore" type="submit" value="submit"><a href="RestoreDB.php">RESTORE DATABASE</a></button>
				</div>
 
   
  </body>
</html>


<style type="text/css">
 nav{
  background: #296d98;
  height: 80px;
  width: 100%;
}

.bodyform{
  margin-left: auto;
  margin-right: auto;
  height: 570px;
  width: 1200px;
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

button {
	border-radius: 20px;
	border: none;
	background-color: #296d98;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
	margin-top: 100px;
	margin-left:40%;
}

button a {
  color: white;
}

button[name=Cancel] {

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
  text-decoration: none;
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

</style>