<?php

//getEvents.php

$connect = new PDO('mysql:host=localhost;dbname=f19seaucalendar', 'cameronbosch', 'alliance');

$data = array();

$query = "SELECT * FROM events";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["eventID"],
  'title'   => $row["eventName"],
  'description'   => $row["eventDescription"],
  'date'   => $row["eventDate"],
 );
}

echo json_encode($data);

?>
