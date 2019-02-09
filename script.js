
var commentArray = new Array();
var commentsPerPage = 8;
var currentPage = 1;
var maxPages = 10;
var maxChar;

//functions for back and forwards buttons for now
function forwardPage(){
	if (currentPage < maxPages) {
		currentPage += 1;
		displayPage(currentPage);
	}
}

function backPage(){
	if (currentPage > 1) {
		currentPage -= 1;
		displayPage(currentPage);
	}
}

//creates request and determines what to do with data that is returned
function displayPage(page) {
	currentPage = page;
	//placeholder text in botbox
	document.getElementById("display").innerHTML = "Comments could not be loaded";
	//displayThis is the actual html string that will be displayed
	var displayThis = "";
	//this block creates the XMLHttpRequest that will be sent to data.php
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			//everything in this block executes when the reuqest is recieved
			//this.response is $return from data.php
			commentArray = JSON.parse(this.response);
			var start = (currentPage - 1)* commentsPerPage;
			var stop = start + commentsPerPage;
			var totalComments = commentArray.length;
			//write the debug lines into the title in index.php
			document.getElementById("current-page").innerHTML = currentPage;
			document.getElementById("start").innerHTML = start;
			document.getElementById("stop").innerHTML = stop;
			//for i = index of first row in page, to index of last row in page or just last row, whichever comes first
			for (i = start; i < stop && i < totalComments; i++){
				var row = commentArray[i];
				//concat displayThis with new html per comment
				displayThis += rowToString(row);
			}
		}
		//put all that html into the botbox in index.php
		document.getElementById("display").innerHTML = displayThis;
	}
	//send this request to data.php
	xmlhttp.open("POST","data.php",true);
	xmlhttp.send();
}

//turns a single row into a html string
function rowToString(row) {
	var commentHTML = "<div class='message-container'><div id='title-container'><div id='name-linked'><a href='mailto:" + row.Email + "'>" + row.PostName + "</a></div><div id='date'>" + convertFromUnixTimestamp(row.PostDate) + "</div></div><hr><div id='message-content'>" + row.Message + "</div></div>"
	return commentHTML
}

function convertFromUnixTimestamp(timestamp) {
	var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
	var a = new Date(timestamp*1000);
	var year = a.getFullYear();
	var month = months[a.getMonth()];
	var date = a.getDate();
	var time = month + ' ' + date + ' ' + year;
	return time;
}

//Kyle's char count function
function zeroCount(){
	maxChar = document.getElementById("message-style").maxLength;
	document.getElementById('counter_div').innerHTML = '0/'+maxChar;
}
function counter(msg){
	document.getElementById('counter_div').innerHTML = msg.value.length+'/'+maxChar;
}
function blankStatus() {
    document.getElementById('status_container').innerHTML = "";
}
  