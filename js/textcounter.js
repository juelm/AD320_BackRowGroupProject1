/* Limits the number of characters and counts them */

    var maxChar;
    function zeroCount(){
        maxChar = document.getElementById("message-style").maxLength;
        document.getElementById('counter_div').innerHTML = 
            '0/'+maxChar;
    }
    function counter(msg){
        document.getElementById('counter_div').innerHTML = 
            msg.value.length+'/'+maxChar;
    }