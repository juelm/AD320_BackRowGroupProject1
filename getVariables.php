<?php

    require "credentials.php";

    $postName = $_GET["name-post"];
    $postEmail = $_GET["email-post"];
    $postMessage = $_GET["message-post"];

    
    $showPK = true;
    $showDate = $_GET["date-post"];
    $showName = $_GET["name-input"];
    $showEmail = $_GET["email-input"];
    
    $numResultsPerPage = $_GET["comment1"];
    $resultsTotal = $_GET["comment2"];
    $toDelete = $_GET["comment3"];


    echo "Preferences saved.  ";

    if($postName == "on"){
        $postName = 1;
    }else{ 
        $postName = 0;
    }

    if($postEmail == "on"){
        $postEmail = 1;
    }else{
        $postEmail = 0;    
    } 

    if($postMessage == "on"){
        $postMessage = 1;
    }else{
        $postMessage = 0;    
    } 

    if($showDate == "true"){
        $showDate = 1;
    }else{
        $showDate = 0;    
    } 

    if($showName == "true"){
        $showName = 1;
    }else{
        $showName = 0;    
    } 

    if($showEmail == "true"){
        $showEmail = 1;
    }else{
        $showEmail = 0;    
    } 

    if($numResultsPerPage == ""){
        $numResultsPerPage = 5;
    }

    if($resultsTotal == ""){
        $resultsTotal = 20;
    }

    
    $updateString = "UPDATE PREFERENCES ";
    $setString = "SET PostName = {$postName},
                     PostEmail = {$postEmail},
                     postMessage = {$postMessage},
                     DisplayDate = {$showDate},
                     DisplayName = {$showName},
                     DisplayEmail = {$showEmail},
                     PageResults = {$numResultsPerPage},
                     TotalResults = {$resultsTotal} ";  
    $whereString = "WHERE PreferenceID = " . 1;
    
    $updatePreference = $updateString . $setString . $whereString;


    //Establish DB Connection
    $conn1 = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn1->connect_error) {
        die("Connection Failed: " . $conn1->connect_error);
    }

    //query the DB
    $dbQuery1 = $updatePreference;
    
    $result1 = $conn1->query($dbQuery1);

    if($conn1->query($dbQuery1) === TRUE){
        echo "New Record Created.  ";
    } else {
        echo "Error " . $conn1->error;
    }


    if($toDelete > 0){
        $delQuery = "DELETE FROM MESSAGES WHERE MessageID = {$toDelete}";
        $conn1->query($delQuery);

        if($conn1->query($delQuery) === TRUE){
            echo " Post # {$toDelete} Deleted.";
        } else {
            echo "Error " . $conn1->error;
        }
    }
    
$conn1->close();

?>