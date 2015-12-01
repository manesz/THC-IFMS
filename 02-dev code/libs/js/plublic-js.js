// JavaScript Document
$(function() {
	 $('.havetooltips').tooltip();	 
	 $("#btn_logout").click(function() { logout(); });	 
});


function logout() {	
	$.post("script.php",{act:'logout'},function(data) {
		if (data=="") { window.location.href="login.php"; }												  
	});
}

function go_anchor(anchor_name) {
	$('html,body').animate({scrollTop: $("#"+anchor_name).offset().top},'slow');				
}

//พิมพ์เฉพาะตัวเลขเท่านั้น
function IsNumber(txt) 
{ 
	var filters=/^([0-9]*)$/i;
	var returnval=filters.test(txt)
	return returnval
} 

