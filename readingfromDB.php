
<?php
require("db_info.php");
$conn = mysql_connect("localhost", $username, $password);
mysql_select_db("wordpress") or die(mysql_error()); 
$data = mysql_query("SELECT * FROM markers") 
or die(mysql_error()); 

while($row = mysql_fetch_assoc($data))
{
   $latitude[]=$row["latitude"];
   $longitude[]=$row["longitude"];
}
print_r($latitude);
print " ";
print_r($longitude);
?>

