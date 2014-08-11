$(document).ready(function(){


	$('#usernameInput').keyup(function(){

		var compare = $(this).val();
		var regexp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		
		if(compare.match(regexp))
		{
			$("#usernameInputDiv").addClass('has-success');
			//rememebr to add div
		}else
		{
			$("#usernameInputDiv").removeClass('has-success');
			//remember to add div
		}
		
	});
	
		$('#passwordInput').keyup(function(){
		console.log("Password entered");
		var compare = $(this).val();
		var regexp = /^.*(?=.{4,10})(?=.*\d)(?=.*[a-zA-Z]).*$/;
		
		if(compare.match(regexp))
		{
			console.log("match!");
			$("#passwordInputDiv").addClass('has-success');
			//rememebr to add div
		}else
		{
			$("#passwordInputDiv").removeClass('has-success');
			//remember to add div
		}
		
	});
	
		$('#repasswordInput').keyup(function(){

		var compare = $(this).val();
		
		
		if(compare === $('#passwordInput').val())
		{
			console.log("match!");
			$("#repasswordInputDiv").addClass('has-success');
			//rememebr to add div
		}else
		{
			$("#repasswordInputDiv").removeClass('has-success');
			//remember to add div
		}
		
	});

});