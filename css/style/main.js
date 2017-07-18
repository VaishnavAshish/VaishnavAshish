function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}

															
var original = $('#modal').html();
var original_login_button = $('.user_info').html();
var valid=false;
$(document).ready(function(){
	
	
	$(document).on('keypress','.password',function(){
		var pass_pattern=/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/;
		if(pass_pattern.test($('.password').val()))
		{
			$('.password').next().html('');
		}
		else
		{ 
			$('.password').next().html('<p class="text-danger">Password must contain Minimum \
			<ul><li>Eight characters</li> <li>Atleast one letter</li> <li>One number </li> <li>One special character</li></p>');
		}
	});
	
	$(document).on('keypress','.confirm_password',function(){
		if(($('.password').val())==($('.confirm_password').val()))
		 { 
				$('.confirm_password').next().html('');
		}
	  
		else { 
				$('.confirm_password').next().html('<p class="text-danger">Password does\'nt match</p>');
			}
	});
	
	$(document).on('submit','.register_form',function(){
	    $.ajax({
				 type:'post',
				 cache:false,
				 dataType:'json',
				 url:'register.php',
				 data:$('.register_form').serialize(),
				 beforeSend: function(){
								$("#register").html('<span class=""> Registering...</span>');
				 },
				 success: function(response){
												$('#modal').html('<div class="text-danger" style="text-align:center;"><h2>'+response.msg+'</h2></div>');
												setTimeout(function(){
																		$('#modal').html(original);
																		$('#close-modal').click();
																		$('.modal-backdrop ,fade ,in').remove();
																		$("#header").load("header.php");
																	},2000
															);
															
														
										   }
			   });
		return false;
	});
	
	$(document).on('submit','.login_form',function(){
	    $.ajax({
				 type:'post',
				 cache:false,
				 url:'login.php',
				 dataType:'json',
				 data:$('.login_form').serialize(),
				 beforeSend: function(){
								$("#login").html('<span class="">Loging in...</span>');
				 },
				 success: function(response){   if(response.status=="login") 
												{	
													$('#modal').html('<div class="text-danger" style="text-align:center;"><h2>'+(response.msg)+'<br>Welcome '+(response.username)+' </h2></div>');
													setTimeout(function(){  
																			$('#modal').html(original);
																			$('#close-modal').click();
																			$('.modal-backdrop ,fade ,in').remove();
																			$("#header").load("header.php");
																		 },1);
												}
														
										   }
			   });
			   
		return false;
	});
	
	$(document).on('click','.logout',function(){
		
		$.ajax({
				type:'post',
				cache:false,
				url:'logout.php',
				data:{ status:'logout'},
				success: function(result){
					if(result=="ok"){
					$("#header").load("header.php");
					}
				}
		})
	});
});