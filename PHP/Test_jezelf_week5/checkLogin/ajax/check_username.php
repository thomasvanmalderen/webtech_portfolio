<?php


    include_once("../classes/User.class.php");
    $activity = new User();


    if(!empty($_POST['username'])) {

	   try {
		$activity->Username = $_POST['username'];
		$activity->UsernameAvailable();
		$response['status'] = 'success';
		$response['message'] = ":) Yup, available!";
	   } catch (Exception $e) {
		$feedback = $e->getMessage();
		$response['status'] = 'error';
		$response['message'] = $feedback;
	   }

	header('Content-Type: application/json');
	echo json_encode($response); 
}
?>