<?php
require "credentials.php";
require "createPage.php";
//require "getVariables.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


 //Array of Messages with out Name and email
 $sql_2 = "SELECT * FROM PREFERENCES WHERE PreferenceID = 1";
 $result_2 = $conn->query($sql_2);


 $data_2 = array();
 while($row = $result_2->fetch_assoc()) {
	 $data_2[] = $row;
 }

    $displayPK = false;
    $displayDate = $data_2[0]["DisplayDate"];
    $displayName = $data_2[0]["DisplayName"];
    $displayEmail = $data_2[0]["DisplayEmail"];
    $resultsPerPage = $data_2[0]["PageResults"];
    $numTotalResults = $data_2[0]["TotalResults"];

//echo $displayPK . " " . $displayDate . " " .  $displayName . " " .  $displayEmail . " " .  $resultsPerPage . " " . $numTotalResults;

//Array of Messages of the whole database(include all fields)

$sql_1 = selectColumns($displayPK, $displayDate, $displayName, $displayEmail, $numTotalResults);
$result_1 = $conn->query($sql_1);

$data_1 = array();
while($row = $result_1->fetch_assoc()) {
	$data_1[]= $row;
}


// //Array of Messages with out Date
// $sql_3 = "SELECT MessageID, PostName, Email, Message FROM Messages ORDER BY MessageID DESC";
// $result_3 = $conn->query($sql_3);


// $data_3 = array();
// while($row = $result_3->fetch_assoc()) {
	// $data_3[]= $row;
// }

$conn->close();

 $num = count($data_1,0);

 $assocArray = array();
 for($i = 0; $i < $num; $i++) {
     $record = $data_1[$i];
     $assocArray[$i] = createRow($displayPK, $displayDate, $displayName, $displayEmail, $record); 
 }

$return = json_encode($assocArray);
echo $return;


 
?> 