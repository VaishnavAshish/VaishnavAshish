$(document).ready(function(){
	
//change status of user				
$(document).on('click','.change-status',function(){
	    var uid=$(this).val();
		var status = $(this).attr('status');
		if(status=='3'){ 
		return false;
		}
		else{
			$.ajax({
				type:'POST',
				url:'change_status.php',
				data:{'user_id':uid, 'user_status':status},
				success: function(response){
					
					if(response=="true")
					{   alert('Status Changed');
						$('#table').load('index.php'+ ' #table');
					}
				}
			});	
		}
	
});
	
$(document).on('change','select[name="category"]',function(){
	var cat_id=$('select[name="category"]').val();
	$.ajax({
		type:'post',
		url:'get_topic.php',
		data:{'cat_id':cat_id},
		dataType:'json',
		beforeSend:function(){
								$('.topic-select').html('<option value="">Loading Topics....</option>');
								},
		success:function(response){
			$('.topic-select').html('<option value="">Please select topic</option>');
			if(response['data']!='NULL'){
				for(var i=0;i<response['data'].length;i++)
				{
				var topic = response['data'][i]['topic'];
				var topic_id = response['data'][i]['topic_id'];
				$('.topic-select').append('<option value="'+topic_id+'">'+topic+'</option>');
				}
			}
			
			
		}
	});
});

//Load the subtopics according to topics   	
$(document).on('change','select[name="topic_id"]',function(){
	var topic_id=$('select[name="topic_id"]').val();
			$.ajax({
					type:'post',
					url:'get_subtopic.php',
					data:{'topic_id':topic_id},
					dataType:'json',
					beforeSend:function(){
											$('.sub_topic-select').html('<option value="">Loading Sub-topics....</option>');
											},
					success:function(response){
						$('.sub_topic-select').html('<option value="">Please select Subtopic</option>');
						if(response['sub_data']!='NULL'){
							for(var i=0;i<response['sub_data'].length;i++)
							{
							var subtopic = response['sub_data'][i]['subtopic'];
							var subtopic_id = response['sub_data'][i]['sub_id'];
							$('.sub_topic-select').append('<option value="'+subtopic_id+'">'+subtopic+'</option>');
							}
						}
						
						
					}
				});
});	

});  //document.ready


