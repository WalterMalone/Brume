
<html>

<link rel="stylesheet" href="sortable-theme-bootstrap.css" />
<script src="sortable.min.js"></script>

  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Audit Portal</title>
  </head>
  <body>
    <h1 class="sortable-theme-bootstrap">EWEP Laptop Audit Portal</h1>
    <p><br>
    </p>





    <?php

    $con2 = new mysqli("localhost", "john", "pppp", "audit");

    $sql = "SELECT * FROM audit.sorted;";

    $result = mysqli_query($con2, $sql)or die(mysqli_error());

echo "begin";
    // loop over the rows, outputting them
    while($row = mysqli_fetch_array($result, 'MYSQL_NUM')) {
    	print_r($row);
    	echo $row;
    	echo "!";
    }
    mysqli_close($con2);


include './auditSort.php';
include './shortTable.php';
?>



    </body>
</html>
