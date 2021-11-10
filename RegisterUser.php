
<?php


if(isset($_POST['submit'])){
    
    include 'db_connect.php';

    $firstname = mysqli_real_escape_string($conn, $_POST['fname']); 
    $lastname = mysqli_real_escape_string($conn, $_POST['lname']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 
    $username = mysqli_real_escape_string($conn, $_POST['username']); 
    $pwd1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $pwd2 = mysqli_real_escape_string($conn, $_POST['pass2']);
    $Status = "Active";
    $Age = 0;
    $ContactNo = 0;
    $Address = "";
    $type = mysqli_real_escape_string($conn, $_POST['type']);


    $AdminFirstName = mysqli_real_escape_string($conn, $_POST['fname']);
    $AdminLastName = mysqli_real_escape_string($conn, $_POST['lname']);
    $AdminUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $AdminEmail = mysqli_real_escape_string($conn, $_POST['email']);
    $AdminPassword1 = mysqli_real_escape_string($conn, $_POST['pass1']);
    $AdminPassword2 = mysqli_real_escape_string($conn, $_POST['pass2']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $AdminContactNumber = 0;

    if(empty($username) || empty($email) || empty($firstname) || empty($lastname) || empty($pwd1) || empty($pwd2) || empty($type)){
        header("refresh:1; url=CreateUser.php?addaccount=empty");
        alert("Please fill in all the fields!");
        header("refresh:1; url=Registration.php");
    }else{
        if(!preg_match("/^[a-zA-Z\xbf._-]*$/", $firstname) || !preg_match("/^[a-zA-Z\xbf._-]*$/", $lastname)){
            header("refresh:1; url=RegisterUser.php?addaccount=invalid");
            alert("Invalid characters!");
            header("refresh:1; url=Registration.php");
        }
         elseif ($pwd1 != $pwd2) {
            header("refresh:1; url=RegisterUser.php?addaccount=invalid");
            alert("Password does not match!");
            header("refresh:1; url=Registration.php");

        }elseif ($type="Admin") {
            $sql = "SELECT * FROM admin WHERE Admin_Username = '$AdminUsername'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if ($resultCheck > 0) {
                header("refresh:1; url=RegisterUser.php?addaccount=UsernameTaken");
                alert("Username is taken already!");
                header("refresh:1; url=Registration.php");
            }else{
                $hashedPwd = md5($AdminPassword1);
                $sql = "INSERT INTO admin(Admin_Username,Admin_Email, Admin_Firstname, Admin_Lastname, Admin_ContactNumber,  Admin_Password) 
                VALUES ('$AdminUsername','$AdminEmail','$AdminFirstName', '$AdminLastName','$AdminContactNumber', '$hashedPwd');";

                mysqli_query($conn, $sql);
                header("refresh:1; url=Login.php?username=$username&type=$type");
                alert("Admin added successfully created!");
                exit();
            }

        }else{
            
            $sql = "SELECT * FROM employee WHERE Employee_Username = '$username'";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                header("refresh:1; url=RegisterUser.php?addaccount=UsernameTaken");
                alert("Username is taken already!");
                header("refresh:1; url=Registration.php");

            }else{
                $hashedPwd = md5($pwd1);
                $sql = "INSERT INTO employee (Employee_Username,Employee_Email, Employee_Firstname, Employee_Lastname, Employee_Age, Employee_ContactNumber, Employee_Address, Employee_Password, Employee_Department ,Employee_Status) 
                VALUES ('$username','$email','$firstname', '$lastname','$Age','$ContactNo','$Address', '$hashedPwd', '$type','$Status');";

                mysqli_query($conn, $sql);
                header("refresh:1; url=Login.php?username=$username&type=$type");
                alert("New account successfully created!");
                exit();
            }
        }
    }

}else{
   
    header("Location:Login.php");
    exit();
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>
