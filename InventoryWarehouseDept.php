<?php include ('db_connect.php'); ?>
 
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Inventory</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@900&family=Quicksand:wght@500&family=Roboto+Slab:wght@500&display=swap">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  </head>

  <body>

  <nav>
    <a class="logo" href="DashboardWarehouseDept.php">XYT Co.</a>
    <ul>
      <li><a href="DashboardWarehouseDept.php">Dashboard</a></li>
      <li><a>Main</a>
        <ul class="main">
          <li class="mains"><a href="ProductsWarehouseDept.php">Products</a></li>
          <li class="mains"><a class="active" href="InventoryWarehouseDept.php">Inventory</a></li>
        </ul>
      </li>
      <li><a href="SupplierWarehouseDept.php">Supplier</a></li>
      <li><a href="Login.php">Logout</a></li>
    </ul>
  </nav>

  <div class="bodyform">

    <div class="forsearch">
      <form action="SearchInventoryWarehouseDept.php" method="POST">
    <button name="search" type="submit"><i class="fa fa-search"></i></button>
    <input type="text" name="searching" placeholder="Search...">
    </div>

    <div class="right">
      <table> 
        <thead>
          <th>ID</th>
          <th>Supplier</th>
          <th>Product</th>
          <th>Image</th>
          <th>Stock</th>
          <th>Price</th>
          <th>Category</th>
          <th>Material</th>
          <th>Color</th>
          <th>Weight</th>
          <th>Description</th>
          <th>Status</th>
        </thead>

        <?php 
        session_start();
        $sql="SELECT * FROM inventory ";
        $result =$conn -> query($sql);

        if ($result -> num_rows > 0){
          while ( $row = $result -> fetch_assoc()) {

            ?>
            <tbody>
              <tr>
                <td><?php echo $row['id'];  ?></td>
                <td><?php echo $row['supplier_name'];  ?></td>
                <td><?php echo $row['product_name'];  ?></td>
                <td> <?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['IMAGE'] ).'  " width ="100"  height ="100"'; ?> </td>
                <td  <?php if ($row['quantity']<=30){?>
                 style = "color:red"
               <?php }  ?> >
                <?php echo $row['quantity'];  ?></td>
                <td><?php echo $row['price'];  ?></td>
                <td><?php echo $row['category'];  ?></td>
                <td><?php echo $row['material'];  ?></td>
                <td><?php echo $row['color'];  ?></td>
                <td><?php echo $row['weight'];  ?></td>
                <td><?php echo $row['description'];  ?></td>
                <td><?php echo $row['status'];  ?></td> 
              </tr>
            </tbody>

          <?php  }
        }else{
        }?>
      </table>
    </div>
  </div>
  </body>
</html>


<style type="text/css">
body{
  font-family: 'Montserrat', sans-serif;
  background-color: white;
}

body{
  height: 900px;
}

.bodyform{
  margin-left: auto;
  margin-right: auto;
}

nav{
  background: #296d98;
  height: 80px;
  width: 100%;
}

a.logo{
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
  width: 135px;
  display: none;
  position: absolute;
  background-color: #296d98;
  margin-left: -30px;
  margin-top: -5px;
  padding-left: 0px;
  text-align: center;
  z-index: 2;
}

.mains{
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

.forsearch{
  margin-top: 30px;
  width: 1200px;
  height: 40px;
  margin-left: auto;
  margin-right: auto;
}

input[name=searching]{
  width: 220px;
  height: 40px;
  float: left; 
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #296d98;
  font-family: 'Quicksand', sans-serif;
  font-size: 15px;
  position: relative;
  float: right;
}

button[name=search]{
  float: right;
  width: 40px; padding: 10px;
  background-color: #296d98;
  color: white;
  cursor: pointer;
  border:none;
  border-radius: 3px;
}

table{
  margin-top: 30px;
  margin-left: auto;
  margin-right: auto;
  display: block;
  width: 1200px;
  height: 600px;
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
  width: 1200px;
  padding: 10px 10px 10px 10px;
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
  z-index: 1;
}

tbody:nth-child(even){
  background-color: #a9cfe7;
}

a.btn:hover{
  -webkit-transform: scale(1.1);
}

a.btn{
  -webkit-transform: scale(0.8);
  -webkit-transition-duration: 0.5s;
}

  </style>

