<?php
    require "credentials.php";
    require "getVariables.php";

    //Establish DB Connection
    $conn1 = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn1->connect_error) {
        die("Connection Failed: " . $conn1->connect_error);
    }

    //query the DB
    $dbQuery1 = $updatePreference;;
    
    $result1 = $conn1->query($dbQuery1);

    /*if($result1->num_rows > 0) {
        $dbArray1 = array();
        $index = 0;
        while($row = $result1->fetch_assoc()){
            
            $dbArray1[$index] = array($row);
            $index++;
            
            echo
                "'PK: '" . $row["MessageID"] .
                "name: " . $row["PostName"] .
                "email: " . $row["Email"] .
                "text: " . $row["Message"];
        }
    }else{
        echo "That is not a valid User Name.";
    }

    $storedUser = $dbArray1[0]["Username"];
    $storedPW = $dbArray1[0]["Password"];

    if($storedUser === $checkUser){
        
    }


    foreach($dbArray1 as $line){
        foreach($line as $inner){
        echo implode($inner,", ");
        echo "<br>";
        echo "<br>";
        }
    }*/

?>