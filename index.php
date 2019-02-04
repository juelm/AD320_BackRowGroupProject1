<html>
	<head>
		<title>Guestbook</title>
		<script src='script.js'></script>
		<style>
			#outer-frame {
				display: flex;
				border: 3px solid;
				height: 800px;
				width: 400px;
				resize: both;
				overflow:auto;
				flex-direction: column;
				padding: 0px;
			}
			.box {
				border: 1px solid;
				margin: 0.5em;
			}
			#input-container {
				display: flex;
				font-size: 1em;
				margin: 0.5em;
			}
			 
			#counter_div {
				margin:0.5em;
			}
			
			#message-input-container {
				margin:0.5em;
			}
			#message-style {
				width: 100%;
				min-height: 10em;            
			}
			#submit-container {
				margin:0.5em;
			
			}
			.marker {
				display: inline-block;
				float: left;
				clear: left;
				width: 20%;
				text-align: right;
				margin-right: 0.5em;
				line-height: 24px;
			}
			.input-style {
				width: 80%;
			}
			#submit {
				width: 100%;
			}
			#top-box {
				margin-bottom: 0;
			}
			#bot-box {
				flex: 1;
				overflow-y: scroll;  
			}
			#title-box {
				text-align: center;
				margin-bottom: 0;
			}
			#title-container{
				display:flex;
				justify-content: space-between;
				width: 100%;
				margin: 0;
			}

			#name-linked{
			}
			
			#date{
			}
			
			.message-container {
			border: 1px solid;
			padding: 0.5em;
			margin: 0.5em;
			}
			
			#message-style {
				resize: vertical;
				max-height: 200px;  
			}
			#footer {
				text-align: center;
			}
		</style>
	</head>
	<body onload='zeroCount()'>
		<input type = 'button' onclick = 'displayPage(1)' value='Press Button'>
		<div id='outer-frame' class='box'>
			<div id='title-box' class='box'>
				title currentpage:<span id='current-page'>0</span> start:<span id='start'>0</span> stop:<span id='stop'>0</span>
			</div>
			<div id='top-box' class='box'>
				<div id='input-container'>
					<label class='marker'>Name: </label><input type='text' name='name' class='input-style' required>
				</div>
				<div id='input-container'>
					<label class='marker'>E-mail: </label><input type='text' name='email' class='input-style' required>
				</div>
				<div id='message-input-container'>
					<textarea name='message' id='message-style' placeholder='Type message here...' maxLength='400' onkeyup='counter(this);'></textarea>
				</div>
				<div id='counter_div'></div>
				<div id='submit-container'>
					<input type='submit' value='Submit Message' id='submit'>
				</div>
			</div>
			<div id='bot-box' class='box'>
				<span id='display'>hello</span>
			</div>
			<div id='footer' class='box'>
				<span id ='page-select'><a id='back-page' onclick='backPage()'>back</a>||<a id='forward-page' onclick='forwardPage()'>forward</a></span>
			</div>
		</div>
	</body>
<html>