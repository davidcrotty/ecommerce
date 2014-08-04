$(document).ready(function(){
    
        	var list = ["brand","price"];
    
    //menu item hover
    $('.customhover').hover(function(){
            $(this).animate({backgroundColor:'#2E8AE5'}, 'slow');
            
        
        },function(){
            $(this).animate({backgroundColor:'rgb(255,255,255,0)'}, 'fast');
        });
   
    
    
    $('.hoverItem').hover(function(){
        $(this).animate({backgroundColor:'#FFFFFF',color:'#000000'}, 'slow');
            
        
        },function(){
        $(this).animate({backgroundColor:'#5E9DC8',color:'#FFFFFF'}, 'fast');
    
    });
    
    var bgcol = $('.jumbohover').css('backgroundColor');
    
    $('.jumbohover').hover(function(){
        $(this).animate({backgroundColor:'#FFFFFF',color:'#000000'}, 'slow');
            
        
        },function(){
        $(this).animate({backgroundColor:bgcol}, 'fast');
    
    });
    
    var hoverOnce = false;
    var $computersPanel = $('<li class="list-group-item customlistbg hoverItem">Computers<span class="customright"> <i class="icon-chevron-right icon-medium"></i></span></li>'); 
    
    var $hardwarePanel = $('<li class="list-group-item customlistbg hoverItem">Hardware<span class="customright"> <i class="icon-chevron-right icon-medium"></i></span></li>');
    
    var $peripheralsPanel = $('<li class="list-group-item customlistbg hoverItem">Peripherals<span class="customright"> <i class="icon-chevron-right icon-medium"></i></span></li>');
    
    var $monitorsPanel = $('<li class="list-group-item customlistbg hoverItem">Monitors<span class="customright"> <i class="icon-chevron-right icon-medium"></i></span></li>');
    
    $('.customProdHover ul').hover(function(){
    
        if(!hoverOnce)
        {
            hoverOnce = true;
            $(this).append($computersPanel).hide().slideDown('fast');
            
            $(this).append($hardwarePanel).hide().slideDown('fast');
            
            $(this).append($peripheralsPanel).hide().slideDown('fast');
            
            $(this).append($monitorsPanel).hide().slideDown('fast');
        }
        
    });
    
    $($computersPanel).hover(function(){
        $(this).animate({backgroundColor:'#FFFFFF',color:'#000000'}, 'slow');
            
        
        },function(){
        $(this).animate({backgroundColor:'#5E9DC8',color:'#FFFFFF'}, 'fast');
    
    });
    
    $($hardwarePanel).hover(function(){
        $(this).animate({backgroundColor:'#FFFFFF',color:'#000000'}, 'slow');
            
        
        },function(){
        $(this).animate({backgroundColor:'#5E9DC8',color:'#FFFFFF'}, 'fast');
    
    });
    
    $($peripheralsPanel).hover(function(){
        $(this).animate({backgroundColor:'#FFFFFF',color:'#000000'}, 'slow');
            
        
        },function(){
        $(this).animate({backgroundColor:'#5E9DC8',color:'#FFFFFF'}, 'fast');
    
    });
    
    $($monitorsPanel).hover(function(){
        $(this).animate({backgroundColor:'#FFFFFF',color:'#000000'}, 'slow');
            
        
        },function(){
        $(this).animate({backgroundColor:'#5E9DC8',color:'#FFFFFF'}, 'fast');
    
    });
    
    var $someString = "Your password must contain at least 5 characters and contain a number";
    var $passwordRequire = $('<br><div class="alert alert-danger" role="alert"><a href="#" class="alert-link">'+$someString+'</a></div>');
    
    var $passwordSuccess = $('<br><div class="alert alert-success" role="alert"><a href="#"class="alert-link">Valid password</a></div>');
    
    //WARNING backspace DOESN'T trigger the textbox even
    //********************FIX************************
    $('#exampleInputPassword1').keypress(function(){
        
        
        
        var $input = $('#exampleInputPassword1').val();
        if($input.match(/\w{5}\d*/))
        {
            $($passwordRequire).hide();
            $('.customAdding').append($passwordSuccess);
            $($passwordSuccess).show();
        }else{
            $($passwordSuccess).hide();
            $('.customAdding').append($passwordRequire);
            $($passwordRequire).show();
        }
        
        
    });
    
    //Note, use AJAX to enable/disable forms - more reliable, less duplicate code?
    //(as server side validation will still be required)
    
    $(':checkbox').change(function(){
        
        if($(this).is(':checked'))
        {
         //lock   
            $('#deliveryForm input').prop("disabled", true);
        }else{
         //unlock
        $('#deliveryForm input').prop("disabled", false);
        }
    });
    //array consisting of all elements pertaining .custom indent
    
    $(".customIndent").hover(function(){
            //check array for html match
            //do nothing if true
                     $(this).animate({backgroundColor:'#2E8AE5',color:'#FFFFFF'}, 'slow');
        },function(){
                     $(this).animate({backgroundColor:'rgb(255,255,255,0)',color:'#000000'}, 'fast');         
        });
        
    var mainRemove = function($sorter){
    	$($sorter).removeClass("sorter");
	            
	    $($sorter).find('i').remove();
	    $($sorter).removeClass("selected");
    	
    };
    
    $("div p").click(function(){

        if($(this).hasClass("sorter"))
        {
            $(this).removeClass("sorter");
            
            $(this).find('i').remove();
             $(this).removeClass("selected");
        }else
        {
        	//if hasclass brand - go through each and do the same
        	if($(this).hasClass('brand'))
        	{
        		$('.brand').each(function(){ 
        			mainRemove(this);
        		});
        	}else if($(this).hasClass('processor'))
        	{
				$('.processor').each(function(){ 
        			mainRemove(this);
        		});        		
        	}
        	
            $(this).addClass("sorter");
            $(this).prepend('<i class="icon-stop"></i>');
            $(this).addClass("selected");
        }
        

    });
	
	    $('#usernameInput').keyup(function(){
    
        //send ajax request
		
		$.ajax({
			//ajax class
			url: "validate",
			type: "post",
			datatype: 'json',
			data: "value="+$(this).val()+"&type=" + "email",
			success:function(result){

					//if result == false show bad html
					var obj = jQuery.parseJSON(result);
					if(obj.response == 1)
					{
						$('#usernameInput').next().css({backgroundColor:"#53a93f"});
						$('#usernameInput').next().html('<i class="icon-check icon-1x" style="color:white"></i>');
						$('.customEmailValidation').empty();
						$('.customEmailValidation').html('<br><div class="alert alert-success">'+obj.errorCode+'</div>');	
						//$('.customEmailValidation div').removeClass('alert-danger');
					}else if(obj.response == 0)
					{
						$('#usernameInput').next().css({backgroundColor:"#ff8080"});
						$('#usernameInput').next().html('<i class="icon-remove icon-1x" style="color:white"></i>');
						$('.customEmailValidation').empty();
						//$('.alert-success').remove();
						$('.customEmailValidation').html('<br><div class="alert alert-danger">'+obj.errorCode+'</div>');		
					}

				}
			});
			
    	});
    	
		var findClass = function(mainFinder){
			var mainReturnValue;
			
			if($(mainFinder).hasClass('brand'))
			{
				mainReturnValue = "brand";
			}else if($(mainFinder).hasClass('processor'))
			{
				mainReturnValue = "processor";
			}
			
			return mainReturnValue;
		};
    	
    	$('.ajaxFilter').click(function(){
				
				//need array to push the query object to
				var queryArray = [];
				
				
				
    			var queryBuilder = "";
		    	var splitValue = $(this).text().split(" ");
    			var part = splitValue[0];
    			//console.log(part);
    			//now runs, just need to filter out inner html
    			//console.log("originalHtml: "+$(this).text());
    		//loop through all paragraphs to see if they contain class 'selected'
    		$('.ajaxFilter').each(function(){
    			

    			
    			if($(this).hasClass('selected'))
    			{
    				//build
    				//console.log("selected");
		    		var queryObject= {type:"", value:""};
					//queryObject['type'] = list[i];
					
		    		var splitValue = $(this).text().split(" ");
    				var part = splitValue[0];
    				 //find class
    				queryObject['type'] = findClass(this); 
    				queryObject['value'] = part;
					queryArray.push(queryObject);
		    					

    				//if it does see if its classes match an array of filters use as key pair
    			}
    		});
    		//trim by removing &
    		var query = JSON.stringify(queryArray);
    		//console.log("Final q: "+query);
    		
    		//console.log("Q:"+query);
    		

    		//send in ajax
    		$.ajax({
    			url: "refreshProducts",
				type: "post",
				datatype: 'json',
				data: "value="+query,	
				success:function(result){
					
					var htmlData = $.parseJSON(result);
					//clear html in div tags
					//fill with html
					$('#productBody').empty();
					for(var i = 0; i < htmlData.length; i++)
					{
						$('#productBody').append(htmlData[i]);	
					}
					
				}
    			
    		});
    	});
    	
    	$('#passwordInput').keyup(function(){
    		
    		$.ajax({
    		url: "validate",
			type: "post",
			datatype: 'json',
			data: "value="+queryObject,
			success:function(result){
				console.log(result);
				var obj = jQuery.parseJSON(result);
					if(obj.response == 1)
					{
						$('#passwordInput').next().css({backgroundColor:"#53a93f"});
						$('#passwordInput').next().html('<i class="icon-check icon-1x" style="color:white"></i>');
						$('.customPasswordValidation').empty();
						$('.customPasswordValidation').html('<br><div class="alert alert-success">'+obj.errorCode+'</div>');	
					}else if(obj.response == 0)
					{
						$('#passwordInput').next().css({backgroundColor:"#ff8080"});
						$('#passwordInput').next().html('<i class="icon-remove icon-1x" style="color:white"></i>');
						$('.customPasswordValidation').empty();
						$('.customPasswordValidation').html('<br><div class="alert alert-danger">'+obj.errorCode+'</div>');		
					}
				
			}
    			
    		});
    		
    	});
    	
    	$('#repasswordInput').keyup(function(){
    		
    		$.ajax({
    		url: "validate",
			type: "post",
			datatype: 'json',
			data: "value="+$(this).val()+"&type=" + "repassword"+"&match="+$('#passwordInput').val(),
			success:function(result){
				var obj = jQuery.parseJSON(result);
					if(obj.response == 1)
					{
						$('#repasswordInput').next().css({backgroundColor:"#53a93f"});
						$('#repasswordInput').next().html('<i class="icon-check icon-1x" style="color:white"></i>');
						$('.customRePasswordValidation').empty();
						$('.customRePasswordValidation').html('<br><div class="alert alert-success">'+obj.errorCode+'</div>');	
					}else if(obj.response == 0)
					{
						$('#repasswordInput').next().css({backgroundColor:"#ff8080"});
						$('#repasswordInput').next().html('<i class="icon-remove icon-1x" style="color:white"></i>');
						$('.customRePasswordValidation').empty();
						$('.customRePasswordValidation').html('<br><div class="alert alert-danger">'+obj.errorCode+'</div>');		
					}
				
			}
    			
    		});
    		
    	});
    

    
});

