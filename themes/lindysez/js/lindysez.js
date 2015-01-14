/*-----------------------------------------------------------*/
// Date Functions
/*------------------------------------------------------------*/
function getMonthStr(m){
	var abrMonthStr = ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
	var longMonthStr = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	return longMonthStr[m];
}

function getLocalDateStr(){

	var today = new Date();
	var d = today.getDate();
	var m = today.getMonth();
	var mmm = getMonthStr(m);
	var yyyy = today.getFullYear();
	dateStr = mmm + " " + d + ", " + yyyy;
	return dateStr;
}
