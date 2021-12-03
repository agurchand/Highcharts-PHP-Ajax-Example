<?php
//connect to database
$mysqli = new mysqli("localhost","dbname","dbpass","tablename");

$id = $_REQUEST['id'];

$arr 	= array();
$arr1 	= array();
$result = array();

$sql = "select * from higcharts_data where map_id = $id";
$q	 = $mysqli -> query($sql);

$j = 0;
while($row = $q->fetch_assoc()){

	if($j == 0){
	$arr['name'] = 'Male';
	$arr1['name'] = 'Female';
		$j++;
	}
	$arr['data'][] = $row['male'];
	$arr1['data'][] = $row['female'];
}
	
array_push($result,$arr);
array_push($result,$arr1);

print json_encode($result, JSON_NUMERIC_CHECK);

$mysqli -> close();

?>
