


$(document).ready(function(){
	
	$(document).on('submit','.login-form',function(){
		
		$.ajax({
			type:'post',
			cache:false,
			url:'login1.php',
			data:$('.login-form').serialize(),
			beforeSend: function(){
									$("#login").html('<span class="">loging in...</span>');
								},
			success: function(response){ 
											if(response=='ok')
															{
																window.location="index.php";
															}
											else
											{
												$('.error').html('<div class="text-danger">'+response+'</div>');
											}
										}	
		
		});
		
	return false;	
	});
	
	

});