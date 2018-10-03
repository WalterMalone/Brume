
<?php

$con = new mysqli("localhost", "john", "pppp", "audit");
##$audOut = new mysqli("localhost", "john", "pppp", "audit");


$sql = "SELECT * FROM fog.inventory;";




$result = mysqli_query($con,$sql)or die(mysqli_error($con));

mysqli_query($con,"TRUNCATE TABLE sorted;")or die(mysqli_error($con));

while($row = mysqli_fetch_array($result)) {

  $Iuid=$row['iOtherTag'];
  $Idate=$row['iCreateDate'];
  $Isysman=$row['iSysman'];
  $Isysmodel=$row['iSysproduct'];
  $Isysserial=$row['iSysserial'];
  $Isystype=$row['iSystype'];
  $Icpuman=$row['iCpuman'];
  $Icpuver=$row['iCaseserial'];
  $Icpusocket=$row['iMbman'];
  $Imemsize=$row['iSysversion'];
  $Imemtype=$row['iMbversion'];
  $Imemvolt=$row['iCasever'];
  $Imemspeed=$row['iBiosversion'];
  $Idisksize=$row['iCaseman'];
  $Idisktype=$row['iHdmodel'];
  $Idiskmodel=$row['iHdmodel'];
  $Idiskserial=$row['iHdserial'];
  


  $Ouid=$Iuid;
  $Odate=$Idate;
  $Osysman=$Isysman;
  $Osysmodel=$Isysmodel;
  $Osysserial=$Isysserial;
  $Osystype= str_replace(array("Type: Notebook", "Type: Portable"), "Laptop", $Isystype);
  $Ocpuman= str_replace("(R)", "", $Icpuman);
  $Ocpuver= str_replace("model name : ", "", $Icpuver);
  $Ocpushort="";
  $Ocpusocket= str_replace("Upgrade: ", "", $Icpusocket);
  $Omemsize= str_replace("Range Size: ", "", $Imemsize);
  $Omemtype=$Imemtype;
  $Omemvolt=$Imemvolt;
  $Omemspeed= str_replace("Speed: ", "", $Imemspeed);
  $Odisksize= substr($Idisksize, 0, -10);
  $Odisktype=$Idisktype;
  $Odiskmodel=$Idiskmodel;
  $Odiskserial=$Idiskserial;
  $Odescription="$Isysman $Isysmodel $Ocpuver with $Omemsize of RAM and $Odisksize Gb $Odisktype";





$ins = "INSERT INTO audit.sorted (`uid`, `date`, `sysman`, `sysmodel`, `systype`, `sysserial`, `cpuman`, `cpuver`, `cpushort`, `cpusocket`, `memsize`, `memtype`, `memvolt`, `memspeed`, `disksize`, `disktype`, `diskmodel`, `diskserial`, `description`) 
VALUES ( '$Ouid', '$Odate', '$Osysman', '$Osysmodel', '$Osystype', '$Osysserial', '$Ocpuman', '$Ocpuver', '$Ocpushort', '$Ocpusocket', '$Omemsize', '$Omemtype', '$Omemvolt', '$Omemspeed', '$Odisksize', '$Odisktype', '$Odiskmodel', '$Odiskserial', '$Odescription' )";

mysqli_query($con,$ins)or die(mysqli_error($con));

}


mysqli_close($con);
?>
