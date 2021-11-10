<?php 
session_start();

$from = $_SESSION['fromdate'];
$to = $_SESSION['todate'];

$date = "$from - $to";

include('db_connect.php');
require('fpdf/fpdf.php');
			
			if ($from == $to) {
			
			$sql = "SELECT * FROM transaction where date(_dateTime) BETWEEN '$from' AND '$to'";

			$result = mysqli_query($conn, $sql);

			$pdf = new FPDF('p','mm','A4');
			$pdf->AddPage();

			$pdf->Image('logo1.jpg',15,10,20,20);
			$pdf->setTitle('XYT Co.', false);
			

			$pdf->SetFont('times','B',24);
			$pdf->SetFillColor(41,109,152);
			$pdf->SetDrawColor(50,50,100);
			$pdf->setLeftMargin(30);
			$pdf->Cell(155,15,"XYT COMPANY",0,1,'C');
			$pdf->Ln(25);
			$pdf->setLeftMargin(10);

			$pdf->SetFont('times','B',18);
			$pdf->Cell(155,15,"Sales from $from to $to",0,1,'C');
			
			$pdf->setTextColor(255,255,255);

			$pdf->SetFont('Times','B',14);
			
			$pdf->setLeftMargin(10);
			
			$pdf->SetFont('Times','',14);
			$pdf->Cell(185,15,'Sales Report',0,1,'C',true);
			$pdf->Cell(35,10,'Transaction ID',1,0,'',true);
			$pdf->Cell(30,10,'Total',1,0,'',true);
			$pdf->Cell(40,10,'Customer Name',1,0,'',true);
			$pdf->Cell(30,10,'Type',1,0,'C',true);
			$pdf->Cell(50,10,'Transaction Time',1,0,'',true);
			$pdf->Ln(10);


			$grandtotal = 0 ;
			$quantitytotal = 0;  
			if ($result -> num_rows > 0) {
				while ($row = $result -> fetch_assoc()) {

					$total = $row['total'];
			
					$pdf->setTextColor(0,0,0);
					$pdf->Cell(35,10,$row['transaction_id'],1,0);
					$pdf->Cell(30,10,"Php $total",1,0);
					$pdf->Cell(40,10,$row['customername'],1,0);
					$pdf->Cell(30,10,$row['Status'],1,0);
					$pdf->Cell(50,10,$row['_dateTime'],1,0);
					$pdf->Ln(10);

					$grandtotal += $row['total']; 
				}
			
				$pdf->Cell(35,10,"Total: ",1,0);
				$pdf->Cell(150,10, "Php $grandtotal",1,0,'L');	
				$pdf->Ln(20);

				$sql = "INSERT INTO `sales_report`(`Total`, `Transaction_Date`) VALUES ('$grandtotal','$date')";
				$result = mysqli_query($conn, $sql);

				$pdf->setLeftMargin(35);
				$pdf->setTextColor(255,255,255);
				$pdf->Cell(145,15,'Highest Selling Product',0,1,'C',true);
				$pdf->SetFont('Times','',14);
				$pdf->Cell(30,10,'Product ID',1,0,'',true);
				$pdf->Cell(35,10,'Product Name',1,0,'',true);
				$pdf->Cell(30,10,'Unit Sold',1,0,'',true);
				$pdf->Cell(50,10,'Total Sales',1,0,'',true);
				$pdf->Ln(10);



				$sql = "SELECT * from inventory ORDER BY Item_Sold DESC LIMIT 1";
				$result = mysqli_query($conn, $sql);

			
				if ($result -> num_rows > 0) {
					while ($row = $result -> fetch_assoc()){

					$linetotal = $row["price"]*$row["Item_Sold"];

					$pdf->setTextColor(0,0,0);
					$pdf->Cell(30,10,$row["id"],1,0,'C');
					$pdf->Cell(35,10,$row["product_name"],1,0,'C');
					$pdf->Cell(30,10,$row["Item_Sold"],1,0,'C');
					$pdf->Cell(50,10,"Php $linetotal",1,0,'R');
					$pdf->Ln(10);	

					}
				}
			}else{
					$pdf->setTextColor(0,0,0);
					$pdf->Cell(155,15,'NO DATA TO SHOW',0,1,'C');
				}

			}else{


			$sql = "SELECT * FROM transaction where date(_datetime) BETWEEN '$from' AND '$to'";
			$result = mysqli_query($conn, $sql);

			$pdf = new FPDF('p','mm','A4');
			$pdf->AddPage();

			$pdf->Image('logo1.jpg',15,10,20,20);
			$pdf->setTitle('XYT Co.', false);
			$pdf->setLeftMargin(30);

			$pdf->SetFont('times','B',24);
			$pdf->SetFillColor(41,109,152);
			$pdf->SetDrawColor(50,50,100);
			$pdf->Cell(155,15,"XYT COMPANY",0,1,'C');
			$pdf->Ln(25);
			$pdf->SetFont('times','B',18);
			$pdf->Cell(155,15,"Sales from $from to $to",0,1,'C');
			$pdf->Cell(155,15,"$date",0,1,'C');
			$pdf->setTextColor(255,255,255);
			$pdf->SetFont('Times','B',14);

			$pdf->Cell(155,15,'Sales Report',0,1,'C',true);
			$pdf->SetFont('Times','B',14);
			$pdf->Cell(35,10,'Transaction ID',1,0,'',true);
			$pdf->Cell(30,10,'Total',1,0,'',true);
			$pdf->Cell(40,10,'Customer Name',1,0,'',true);
			$pdf->Cell(50,10,'Transaction Time',1,0,'',true);
			$pdf->Ln(10);


			$grandtotal = 0 ;
			$quantitytotal = 0;  
			if ($result -> num_rows > 0) {
				while ($row = $result -> fetch_assoc()) {

					$total = $row['total'];
			
					$pdf->setTextColor(0,0,0);
					$pdf->Cell(35,10,$row['transaction_id'],1,0);
					$pdf->Cell(30,10,"Php $total",1,0);
					$pdf->Cell(40,10,$row['customername'],1,0);
					$pdf->Cell(50,10,$row['_dateTime'],1,0);
					$pdf->Ln(10);

					$grandtotal += $row['total']; 
				}
			
				$pdf->Cell(35,10,"Total: ",1,0);
				$pdf->Cell(120,10, "Php $grandtotal",1,0,'L');	
				$pdf->Ln(20);

				$sql = "INSERT INTO `sales_report`(`Total`, `Transaction_Date`) VALUES ('$grandtotal','$date')";
				$result = mysqli_query($conn, $sql);

				$pdf->setLeftMargin(35);
				$pdf->setTextColor(255,255,255);
				$pdf->Cell(145,15,'Highest Selling Product',0,1,'C',true);
				$pdf->SetFont('Times','B',14);
				$pdf->Cell(30,10,'Product ID',1,0,'',true);
				$pdf->Cell(35,10,'Product Name',1,0,'',true);
				$pdf->Cell(30,10,'Unit Sold',1,0,'',true);
				$pdf->Cell(50,10,'Total Sales',1,0,'',true);
				$pdf->Ln(10);



				$sql = "SELECT * from inventory ORDER BY Item_Sold DESC LIMIT 1";
				$result = mysqli_query($conn, $sql);

			
				if ($result -> num_rows > 0) {
					while ($row = $result -> fetch_assoc()){

					$linetotal = $row["price"]*$row["Item_Sold"];

					$pdf->setTextColor(0,0,0);
					$pdf->Cell(30,10,$row["id"],1,0,'C');
					$pdf->Cell(35,10,$row["product_name"],1,0,'C');
					$pdf->Cell(30,10,$row["Item_Sold"],1,0,'C');
					$pdf->Cell(50,10,"Php $linetotal",1,0,'R');
					$pdf->Ln(10);	

					}
				}
			}else{
					$pdf->setTextColor(0,0,0);
					$pdf->Cell(155,15,'NO DATA TO SHOW',0,1,'C');
				}
}
$pdf->Output();

?>