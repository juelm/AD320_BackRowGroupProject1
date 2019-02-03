<?php
require "credentials.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//Array of Messeges of the whole database(include all fields)
$sql_1 = "SELECT MessageID, PostName, PostDate, Email, Message FROM Messages";
$result_1 = $conn->query($sql_1);

    $data_1 = array();
    while($row = $result_1->fetch_assoc()) {
        $data_1[]= $row;
    }

//Array of Messeges with out Name and email
$sql_2 = "SELECT MessageID,  PostDate,  Message FROM Messages";
$result_2 = $conn->query($sql_2);

    $data_2= array();
    while($row = $result_2->fetch_assoc()) {
        $data_2[]= $row;
    }

//Array of Messeges with out Date
$sql_3 = "SELECT MessageID, PostName, Email, Message FROM Messages";
$result_3 = $conn->query($sql_3);

    $data_3 = array();
    while($row = $result_3->fetch_assoc()) {
        $data_3[]= $row;
    }

// this function is only for testing the connection with DB 
//and to display the all arrays (you can delete if the connection is working)
function testPrint($data) {
    echo "<pre>";
    print_r($data);
    echo '<br />----------------------<br/>';
    echo "</pre>";
}
testPrint($data_1);
testPrint($data_2);
testPrint($data_3);
$conn->close();
?> 