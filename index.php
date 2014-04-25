<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Poly Remnant Sale</title>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="js/html5shiv.min.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div class="container White_BG">
<a href="http://www.amleo.com">
	<img src="imgs/AML-Logo.jpg" alt="AML Logo" class="img-responsive" style="margin-bottom:15px;">
</a>
<img src="imgs/poly-remnants.jpg" alt="Poly Remnant Sale" class="img-responsive center-block" style="display:block;margin-bottom:15px;"/>
<?php
$filename = 'poly.csv';
if (file_exists($filename)) {
	$f=fopen($filename, "r");
	$i=1;
	while (!feof($f) ) {
		$line = fgetcsv($f, 1024);
		if ($line[0]=='1'){
			#HEADER RECORDS
			if ($i==2){
				#THIS IS USED AFTER THE FIRST HEADER LOOP. IT WILL END THE PREVIOUS TABLE BEFORE OPENING A NEW ONE
				echo "</table>";	
			}
			$i=2;				
			echo "<span class='poly-font-5'><u><strong>".htmlspecialchars($line[1])."</strong></u></span>";
			echo "<table class='table table-striped table-bordered table-condensed table-responsive'>";				
			echo "<tr>";
				echo "<th>SKU</th>";
				echo "<th>Lot</th>";
				echo "<th>Sub-Lot</th>";
				echo "<th>Size</th>";
				echo "<th>Type</th>";
				echo "<th>Original Price</th>";
				echo "<th>Disc SqFt Price</th>";
				echo "<th>Disc Price</th>";
				echo "<th>You Save</th>";
			echo "</tr>";
		}elseif ($line[0]=='2'){
			#DETAIL RECORDS
			echo "<tr>";
				echo "<td width='11.1%'>" . $line[1] . "</td>";
				echo "<td width='11.1%'>" . $line[2] . "</td>";
				echo "<td width='11.1%'>" . $line[3] . "</td>";
				echo "<td width='11.1%'>" . $line[4] . "</td>";
				echo "<td width='11.1%'>" . $line[5] . "</td>";
				echo "<td width='11.1%'>$" . $line[6] . "</td>";
				echo "<td width='11.1%'>$" . $line[7] . "</td>";
				echo "<td width='11.1%' class='PolyRedFont'>$" . $line[8] . "</td>";
				echo "<td width='11.1%'>$" . $line[9] . "</td>";
			echo "</tr>";
		}else{
			#JUNK LINES IN THE FILE---DO NOTHING
		}
	}
	echo "</table>";
	fclose($file_handle);
}else{
	#IF THE FILE DOESN'T EXIST
	echo "<div class='alert alert-danger'>Under going system maintenance. Please try back in a few minutes.</div>";
}
?>
</div>
<!--Le javascript-->
<!--Placed at the end of the document so the pages load faster-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
