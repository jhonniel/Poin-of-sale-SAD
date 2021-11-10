
<?php
$conn = mysqli_connect("localhost","root","","xytcompany");
if (! empty($_FILES)) {
    // Validating SQL file type by extensions
    if (! in_array(strtolower(pathinfo($_FILES["backup_file"]["name"], PATHINFO_EXTENSION)), array(
        "sql"
    ))) {
        $response = array(
            "type" => "error",
            "message" => "Invalid File Type"
        );
    } else {
        if (is_uploaded_file($_FILES["backup_file"]["tmp_name"])) {
            move_uploaded_file($_FILES["backup_file"]["tmp_name"], $_FILES["backup_file"]["name"]);
            $response = restoreMysqlDB($_FILES["backup_file"]["name"], $conn);
        }
    }
}

function restoreMysqlDB($filePath, $conn)
{
    $sql = '';
    $error = '';
    
    if (file_exists($filePath)) {
        $lines = file($filePath);
        
        foreach ($lines as $line) {
            
            // Ignoring comments from the SQL script
            if (substr($line, 0, 2) == '--' || $line == '') {
                continue;
            }
            
            $sql .= $line;
            
            if (substr(trim($line), - 1, 1) == ';') {
                $result = mysqli_query($conn, $sql);
                if (! $result) {
                    $error .= mysqli_error($conn) . "\n";
                }
                $sql = '';
            }
        } // end foreach
        
        if ($error) {
            $response = array(
                "type" => "error",
                "message" => $error
            );
        } else {
            $response = array(
                "type" => "success",
                "message" => "Database Restore Completed Successfully."
            );
        }
        exec('rm ' . $filePath);
    } // end if file exists
    
    return $response;
}


?>
<html>
<head>
<title>Restore Database</title>
<style>
body {
	background: white;
	font-family: "Segoe UI", Optima, Helvetica, Arial, sans-serif;
}

h2 {
    margin-top: 50px;
}


#frm-restore {
	background:  #296d98;
	justify-content: center;
	padding: 50px;
	border-radius: 2px;
	border: none;
    width: 300px;
    border-radius: 20px;
}

.form-row {
	margin-bottom: 20px;
    
}

.input-file {
	background: #FFF;
	padding: 10px;
	margin-top: 5px;
	border-radius: 2px;
}

.btn-action {
	background: #333;
	border: 0;
	padding: 10px 40px;
	color: #FFF;
	border-radius: 2px;
}

.response {
	padding: 10px;
	margin-bottom: 20px;
    border-radius: 2px;
}

.error {
    background: #fbd3d3;
    border: #efc7c7 1px solid;
}

.success {
    background: #ffe6cc;
    border: #bee2d6 1px solid;
}
</style>
</head>
<body>
    <center><h2>Restore Database</h2>
<?php
if (! empty($response)) {
    ?>
<div class="response <?php echo $response["type"]; ?>">
<?php echo nl2br($response["message"]); ?>
</div>
<?php
}
?>
    <form method="post" action="" enctype="multipart/form-data"
        id="frm-restore">
        <div class="form-row">
            <div style="color: white;">Choose Backup File</div>
            <div>
                <input type="file" name="backup_file" class="input-file" />
            </div>
        </div>
        <div>
            <input type="submit" name="restore" value="Restore"
                class="btn-action" />
        </div>
    </form>
	<form method="get" action="Dashboard.php">
    <button type="submit">Back to Home</button></center>
</form>
</body>
</html>