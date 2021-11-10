<?php
include 'db_connect.php';
							 
			if (isset($_POST['add9'])){

            $supplier_name=$_POST['sname'];
            $productname = $_POST['pname'];
         	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $material = $_POST['material'];
            $color = $_POST['color'];
            $weight= $_POST['weight'];
            $description = $_POST['description'];
            $status = "Active";

            
            $sqlinsert="INSERT INTO inventory(supplier_name,product_name,IMAGE,quantity,price,category,material,color,weight,description,status) VALUES 
            ('$supplier_name','$productname','$file','$quantity','$price','$category','$material','$color','$weight','$description','$status')";
            mysqli_query($conn,$sqlinsert);
            alert("Product successfully added!");
            header("refresh:1; url=Products.php?");

					
						
					} 

				  if(isset($_GET['del'])) {
				  	$id = $_GET['del'];

				  	mysqli_query($conn, "DELETE FROM inventory WHERE id=$id");
				  	alert("Product successfully deleted!");
				  	header("refresh:1; url=Products.php?");
				  }



				//supplier....  


				if(isset($_POST['add1'])){

					$supplier_name1=$_POST['sname1']; 
					$address=$_POST['address'];  
					$cnum=$_POST['cnum'];  
					$status = "Active";
					
					
					$sql="INSERT INTO supplier(name,address,contact_number,status)
						VALUES('$supplier_name1','$address','$cnum','$status')";
						$query=mysqli_query($conn,$sql);
            		alert("Supplier successfully added!");
					header("refresh:1; url=Supplier.php?"); 
				} 

				
				  if(isset($_GET['del5'])) {
				  	$id = $_GET['del5'];

				  	mysqli_query($conn, "DELETE FROM supplier WHERE id=$id");
				  	alert("Supplier successfully deleted!");
				  	header("refresh:1; url=Supplier.php?");

				  }
				  //CART

				  if(isset($_POST['cancel'])){
				  	$id = $_POST['cancel'];

				  	mysqli_query($conn, "DELETE FROM cart WHERE id=$id");
				  	alert("Product successfully removed!");
				  	header("refresh:1; url=RegularCart.php?"); 
				  }

				  //customer...

				  if(isset($_POST['add3'])){

					$cname1=$_POST['cname1']; 
					$lname=$_POST['lname'];  
					$age=$_POST['age'];  
					$address=$_POST['address'];
					$contactnumber=$_POST['cnum'];
					$type=$_POST['type'];
					$status = "Active";      
					

					$sql="INSERT INTO customer(firstname,lastname,age,address,contact_number,type,status)
						values('$cname1','$lname','$age','$address','$contactnumber','$type','$status')";
						$query=mysqli_query($conn,$sql);
            		alert("Customer successfully added!");
					header("refresh:1; url=Customer.php?"); 
				}

				
				  if(isset($_GET['del2'])) {
				  	$id = $_GET['del2'];

				  	mysqli_query($conn, "DELETE FROM customer WHERE id=$id");
				  	alert("Product successfully deleted!");
					header("refresh:1; url=Customer.php?"); 


				  }

				  if (isset($_POST['AddCustomerSalesDept'])) {
				  	$cname1=$_POST['cname1']; 
					$lname=$_POST['lname'];  
					$age=$_POST['age'];  
					$address=$_POST['address'];
					$contactnumber=$_POST['cnum'];
					$type=$_POST['type'];
					$status = "Active";      
					

					$sql="INSERT INTO customer(firstname,lastname,age,address,contact_number,type,status)
						values('$cname1','$lname','$age','$address','$contactnumber','$type','$status')";
						$query=mysqli_query($conn,$sql);
            		alert("Customer successfully added!");
					header("refresh:1; url=CustomerSalesDept.php?"); 
				  }

				  //adding of admins

				  if(isset($_POST['add'])){

					$fname=$_POST['firstname']; 
					$lname=$_POST['lastname'];
					$address2=$_POST['address1'];  
					$age1=$_POST['age1'];   

					$sql="insert into admins(name,lastname,address,age)
						values('$fname','$lname','$address2','$age1')";
						$query=mysqli_query($conn,$sql);
					
} 
				 if(isset($_GET['del6'])) {
				  	$id = $_GET['del6'];

				  	mysqli_query($conn, "DELETE FROM admins WHERE id=$id");
				  	$_SESSION['msg'] = "Product Deleted";


				  }

				  //registration form
				  if(isset($_POST['signup'])){

						$Users=$_POST['user'];  
						$Email=$_POST['email'];
						$Password1=$_POST['password1'];
						$Password2=$_POST['password2'];
						$birthdate=$_POST['bday'];
						$phonenumber=$_POST['pnumber'];
						$address=$_POST['stAddress'];
						$city=$_POST['city'];
						$zipcode=$_POST['zip'];

					//check user if existed
						$sqlsearch1 = "SELECT * FROM customer WHERE USERNAME = '$Users' ";
						$sqlsearch2 = "SELECT * FROM customer WHERE EMAIL = '$Email' ";
						$resultusername = mysqli_query($conn, $sqlsearch1);
						$resultemail = mysqli_query($conn, $sqlsearch2);
						$countuser = mysqli_num_rows($resultusername);
						$countemail = mysqli_num_rows($resultemail);
						$pwd=md5($Password1); 
					// if not existed execute the code below

					//admin log in
					//---------
						if(strlen($Password1) < 5){
							echo '<script>alert("password must be at least 5 characters")</script>';
							echo '<script>window.location="Registration.php"</script>'; 
						}
						elseif ($Password1 != $Password2) {
							echo '<script>alert("password Dont Match! ")</script>';
							echo '<script>window.location="Registration.php"</script>'; 
						}
						elseif ($countuser==1) {
							echo '<script>alert("Username Already Exist")</script>';
							echo '<script>window.location="Registration.php"</script>'; 
						}
						elseif ($countemail==1) {
							echo '<script>alert("Email Already exist")</script>';
							echo '<script>window.location="Registration.php"</script>'; 
						}	

						
						else {
							$sql="insert into customer(USERNAME,EMAIL,PASSWORD,BIRTHDATE,PHONE_NUMBER,ST_ADDRESS,CITY,ZIPCODE)
							values('$Users','$Email','$pwd','$birthdate','$phonenumber','$address','$city','$zipcode')";
							$query=mysqli_query($conn,$sql);
							echo '<script>alert("Registration Successfully")</script>';
							echo '<script>window.location="logpage.php"</script>'; 
						}
					}

					//sign in

					if(isset($_POST['signin'])){

							$username = $_POST['username'];
							$password =$_POST['password'];
							$pwd=md5($password);
							$_SESSION['sessionUser']=$username;


							$query = "SELECT * FROM customer WHERE USERNAME = '$username' AND PASSWORD = '$pwd' ";
							$search=mysqli_query($conn,$query);
							$result = mysqli_num_rows($search);
							
						//log in for admin
							$queryadmin = "SELECT * FROM admin WHERE USERNAME = 'Admin' AND PASSWORD = '$pwd' ";
							$searchadmin=mysqli_query($conn,$queryadmin);
							$r_admin=mysqli_num_rows($searchadmin);

						//---------------


							if($r_admin==1){
								session_start();
								echo '<script>alert("Welcome Admin")</script>';
								echo '<script>window.location="Dashboard.php"</script>'; 
								
							}
							
							if($result==1){
								echo '<script>alert("Welcome!")</script>';
								echo '<script>window.location="DashboardEmployee.php"</script>'; 
							}if($result==0){
							echo '<script>alert("Invalid Username Or Password")</script>';

							}
			}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
			?>