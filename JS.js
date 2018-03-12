
// Check fullfilment of registration form (DOESN'T WORK)
function check_reg() {

	var emailReg = $('.emailReg')[0].value;
	var passReg = $('.passReg')[0].value;
	var passRegCheck = $('.passReg')[1].value;s

	if (emailReg.length > 3) {
		$('.emailReg')[0].innerHTML = "All rigth";
		$('.emailReg')[0].style.color = "green";
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



// TO DO List
$(function() {
	$("#add").on("click", function()
{
	var val = $("input").val();
	if(val!== '') {
		var elem = $("<li></li>").text(val);
		$(elem).append("<button class='rem'>X</button>");
		$("mylist").append(elem);
		$("input").val("");
		$(".rem").on("click"), function() {
			$(this).parent().remove();
		};
}
});
});
