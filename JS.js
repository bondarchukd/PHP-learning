src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"

// Check fullfilment of registration form
function check_reg() {

	var emailReg = $(.'emailReg')[0].value
	var passReg = $(.'passReg')[0].value
	var passRegCheck = $(.'passRegCheck')[0].value

	if (emailReg.length > 3) {
		$(.'emailReg')[0].style.color = "green";
	}

}

// Drop-Down menu
$(function() {
	$("#item").click(function() {("#submenu").slideToogle(500);
	});
});