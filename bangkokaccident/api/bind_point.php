<?php
require_once 'connect_db.php';

if (isset($_POST['date_data_input'])) {
	$query_result = array();

	$date_time_input = $_POST['date_data_input'];
	$start_date_acc = date_format(date_create($date_time_input[0]), "Y/m/d");
	$end_date_acc = date_format(date_create($date_time_input[1]), "Y/m/d");

	$stmt = $connect->prepare("SELECT * FROM accident_point WHERE (:start_date_acc <= acc_start AND :end_date >= acc_start)");
	$stmt->bindParam(':start_date_acc', $start_date_acc, PDO::PARAM_STR);
	$stmt->bindParam(':end_date', $end_date_acc, PDO::PARAM_STR);
	$stmt->execute();

	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		$latitude = $row['latitude'];
		$longitude = $row['longitude'];
		$acc_type = $row['acc_type'];
		array_push($query_result, [$latitude, $longitude, $acc_type]);
	}
	echo json_encode($query_result);
}


?>