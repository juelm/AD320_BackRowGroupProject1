<?php

    session_start();
    require "credentials.php"; 

    //Establish DB Connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check connection
    if($conn->connect_error) {
        die("Connection Failed: " . $conn->connect_error);
    }
 
    // define variables and set to empty values
    $name = $email = $comment = "";
    $nameErr = $emailErr = $commentErr = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty(trim_input($_POST["name"]))) {
            $nameErr = "Name is required"; 
      } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z -]*$/",$name)) {
                $nameErr = "Only letters, spaces & dashes allowed";
                $name = "";
            }                  
      }
      if (empty(trim_input($_POST["email"]))) {
            $emailErr = "Email is required";
      } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL) && $email != "") {
                $emailErr = "Invalid email format"; 
                $email = "";
            }
      }
      if (empty(trim_input($_POST["message"]))) {
            $commentErr = "Comment is required";
      } else {
            $comment = test_input($_POST["message"]);
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    function trim_input($data) {
        $data = trim($data);
        return $data;
    }

    $date = time();


    //query the DB
    $dbQuery = "INSERT INTO messages
                (PostName, PostDate, Email, Message)
                VALUES
                ('$name','$date','$email','$comment')";

    if (($nameErr === "" && $emailErr === "" && $commentErr === "") && $conn->query($dbQuery) === TRUE){
       $_SESSION["status"] = "New record created successfully.";   
    } else if ($nameErr != "" || $emailErr != "" || $commentErr != ""){
        $_SESSION["nameError"] = $nameErr;
        $_SESSION["emailError"] = $emailErr;
        $_SESSION["commentError"] = $commentErr;
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        $_SESSION["comment"] = $comment;
    } else {
        $_SESSION["status"] = "Failed to add record to Guestbook.";
        $_SESSION["email"] = $email;
        $_SESSION["name"] = $name;
        $_SESSION["comment"] = $comment; 
    }  
    $nameErr = $emailErr = "";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
?>