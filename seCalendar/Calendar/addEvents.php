<?php

//addEvents.php

$connect = new PDO('mysql:host=localhost;dbname=f19seaucalendar', 'cameronbosch', 'alliance');

if(isset($_POST["title"]))
{
 $query = " INSERT INTO events 
 (eventID, eventName, eventDate, eventDescription) 
 VALUES (:eventID, :eventName, :eventDate, eventDescription)
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':eventID'  => $_POST['id'],
   ':eventName' => $_POST['name'],
   ':eventDate' => $_POST['date'],
   ':eventDescription' => $_POST['description']
  )
 );
}


?>
