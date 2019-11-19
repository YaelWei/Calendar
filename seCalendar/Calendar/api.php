<?php
  // Connect to database
	$connection=mysqli_connect('localhost','cameronbosch','alliance','f19seaucalendar');

	if ($db->connect_errno) {
	echo "Connect failed: ". $mysqli->connect_error;
	exit();
}
	
	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
			// Retrieve Events
			if(!empty($_GET["eventID"]))
			{
				$eventID=intval($_GET["eventID"]);
				get_events($eventID);
			}
			else
			{
				get_events();
			}
			break;
		case 'POST':
			// Insert event
			insert_event();
			break;
		case 'DELETE':
			// Delete event
			$eventID=intval($_GET["eventID"]);
			delete_event($eventID);
			break;
		default:
			// Invalid Request Method
			header("HTTP/1.0 405 Method Not Allowed");
			break;
	}

	function insert_event()
	{
		global $connection;
		$eventName=$_POST["eventName"];
		$eventDescription=$_POST["eventDescription"];
		$eventDate=$_POST["eventDate"];
		$query="INSERT INTO events SET eventName={$eventName}, eventDescription={$eventDescription}, eventDate={$eventDate}";
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Event Added Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Event Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	function get_events($eventID=0)
	{
		global $connection;
		$query="SELECT * FROM events";
		if($eventID != 0)
		{
			$query.=" WHERE id=".$eventID." LIMIT 1";
		}
		$response=array();
		$result=mysqli_query($connection, $query);
		while($row=mysqli_fetch_array($result))
		{
			$response[]=$row;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	function delete_event($eventID)
	{
		global $connection;
		$query="DELETE FROM events WHERE id=".$eventID;
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'event Deleted Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'event Deletion Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	

	// Close database connection
	mysqli_close($connection);
?>