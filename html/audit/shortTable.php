    <input type="text" id="myInput" onkeyup="tblSearch()" placeholder="Search...">
<p></p>
<div style="overflow-x:auto;">
<table id="myTable" class="sortable-theme-bootstrap" data-sortable>
<thead>
<tr class="header" style="background-color: #ebebeb;">
<th> UID    </th>
<th> Audit Date    </th>
<th> Compiled Description   </th>
</tr>
</thead>

<script>
function tblSearch() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (j = 0; j < 3; j++) {
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[j];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
}
</script>

<?php

$con = new mysqli("localhost", "john", "pppp", "audit");

$sql = "SELECT * FROM audit.sorted;";

$result = mysqli_query($con,$sql)or die(mysqli_error());



while($row = mysqli_fetch_array($result)) {


    echo "<tr>
<td style='width: 150px;'>".$row['uid']."</td>
<td style='width: 200px;'>".$row['date']."</td>
<td style='width: 1000px;'>".$row['description']."</td>
</tr>";
} 
echo "</table>";
#fclose($output);
mysqli_close($con);
?>

            
            </table>
        </div>