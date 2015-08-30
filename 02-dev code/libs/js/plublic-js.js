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

