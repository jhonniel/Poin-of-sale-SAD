
<?php include ('db_connect.php');
 ?>

<!DOCTYPE html>
<html>
<head>
  <title>Customer</title>
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
      <li class="mains"><a class="active" href="CustomerSalesDept.php">Customer</a></li>
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

  <div class="bodyform">

    <div class="forsearch">
      <form method="POST">
      <button name="search" type="submit"><i class="fa fa-search"></i></button>
      <input type="text" name="searching" placeholder="Search...">
      </form>
    </div>


    <div class="left">

      <div class="inputs">
         <h2 style="text-align: center; margin-top: -5px;
          ">Customer</h2><br>
        <form method="POST" action="Process.php">
          <p class="label-txt">First Name</p>
            <input type="text" name='cname1' class="input" required>
          <br><br>
          <p class="label-txt">Last Name</p>
            <input type="text" name='lname' class="input" required>
          <br><br>
          <p class="label-txt">Age</p>
            <input type="number" name='age' class="input" required>
          <br><br>
          <p class="label-txt">Address</p>
            <input type="text" name='address' class="input" required>
          <br><br>
          <p class="label-txt">Contact Numer</p>
            <input type="number" name='cnum' class="input" required>
          <br><br>
          <p class="label-txt">Type</p>
          <select class="input" name="type">
            <option disabled selected>Select</option>
              <?php
              
                  $records = mysqli_query($conn, "SELECT Current_Type From customertype ");  

                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['Current_Type'] ."'>" .$data['Current_Type'] ."</option>";
                  } 
              ?> 
            <!--
            <option value="Online Customer">Online Customer</option>
            <option value="Regular">Regular</option> -->
          </select>
              <br>
              <br>
          <button name='add3'>Add Customer</button><br>
        </form>
      </div>
    </div>

    <?php 
   include ('db_connect.php'); 

       if(isset($_POST['search'])){
         $Search = mysqli_real_escape_string($conn,$_POST['searching']);
     
      $sql="SELECT * FROM customer WHERE 
      firstname lIKE '%$Search%' OR
      lastname lIKE '%$Search%' OR
      age lIKE '%$Search%' OR
      address lIKE '%$Search%' OR
      contact_number lIKE '%$Search%' OR
      type lIKE '%$Search%' OR
      status lIKE '%$Search%'";
      $result =$conn -> query($sql);

      
      ?>
    
    <div class="right">
    <table> 
    <thead> 
          <th>ID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Age</th>
          <th>Address</th>
          <th>Contact Number</th>
          <th>Type</th>
          <th>Status</th>
          <th>Action</th>

      </thead>
          <tbody>
          <?php  if ($result -> num_rows == 0) {?> <td style="
          font-family: 'Quicksand', sans-serif; color: gray; text-align: center;" colspan="9"> <?php echo 'No records found.';  ?></td> <?php }else{
            while ( $row = $result -> fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row['id'];  ?></td>
              <td><?php echo $row['firstname'];  ?></td>
              <td><?php echo $row['lastname'];  ?></td>
              <td><?php echo $row['age'];  ?></td>
              <td><?php echo $row['address'];  ?></td>
              <td><?php echo $row['contact_number'];  ?></td>
              <td><?php echo $row['type'];  ?></td>
              <td><?php echo $row['status'];  ?></td>
              
              <td><a  href='CustomerEditSalesDept.php?edit=<?php echo $row['id']; ?>'class="btn btn-primary a-btn-slide-text" >
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  <span>Edit</span></a></td> 
            </tr>
          </tbody>
        <?php  }
      }
      }?>
    </table>

    </div>
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

.forsearch{
  margin-top: 20px;
  float: right;
  width: 850px;
  height: 40px;
  margin-left: auto;
  margin-right: auto;
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

input[name=searching]{
  width: 220px;
  height: 40px;
  float: left; 
  padding: 10px;
  border-radius: 3px;
  border: 1px solid #296d98;
  font-family: 'Quicksand', sans-serif;
  font-size: 15px;
  position: relative;
  float: right;
}

input[type=text]{
  width: 220px;
  padding: 5px 5px;
  border: 1px solid #296d98;
  border-radius: 5px;
  box-sizing: border-box;
}

input[type=number]{
  width: 220px;
  padding: 5px 5px;
  border: 1px solid #296d98;
  border-radius: 5px;
  box-sizing: border-box;
}

select[name=type]{
  width: 220px;
  height: 36px;
  border: 1px solid #296d98;
  border-radius: 5px;"
}

button[name=add3]{
  width: 220px;
  height: 40px;
  margin-top: 20px;
  border:none;
  border-radius: 5px;
  background-color: #418ac8;
  color: white;
  box-shadow: 0px 1px 0px 0px #171617;
}
button[name=add3]:hover {
  background-color: #296d98;
}

.left {
    display: block;
    width: 315px;
    height: 530px;
    margin-top: 20px;
    float: left;
    overflow-y: auto;
    overflow-x: hidden;
    box-shadow: 1px 1px 5px -1px #296d98;
  } 

  .right { 
    margin-top: 30px;
    height: 460px;
    width: 850px;
    border: 3px solid #296d98;
    float: right;
    overflow-y: auto;
    overflow-x: auto;
  }

  .inputs {
    font-family: 'Quicksand', sans-serif;
    font-size: 15px;
    background-color: #a9cfe7;
    padding: 40px;  
  }  
}     

table{
  width: 850px;
  text-align: left;
  background-color: white;
}


td, th {
  text-align: left;
  font-family: 'Quicksand', sans-serif;
}


td{
  border: 1px solid #296d98;
  font-size: 15px;
  padding: 5px;
}

th{
  width: 850px;
  padding: 10px;
  text-align: center;
  font-size: 15px;
  font-weight: bold;
  color: white;
  background-color: #296d98;
  border-left-color: white;
  border-bottom-color: white;
  position: sticky;
  top: 0;
  z-index: 1;
}

tbody:nth-child(even) {
  background-color: #a9cfe7; 
}


a.btn:hover {
-webkit-transform: scale(1.1);
}
a.btn {
  z-index: -1;
 -webkit-transform: scale(0.8);
 -webkit-transition-duration: 0.5s;
 
}

</style>