<?php

$db = new mysqli("localhost", "cameronbosch", "alliance", "f19seaucalendar");
if ($db->connect_errno) {
	echo "Connect failed: ". $mysqli->connect_error;
	exit();
}
$sql = "SELECT * from events";
$result = $db->query($sql);


$table = $result->fetch_all();
echo "<table>";
foreach ($table as $row) {
	echo "<tr>";
	foreach ($row as $col) {
		echo "<td>$col</td>";
		}
	echo "</tr>";
	}
	echo "</table>";

$db->close();

?>