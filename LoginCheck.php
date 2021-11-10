<?php
session_start();


 include 'db_connect.php';
    $username = $_POST['user'];  
    $password = $_POST['pass'];
   	$Hpassword = md5($password);
    $_SESSION['user'] = $username;

    if(!isset($_SESSION['attempt'])){
            $_SESSION['attempt'] = 0;
        }
      	
        //to prevent from mysqli injection  
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      

        if ($username == "Admin") {
            
            $sql ="SELECT * FROM admin WHERE Admin_Username = '$username'";

            $result = mysqli_query($conn,$sql);  
            $count = mysqli_num_rows($result);  
            $row = mysqli_fetch_array($result); 

            if ($count > 0) {

                 $hashpwd = $row['Admin_Password'];
                 if ($Hpassword != $row['Admin_Password'] ) {
            
                    alert("Error! Username & Password do not match!");
                    header("refresh:1; url=Login.php? incorrect");

                    }else{
                        header("refresh:1; url=Dashboard.php?");
                    }
             } 

            }else{

                $sql = "SELECT * FROM employee WHERE Employee_Username = '$username'";  

                $result = mysqli_query($conn,$sql);  
                $count = mysqli_num_rows($result);  
                $row = mysqli_fetch_array($result);  

                if ($count > 0) {

                    $type = $row['Employee_Department'];
                    $hashpwd = $row['Employee_Password'];

                    if ($Hpassword != $row['Employee_Password'] ) {

                        alert("Error! Username & Password do not match!");
                        header("refresh:1; url=Login.php? incorrect");

                         $_SESSION['attempt'] += 1;

                        if ($_SESSION['attempt'] == 3) {
                            alert("You have reach the maximum attempts! Your account will be lock, please contact admin.");

                            $sqlupdate = "UPDATE employee SET Employee_Status = 'Inactive' WHERE Employee_Username =  '$username' ";
                            mysqli_query($conn,$sqlupdate);
                             unset($_SESSION['attempt']);
                        }

                   
                    }else if ($row["Employee_Status"] == 'Inactive') {

                        alert("Your Account has been locked, please contact admin.");
                        header("refresh:1; url=Login.php? incorrect");
                         
                    }else{

                    if($type == "Sales Department"){
                        header("refresh:1; url=DashboardSalesDept.php?");
                         unset($_SESSION['attempt']);
                    }else if($type == "Logistic Department"){
                        header("refresh:1; url=DashboardLogisticsDept.php?");
                         unset($_SESSION['attempt']);
                    }else if($type == "Purchasing Department"){
                        header("refresh:1; url=DashboardPurchasingDept.php?");
                         unset($_SESSION['attempt']);
                    }else if($type == "Accounting Department"){
                        header("refresh:1; url=DashboardAccountingDept.php?");
                         unset($_SESSION['attempt']);
                    }else{
                        header("refresh:1; url=DashboardWarehouseDept.php?");
                         unset($_SESSION['attempt']);
                    }

                }
     }else{
            alert("Invalid! Login details do not exist!");
            header("refresh:1; url=Login.php? incorrect");
            }   
    }







//         $sql = "SELECT * FROM employee WHERE Employee_Username = '$username'";  


//         $result = mysqli_query($conn,$sql);  
//         $count = mysqli_num_rows($result);  
//         $row = mysqli_fetch_array($result);  

//         if ($count > 0) {
		
//         $type = $row['Employee_Department'];
//        	$hashpwd = $row['Employee_Password'];

//         	if ($Hpassword != $row['Employee_Password'] ) {
        	
//             alert("Error! Username & Password do not match!");
//         	header("refresh:1; url=Login.php? incorrect");

//         	}else{
//         		if ($username == "Admin"){
//                     header("refresh:1; url=Dashboard.php?");

//                 }else if($type == "Sales Department"){
//                      header("refresh:1; url=DashboardSalesDept.php?");

//                 }else if($type == "Logistic Department"){
//                     header("refresh:1; url=DashboardLogisticsDept.php?");

//                 }else if($type == "Purchasing Department"){
//                     header("refresh:1; url=DashboardPurchasingDept.php?");

//                 }else if($type == "Accounting Department"){
//                     header("refresh:1; url=DashboardAccountingDept.php?");

//                 }else{
//                     header("refresh:1; url=DashboardWarehouseDept.php?");
//                 }
//         }     
// }else{
//     alert("Invalid! Login details do not exist!");
// 	header("refresh:1; url=Login.php? incorrect");
// }

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
?>  