<?php
include('db_connect.php');

require('fpdf/fpdf.php');

function currentDateTime()
{
    $date = new DateTime("now", new DateTimeZone('Asia/Manila'));
    $date = $date->format('Y-m-d H:i:s');
    return $date;
}

$sql = "SELECT * FROM inventory";
$result = $conn -> query($sql);

$pdf = new FPDF('p','mm','A4');
$pdf->AddPage();

$pdf->Image('logo1.jpg',15,10,20,20);
$pdf->setTitle('XYT Co.', false);


$pdf->SetFont('times','B',30);
$pdf->SetFillColor(41,109,152);
$pdf->SetDrawColor(50,50,100);
$pdf->Cell(155,15,"XYT COMPANY",0,1,'C');
$pdf->Ln(20);

$pdf->setTextColor(255,255,255);
$pdf->SetFont('Times','B',14);

$pdf->Cell(190,15,'Inventory Report',0,1,'C',true);
$pdf->SetFont('Times','',12);
$pdf->Cell(30,10,"Product ID",1,0,'C',true);
$pdf->Cell(40,10,'Description',1,0,'C',true);
$pdf->Cell(35,10,'Quantity Left',1,0,'C',true);
$pdf->Cell(20,10,'Sold',1,0,'C',true);
$pdf->Cell(35,10,'Cost per Item',1,0,'C',true);
$pdf->Cell(30,10,'Line Total',1,0,'C',true);
$pdf->Ln(10);
	
	$grandtotal = 0 ;
	$quantitytotal = 0;  
	if ($result -> num_rows > 0) {
		while ($row = $result -> fetch_assoc()) {

			
		$linetotal = $row["price"]*$row["quantity"];

		$pdf->setTextColor(0,0,0);
		$pdf->Cell(30,10,$row["id"],1,0,'C');
		$pdf->Cell(40,10,$row["product_name"],1,0);
		$pdf->Cell(35,10,$row["quantity"],1,0,'C');
		$pdf->Cell(20,10,$row["Item_Sold"],1,0,'C');
		$pdf->Cell(35,10,$row["price"],1,0,'C');
		$pdf->Cell(30,10, "Php. $linetotal",1,0,'R');
			$quantitytotal += $row["quantity"];
			$grandtotal = $grandtotal + $linetotal; 
			$pdf->Ln(10);
			
		}
	
		$pdf->Cell(70,10,"Total: ",1,0,'R');
		$pdf->Cell(35,10,$quantitytotal,1,0,'C');
		$pdf->Cell(85,10, "Php. $grandtotal",1,0,'R');

		$pdf->Ln(30);
		
		$date = currentDateTime();

		$sql = "INSERT INTO `inventory_report`(`Total`, `Date`) VALUES ('$grandtotal','$date')";
				$result = mysqli_query($conn, $sql);
	}

$pdf->Output();
	

 ?>
