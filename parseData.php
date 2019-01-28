
<?php
     require "PopulateDivs.php";

     function parseData($dataObject){
        foreach($dataObject as $dataRow){
            populateDivs($dataRow);
        }
     }
     
     ?> 