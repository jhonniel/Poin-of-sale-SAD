 
<?php include ('db_connect.php'); 
if(isset($_GET['edit'])){
              $id = $_GET['edit'];
              $edit_state = true;
              $rec = mysqli_query($conn, "SELECT * FROM supplier WHERE id='$id'");
              $record= mysqli_fetch_array($rec);
              $supname = $record['name'];
              $productname =$record['address'];
              $quantity= $record['contact_number']; 
              $status = $record['status'];
              $id = $record['id'];
            }  
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
} 

?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Supplier</title>
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
    <li><a class="" href="Inventory.php">Inventory</a></li>
    <li><a href="Products.php">Products</a></li>
      <li><a class="" href="Report.php">Reports</a></li>
    <li><a>More</a>
      <ul>
        <li class="more"><a class="active" href="Supplier.php">Supplier</a></li>
        <li class="more"><a class="" href="Customer.php">Customer</a></li>
        <li class="more"><a class="" href="Employee.php">Employee</a></li>
        <li class="more"><a href="Registration.php">Register</a></li>
		<li class="more"><a href="DATABASES.php">DATABASES</a></li>
        <li class="more"><a class="" href="Login.php">Log-out</a></li>
      </ul>
    </li>
  </ul>
</nav>
  
  <div class="bodyform">

    <div class="forsearch">
      <form action="SearchSupplier.php" method="POST">
      <button name="search" type="submit"><i class="fa fa-search"></i></button>
      <input type="text" name="searching" placeholder="Search...">
      </form>
    </div>

    <div class="left">
      <div class="inputs">
        <h2 style="text-align: center;margin-top: -15px; 
        ">Supplier</h2><br>
        <form method="POST" action="SupplierEdit.php">
          <p class="label-txt">Supplier Name</p>
             <input type="text" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"name="name" value="<?php if(isset($record)) echo $record['name'];?>" required>
            <br><br>
          <p class="label-txt">Address</p>
           <input type="text" name="address" value="<?php if(isset($record)) echo $record['address'];?>" required>  
            <br><br>
          <p class="label-txt">Contact Number</p>
           <input type="Number" name="contact_number" value="<?php if(isset($record)) echo $record['contact_number'];?>" required> 
          <br>
          <br>
          <p class="label-txt">Status</p>
            <select name="status" required>
                <option><?php if(isset($record)) echo $record['status'];?></option>
              <?php
              
                  $records = mysqli_query($conn, "SELECT Current_Status From status ");  

                  while($data = mysqli_fetch_array($records))
                  {
                      echo "<option value='". $data['Current_Status'] ."'>" .$data['Current_Status'] ."</option>";
                  } 
              ?>  </select>
            <input type="text" name="id" value="<?php echo $id;?>" style="display:none">
           <br>
           <br>     
          <button type='submit' name="update" >Update</button>
            <button class="submit" type="button" name="cancel"  onclick="window.location='Supplier.php?'">Cancel</button>
        </div>
        </form>
        <?php 
              if (isset($_POST['update'])){
                      $idupdate=$_POST['id'];
                      $supname=$_POST['name'];
                      $address = $_POST['address'];
                      $contact = $_POST['contact_number'];
                      $status = $_POST['status'];
                      
                      $sqlupdate="UPDATE supplier SET name='$supname', address='$address', contact_number='$contact', status ='$status' WHERE id='$idupdate'";
                      mysqli_query($conn,$sqlupdate);
                      alert("Supplier successfully updated!");
                      header("refresh:1; url=Supplier.php?"); 
                     
                    } ?> 
    </div>

        <div class="right">

<table>     
    <thead>
          <th><b>ID</b></th>
          <th><b>Supplier Name</b></th>
          <th><b>Address</b></th>
          <th><b>Contact Number</b></th>
          <th><b>Status</b></th>
          <th colspan="2"><b>Action</b></th>
      </thead>

      <?php 
      session_start();
      $sql="SELECT * FROM supplier ORDER BY name DESC";

      $result =$conn -> query($sql);

      if ($result -> num_rows > 0) {
        while ( $row = $result -> fetch_assoc()) {

          ?>

          <tbody>

            <tr>
              <td><?php echo $row['id'];  ?></td>
              <td><?php echo $row['name'];  ?></td>
              <td><?php echo $row['address'];  ?></td>
              <td><?php echo $row['contact_number'];  ?></td>
              <td><?php echo $row['status'];  ?></td>

              <td><a href='SupplierEdit.php?edit=<?php echo $row['id']; ?>'class="btn btn-primary a-btn-slide-text" disabled>
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  <span>Edit</span></a></td>

              <td><a href="Process.php?del5=<?php echo $row['id']; ?> "class="btn btn-primary a-btn-slide-text" style="background-color: #e8171f; border:none;" disabled>
                     <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                  <span>Delete</span></a></td>
                    
            </tr>
          </tbody>

        <?php  }
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

input[type=text],input[type=number]{
  width: 220px;
  padding: 5px 5px;
  border: 1px solid #296d98;
  border-radius: 5px;
  box-sizing: border-box;
}

select[name=status]{
  width: 220px;
  height: 36px;
  border: 1px solid #296d98;
  border-radius: 5px;"
}

button[name=update]{
  width: 220px;
  height: 40px;
  margin-top: 20px;
  border:none;
  border-radius: 5px;
  background-color: #418ac8;
  color: white;
  box-shadow: 0px 1px 0px 0px #171617;
}

button[name=update]:hover {
  background-color: #296d98;
}

button[name=cancel]{
  width: 220px;
  height: 40px;
  border: none;
  color: white;
  margin-top: 10px;
  padding: 5px 5px;
  border-radius: 5px;
  box-sizing: border-box;
  background-color: #d1403f;
  box-shadow: 0px 1px 0px 0px #171617;
}

button[name=cancel]:hover {
  background-color: #a82928;
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
    overflow-x: hidden;
  }

  .inputs {
      padding: 40px;
      font-size: 15px;
      background-color: #a9cfe7;
      font-family: 'Quicksand', sans-serif;
      box-shadow: 1px 1px 5px -1px #296d98;
  }  
}

table{
  width: 850px;
  text-align: left;
  background-color: white;
}

th, td {
  padding: 10px;
  text-align: left;
  font-family: 'Quicksand', sans-serif;
}

td{
  border: 1px solid #296d98;
  font-size: 15px;
}

th{
  width: 850px;
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