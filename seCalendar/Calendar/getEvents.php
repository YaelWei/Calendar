<?php
 header("Access-Control-Allow-Origin: *");
//getEvents.php

$EVENT_ID = 'eventID';
$EVENT_NAME = 'eventName';
$EVENT_DATE = 'eventDate';
$EVENT_DESCRIPTION = 'eventDescription';
$EVENT_TERM_ID = 'eventTermID';

$connect = new PDO('mysql:host=localhost;dbname=f19seaucalendar', 'frankcolasurdo', 'frcolsefp');

$data = array();

$query = "SELECT * FROM events";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  "$EVENT_ID" => $row["$EVENT_ID"],
  "$EVENT_NAME"   => $row["$EVENT_NAME"],
  "$EVENT_DESCRIPTION" => $row["$EVENT_DESCRIPTION"],
  "$EVENT_DATE" => $row["$EVENT_DATE"],
 );
}

echo json_encode($data);
?>
