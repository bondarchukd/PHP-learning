// recaptcha
$("#login_form").submit(function(event) {
		   var recaptcha = grecaptcha.getResponse()
		   if (recaptcha == "") {
		      event.preventDefault();
		      alert("Please check the recaptcha");
		   }
		});

// Check fullfilment of registration form (DOESN'T WORK)
function check_reg() {

	var emailReg = $('.emailReg')[0].value;
	var passReg = $('.passReg')[0].value;
	var passRegCheck = $('.passReg')[1].value;

	if (emailReg.length > 3) {
		$('.emailReg')[0].innerHTML = "All rigth";
		$('.emailReg')[0].style.color = "green";
	}

	if (passReg.length < 3) {
		$('.passReg')[0].innerHTML = "Password must has at least 3 symbols"
	}

	if (passReg !== passRegCheck) {
		$('.emailReg')[0].innerHTML = "Passwords don't match!"
	}
}

// Drop-Down menu
$(function() {
	$("#item").click(function() {
		   $( "#submenu" ).slideToggle( "slow", function() {

            });
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
