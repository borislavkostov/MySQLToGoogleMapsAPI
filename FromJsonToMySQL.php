<?php
    require("db_info.php");
$conn = mysql_connect("localhost", $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$x=4;
for($x=1;$x<50;$x++)
{
$str = file_get_contents("http://api.eventful.com/json/events/search?c=music&app_key=Tm9vvdLvvQvkZ6KF&page_number=".$x."&date=Future&callback=processJSONP/");
$json = json_decode($str, true);
//echo '<pre>' . print_r($json, true) . '</pre>';
$last = count($json['events']['event']) - 1;
mysql_select_db("wordpress") or die(mysql_error()); 
foreach ($json['events']['event'] as $i => $row)
{
    $isFirst = ($i == 0);
    $isLast = ($i == $last);
    $id=$row['id'];
    $latitude=$row['latitude'];
    $longitude=$row['longitude'];
    $title=$row['title'];
    $start_time=$row['start_time'];
    $country_name=$row['country_name'];
    $region_name=$row['region_name'];
    $city_name=$row['city_name'];
    $stop_time=$row['stop_time'];

//echo $start_time;
	//echo $latitude;
	mysql_select_db("wordpress") or die(mysql_error()); 
	$sql = "INSERT INTO `markers` (`id`,`latitude`, `longitude`,`title`,`start_time`,`country_name`,`region_name`,`city_name`,`stop_time`) 
	VALUES ('$id','$latitude','$longitude','$title','$start_time','$country_name','$region_name','$city_name','$stop_time');";
$data = mysql_query($sql);
}
}
?>
