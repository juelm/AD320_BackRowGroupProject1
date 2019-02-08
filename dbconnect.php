<?php
    require "credentials.php";

    //Establish DB Connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    //query the DB
    $dbQuery = "SELECT *
                FROM MESSAGES";
    
    $result = $conn->query($dbQuery);

    if($result->num_rows > 0) {
        $dbArray = array();
        $index = 0;
        while($row = $result->fetch_assoc()){
            
            $dbArray[$index] = array($row);
            $index++;
            
            /*echo
                "'PK: '" . $row["MessageID"] .
                "name: " . $row["PostName"] .
                "email: " . $row["Email"] .
                "text: " . $row["Message"];*/
        }
    }
    foreach($dbArray as $line){
        foreach($line as $inner){
        echo implode($inner,", ");
        echo "<br>";
        echo "<br>";
        }
    }

?>