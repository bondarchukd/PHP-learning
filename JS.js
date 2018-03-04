src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"

// Check fullfilment of registration form (DOESN'T WORK)
function check_reg() {

	var emailReg = $('.emailReg')[0].value
	var passReg = $('.passReg')[0].value
	var passRegCheck = $('.passRegCheck')[1].value

	if (emailReg.length > 3) {
		$('.emailReg')[0].innerHTML = "All rigth"
		$('.emailReg')[0].style.color = "green"
	}

	if (passReg.length < 3) {
		$('.passReg')[0].innerHTML = "Password must have at least 3 symbols"
	}

	if (passReg !== passRegCheck) {
		$('.emailReg')[0].innerHTML = "Passwords don't match!"
	}

}

// Drop-Down menu
$(function() {
	$("#item").click(function() {
		alert()
		("#submenu").slideToogle(500);
	});
});