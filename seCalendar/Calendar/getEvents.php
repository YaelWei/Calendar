<?php
    header("Access-Control-Allow-Origin: *");
    
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
    "$EVENT_TERM_ID" => $row["$EVENT_TERM_ID"]
    );
    }

    echo json_encode($data);
?>
