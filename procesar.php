<?php

$databasehost = "compumovil.mysql.database.azure.com";
$databasename = "geo_movil";
$databaseusername ="david@compumovil";
$databasepassword = "ch0c0latE";

$con = mysqli_connect($databasehost,$databaseusername,$databasepassword, $databasename) or die(mysqli_error($con));
mysqli_set_charset ($con , "utf8");
$query = file_get_contents("php://input");
$sth = mysqli_query($con, $query);

if (mysqli_errno($con)) {
   header("HTTP/1.1 500 Internal Server Error");
   echo $query.'\n';
   echo mysqli_error($con);
}
else
{
   $rows = array();
   while($r = mysqli_fetch_assoc($sth)) {
     $rows[] = $r;
   }
   $res = json_encode($rows);
    echo $res;
    mysqli_free_result($sth);
}
mysqli_close($con);
?>