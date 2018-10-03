<?php




// fetch the data

$con2 = new mysqli("localhost", "john", "pppp", "audit");

$sql = "SELECT * FROM audit.sorted;";

$result = mysqli_query($con2, $sql)or die(mysqli_error());


// loop over the rows, outputting them
while($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
	print_r($row);
	echo $row
	echo "!"
}
mysqli_close($con2);
?>
