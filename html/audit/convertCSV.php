<?php

// output headers so that the file is downloaded rather than displayed
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('UID', 'Audit Date', 'Manufacturer', 'Model', 'Type', 'Serial', 'CPU', 'CPU Manufacturer', 'CPU Model', 'RAM', 'RAM Type', 'RAM Voltage', 'RAM Speed', 'Disk Size', 'Disk Type', 'Disk Model', 'Disk Serial', 'Compiled Description'));

// fetch the data

$con2 = new mysqli("localhost", "john", "pppp", "audit");

$sql = "SELECT * FROM audit.sorted;";

$result = mysqli_query($con2, $sql)or die(mysqli_error());


// loop over the rows, outputting them
while($row = mysqli_fetch_array($result)) { 
	fputcsv($output, $row);
}
fclose($output);
mysqli_close($con2);
?>
