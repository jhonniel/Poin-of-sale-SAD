<?php
$con = mysqli_connect("localhost","root","","xytcompany");

$tables = array();
$query = mysqli_query($con, 'SHOW TABLES');
while($row = mysqli_fetch_row($query)){
     $tables[] = $row[0];
}

$result = "";
foreach($tables as $table){
$query = mysqli_query($con, 'SELECT * FROM '.$table);
$num_fields = mysqli_num_fields($query);

$result .= 'DROP TABLE IF EXISTS '.$table.';';
$row2 = mysqli_fetch_row(mysqli_query($con, 'SHOW CREATE TABLE '.$table));
$result .= "\n\n".$row2[1].";\n\n";

for ($i = 0; $i < $num_fields; $i++) {
while($row = mysqli_fetch_row($query)){
   $result .= 'INSERT INTO '.$table.' VALUES(';
     for($j=0; $j<$num_fields; $j++){
       $row[$j] = addslashes($row[$j]);
       $row[$j] = str_replace("\n","\\n",$row[$j]);
       if(isset($row[$j])){
		   $result .= '"'.$row[$j].'"' ; 
		}else{ 
			$result .= '""';
		}
		if($j<($num_fields-1)){ 
			$result .= ',';
		}
    }
   	$result .= ");\n";
}
}
$result .="\n\n";
}

//Create Folder
$folder = 'Backup_Files/';
if (!is_dir($folder))
mkdir($folder, 0777, true);
chmod($folder, 0777);

$date = date('m-d-Y'); 
$filename = $folder."db_backup_".$date; 

$handle = fopen($filename.'.sql','w+');
fwrite($handle,$result);
fclose($handle);
?>

<!DOCTYPE html>
<html>
<head>
<! -- <link type="text/css" rel="stylesheet" href="style.css">
<body style="background-color:#FFFF;">
	<div id="container">
    <table align="center" width="300" border=".5" bordercolor="#0B615E" style="margin-top: 50px;">
	<?php
        echo "<tr><td>  <font color='#296d98' size=4>Database Backed Up Successfully! </font>
</td></tr>";
        echo "<tr><td>Path: ".$filename."</td></tr>";
    ?>
    <tr><td colspan="2" align="center"><a href="Dashboard.php"> Back to Home </td></tr>
    </table>
    </div>
</body>
</html>

