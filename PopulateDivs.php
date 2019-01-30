
<?php

     function populateDivs($dataArray) {
        echo "
<div class='message-container'>
    <div id='title-container'>
        <div id='name-linked'><a href='mailto:{$dataArray['email']}'>{$dataArray['name']}</a></div>
        <div id='date'>{$dataArray["date"]}</div>
    </div>
    <hr>
    <div id='message-content'>
        {$dataArray['text']}
    </div>
</div>";

     }
     
?>