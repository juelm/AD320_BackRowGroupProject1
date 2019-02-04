
var commentArray = new Array();
var commentsPerPage = 8;
var currentPage = 1;
var maxPages = 10;
var maxChar;
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

function displayPage(page) {
	currentPage = page;
	document.getElementById("display").innerHTML = "Comments could not be loaded";
	var displayThis = "";
	xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
			commentArray = JSON.parse(this.response);
			var start = (currentPage - 1)* commentsPerPage;
			var stop = start + commentsPerPage;
			var totalComments = commentArray.length;
			document.getElementById("current-page").innerHTML = currentPage;
			document.getElementById("start").innerHTML = start;
			document.getElementById("stop").innerHTML = stop;
			for (i = start; i < stop && i < totalComments; i++){
				var row = commentArray[i];
				displayThis += rowToString(row);
			}
		}
		document.getElementById("display").innerHTML = displayThis;
	}
	
	//update bottom buttons
	
	xmlhttp.open("GET","data.php?q=read",true);
	xmlhttp.send();
}

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
	var time = month + ' ' + date + ' ' + year
	return time;
}

function zeroCount(){
	maxChar = document.getElementById("message-style").maxLength;
	document.getElementById('counter_div').innerHTML = 
		'0/'+maxChar;
}
function counter(msg){
	document.getElementById('counter_div').innerHTML = 
		msg.value.length+'/'+maxChar;
}