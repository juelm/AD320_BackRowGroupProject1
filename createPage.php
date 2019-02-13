<?php
    
    function selectColumns($PK, $dispDate, $dispName, $dispEmail, $numResults){
        $columnString = "SELECT";
        $fromTable = "FROM MESSAGES";
        $limit = "";
        
        //if PK to be displayed add it to query
        if($PK) {
            $columnString = $columnString . " MessageID, ";    
        }
       
        //if Name to be displayed add it to query
        if($dispName) {
            $columnString = $columnString . " PostName, ";
        }
        
        //if Date to be displayed add it to query
        if($dispDate) {
            $columnString = $columnString . " PostDate, ";
        }
        
        //if Email to be displayed add it to query
        if($dispEmail) {
            $columnString = $columnString . " Email, ";
        }
        
        //Text will always be displayed, add it to query
        
        $columnString = $columnString . " Message ";
        
        if($numResults > 0){
            $limit = " LIMIT " . $numResults;
        }
        
        $orderBy = " ORDER BY PostDate DESC";
        
        $wholeQuery = $columnString . $fromTable . $orderBy . $limit;
        
        return $wholeQuery;
       
    }


    function createRow($PK, $dispDate, $dispName, $dispEmail, $inRow){
        $outRow = array();
        
        //if PK to be displayed add it to query
        if($PK) {
            $outRow["MessageID"] = $inRow["MessageID"]; 
        }else{
            $outRow["MessageID"] = null;
        }
       
        //if Name to be displayed add it to query
        if($dispName) {
            $outRow["PostName"] = $inRow["PostName"]; 
        }else{
            $outRow["PostName"] = "Anonymous";
        }
        
        //if Date to be displayed add it to query
        if($dispDate) {
            $outRow["PostDate"] = $inRow["PostDate"]; 
        }else{
            $outRow["PostDate"] = null;
        }
        
        //if Email to be displayed add it to query
        if($dispEmail) {
            $outRow["Email"] = $inRow["Email"]; 
        }else{
            $outRow["Email"] = null;
        }
        
        //Text will always be displayed, add it to query
        
        $outRow["Message"] = $inRow["Message"];
        return $outRow;
        
    }


    function printAssoc($toPrint){
        
        foreach($toPrint as $line){
       
            echo $line["MessageID"] . " " . $line["PostName"] . " " . $line["PostDate"] . " " . $line["Message"]; 
            
            echo "<br>";
            echo "<br>";

            }
        }

    function createPage($inArray, $resultsPerPage) {
        $outCount = count($inArray, 0);
        $inCount = floor($outCount / $resultsPerPage);
        $roundCount = $inCount * $resultsPerPage;
        $inRem = fmod($outCount, $resultsPerPage);
        $outArray = array();
        $outIndex = 0;
        echo $outCount . " " . $inCount . " " . $roundCount;
        
        for($i = 0; $i < $roundCount; $i = $i + $resultsPerPage) {
                $page = array();
                for($j = 0; $j < $resultsPerPage; $j++) {
                    $inIndex = $i + $j;
                    $row = $inArray[$inIndex];
                    //$page[$j] = createRow($displayPK, $displayName, $displayDate, $displayEmail,$row);
                    $page[$j] = $row;   
                }
            $outArray[$outIndex]  = $page;
            $outIndex++;
        }
        if($inRem > 0){
            $lastPage = array();
            $lpIndex = 0;
            for($k = $roundCount; $k < $outCount; $k++) {
                $row = $inArray[$k];
                $lastPage[$lpIndex] = $row;
                $lpIndex++;
            }   
            
            $outArray[$outIndex] = $lastPage;      
        }
        
        
        return $outArray;
    }
    


    function printPages($pageToPrint){
        foreach($pageToPrint as $inside){
            print_r($inside);
            
            echo "<br>";
            echo "<br>";            
        }
    }


?>