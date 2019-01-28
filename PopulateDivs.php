
<?php

     function populateDivs($dataArray) {
        echo "
<div class='message-container'>
    <div id='title-container'>
        <a href='mailto:{$dataArray['email']}'>{$dataArray['name']}</a>  - 1/22/2019
    </div>
    <hr>
    <div id='message-content'>
        {$dataArray['text']}
    </div>
</div>";

     }
     
?>