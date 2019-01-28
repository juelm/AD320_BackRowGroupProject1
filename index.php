

<?php 
     require "data.php";
     require "parseData.php";
     
     ?>

<html>
    <head>
        <title>mockup</title>
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
            label {
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
            	width: 100%;
            	margin: 0;
            }

            #name-linked{
            	width:50%;
                display: inline-block;
                text-align: left;
                float: left;
            }
            
            #date{
            	width:50%;
                display: inline-block;
                text-align: left;
                float: right;
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
    <body>
        <div id="outer-frame" class="box">
            <div id="title-box" class="box">
                title
            </div>
            <div id="top-box" class="box">
                <div id="input-container"><label>Name: </label><input type="text" name="name" class="input-style" required></div>
			    <div id="input-container"><label>E-mail: </label><input type="text" name="email" class="input-style" required></div>
				<div id="message-input-container"><textarea name="message" id="message-style" placeholder="Type message here..."></textarea></div>
				<div id="submit-container"><input type="submit" value="Submit Message" id="submit"></div>
            </div>
            <div id="bot-box" class="box">
                
                <?php  
                     parseData($dataArray);
                     
                ?>                
                  
            </div>         
            <div id="footer" class="box">
                <a href="linkhere"><<</a> [<a href="linkhere">1</a>] [<a href="linkhere">2</a>] [<a href="linkhere">3</a>] [<a href="linkhere">4</a>] <a href="linkhere">>></a>
            </div>
        </div>
    </body>
<html>
