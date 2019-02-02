<?php
    require "credentials.php";

    //Establish DB Connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }

    $name = $_POST["name"];
    $date = date("Y-m-d");
    $email = $_POST["email"];
    $comment = $_POST["message"];

    //query the DB
    $dbQuery = "INSERT INTO messages
                (PostName, PostDate, Email, Message)
                VALUES
                ('$name','$date','$email','$comment')";
    
    $conn->query($dbQuery);

 /*   if ($conn->query($dbQuery) === TRUE){
        echo "New record created successfully";
    } else {
        echo "Error: " . $dbQuery . "<br>" . $conn->error;
    }*/
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>