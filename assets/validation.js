$(document).ready(function(){

	$('#validationFirstName').keyup(function(){
		
		$.ajax({
			url: "validate",
			type: "post",
			datatype: 'json',
			data: "value="+$(this).val()+"&type=firstName",
			success:function(result){
				console.log(result);
				var obj = jQuery.parseJSON(result);
					if(obj.response == 1)
					{
						$('#validationFirstName').next().css({backgroundColor:"#53a93f"});
						$('#validationFirstName').next().html('<i class="icon-check icon-1x" style="color:white"></i>');
						$('.firstnamevalidation').empty();
						$('.firstnamevalidation').html('<br><div class="alert alert-success">'+obj.errorCode+'</div>');	
					}else if(obj.response == 0)
					{
						$('#validationFirstName').next().css({backgroundColor:"#ff8080"});
						$('#validationFirstName').next().html('<i class="icon-remove icon-1x" style="color:white"></i>');
						$('.firstnamevalidation').empty();
						$('.firstnamevalidation').html('<br><div class="alert alert-danger">'+obj.errorCode+'</div>');		
					}
				
			}
			
		});
		
	});

});