<?php
    
    $storedUser = "Fake Admin";
    $storedPW = "BadPassword";

    $checkUser = $_POST["username"];
    $checkPW = $_POST["password"];

    if($storedUser === $checkUser && $storedPW === $checkPW){
        echo '<!DOCTYPE HTML>
<html lang="en">
<style type="text/css">


#form-container {
	max-width:800px;
	width:100%;
	margin:0 auto;
	align-items: center;
}

body {
  font-family:"Open Sans", Helvetica, Arial, sans-serif;
  background-color: #492004 ;
  color:#492004;
}

#admin-form2 {
	background:#ddc6b6  ;
	padding:25px;
	height: 720px; 
	margin:0 auto 
}

#admin-form2 input[type="text"]

 {
    margin: 0 0 10px;
	padding: 0;
	width: 20%;
	height: 30px;
}
#save {
	cursor:pointer;
	width:100%;
	margin:0 0 5px;
	padding:10px;
	
}

#save :hover {
	background:#ddc6b6; 	
}

.box{
 border: solid black 1px;
 margin:0 0 5px;
 padding:10px;
}


</style>


<body>
<div id="form-container">
	<form id="admin-form2" action = "getVariables.php" method = "get">
		
	<div class ="box">
		<h1>Information to post</h1>
		  <input id="name-post" name = "name-post" type="checkbox" />
		  <label for="name-post">Name</label><br>
		  <input id="email-post" name = "email-post" type="checkbox" />
		  <label for="email-post">Email</label><br>
		  <input id="date-post" name = "date-post" value = "true" type="checkbox" />
		  <label for="date-post">Date</label><br>
		  <input id="message-post" name = "message-post" type="checkbox" />
		  <label for="message-post">Message</label><br>
	</div>

	
	<div class = "box">
		<h1>Required information</h1>
		  <input id="name-input" name = "name-input" value = "true" type="checkbox" />
		  <label for="name-input">Name</label><br>
		  <input id="email-input" name = "email-input" value = "true" type="checkbox" />
		  <label for="email-input">Email</label><br>
		  <input id="message-input" name = "message-input" value = "true" type="checkbox" />
		  <label for="message-input">Messege</label><br>
	</div>
	
	<div class="box">
	     <h1>Configure comments</h1>
		 <label id="config1" for="comment1">Comments per page :</label><br>
		 <input id="comment1" name="comment1" type="text"  value="" placeholder="0"><br>
		 <label id="config2" for="comment2">Total number of comments :</label><br>
		 <input id="comment2" name="comment2" type="text"  value="" placeholder="0"><br>
		 <label id="config3" for="comment3" >Enter message ID to delete :</label><br>
		 <input id="comment3" name="comment3" type="text"  value=""><br>         
	</div>
	<div>
	<input id="save" value = "Save Changes" type="submit"/><br>	
	</div>
	</form>

	</div>
</body>
</html>
';
    }else {
        echo "Invalid User Name or Pass Word.";
    }

?>