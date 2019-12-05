<?php
    // Allow computers on other domains not from our adelphi server to make HTTP POST and GET requests.
    header("Access-Control-Allow-Origin: *");
	
	$EVENT_NAME = 'eventName';
	$EVENT_DATE = 'eventDate';
	$EVENT_DESCRIPTION = 'eventDescription';
	$EVENT_TERM_ID = 'eventTermID';
    
    // PHP doesn't understand JSON sent by JavaScript. Convert JSON for PHP to understand.
	$_POST = json_decode(file_get_contents('php://input'), true);

	$connect = new PDO('mysql:host=localhost;dbname=f19seaucalendar', 'frankcolasurdo', 'frcolsefp');
	
	$query = "
		INSERT INTO events ($EVENT_NAME, $EVENT_DATE, $EVENT_DESCRIPTION, $EVENT_TERM_ID) 
		VALUES 			   (:$EVENT_NAME, :$EVENT_DATE, :$EVENT_DESCRIPTION, :$EVENT_TERM_ID)
	";

	$data = array(
		'eventName' => $_POST["$EVENT_NAME"],
		'eventDate' => $_POST["$EVENT_DATE"],
		'eventDescription' => $_POST["$EVENT_DESCRIPTION"],
		'eventTermID' => $_POST["$EVENT_TERM_ID"],
	);

	$statement = $connect->prepare($query);
	$statement->execute($data);
?>
