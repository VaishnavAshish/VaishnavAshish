$(document).ready(function(){
	
$(document).on('change','select[name="folderCategory"]',function(){
	var data={};
	data.cat_id=$('select[name="folderCategory"]').val();
	data.filter="Folder";
	$.ajax({
		type:'post',
		url:'get_topic.php',
		data:{'data':data},
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

//topic type question
$(document).on('change','select[name="category-question"]',function(){
	var data={};
	data.cat_id=$('select[name="category-question"]').val();
	data.filter="Question";
	$.ajax({
		type:'post',
		url:'get_topic.php',
		data:{'data':data},
		dataType:'json',
		beforeSend:function(){
								$('.topic-type-question').html('<option value="">Loading Topics....</option>');
								},
		success:function(response){
			$('.topic-type-question').html('<option value="">Please select topic</option>');
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

//end topic type question


//select topic type videos
$(document).on('change','select[name="category-videos"]',function(){
	var data={};
	data.cat_id=$('select[name="category-videos"]').val();
	data.filter="Video";
	$.ajax({
		type:'post',
		url:'get_topic.php',
		data:{'data':data},
		dataType:'json',
		beforeSend:function(){
								$('.topic-type-video').html('<option value="">Loading Topics....</option>');
								},
		success:function(response){
			$('.topic-type-video').html('<option value="">Please select topic</option>');
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
//end ..select topic type videos



//select topic type Basics
$(document).on('change','select[name="category-basics"]',function(){
	var data={};
	data.cat_id=$('select[name="category-basics"]').val();
	data.filter="Basic";
	$.ajax({
		type:'post',
		url:'get_topic.php',
		data:{'data':data},
		dataType:'json',
		beforeSend:function(){
								$('.topic-type-basic').html('<option value="">Loading Topics....</option>');
								},
		success:function(response){
			$('.topic-type-basic').html('<option value="">Please select topic</option>');
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
//end ..select topic type Basics


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




//Load the test heading according to test category 
$(document).on('change','select[name="test_category"]',function(){
	var tc_id=$('select[name="test_category"]').val();
	$.ajax({
		type:'post',
		url:'get_test_heading.php',
		data:{'tc_id':tc_id},
		dataType:'json',
		beforeSend:function(){
								$('.heading').html('<option value="">Loading Heading....</option>');
								},
		success:function(response){
			$('.heading').html('<option value="">Please select heading</option>');
			if(response['data']!='NULL'){
				for(var i=0;i<response['data'].length;i++)
				{
				var th_id = response['data'][i]['th_id'];
				var th_name = response['data'][i]['th_name'];
				$('.heading').append('<option value="'+th_id+'">'+th_name+'</option>');
				}
			}
			
			
		}
	});
});



//Load the test Name according to test Heading
$(document).on('change','select[name="heading"]',function(){
	var th_id=$('select[name="heading"]').val();
	$.ajax({
		type:'post',
		url:'get_test_name.php',
		data:{'th_id':th_id},
		dataType:'json',
		beforeSend:function(){
								$('.test_name').html('<option value="">Loading Test Names....</option>');
								},
		success:function(response){
			$('.test_name').html('<option value="">Please Select Test Names</option>');
			if(response['data']!='NULL'){
				for(var i=0;i<response['data'].length;i++)
				{
				var tn_id = response['data'][i]['tn_id'];
				var tn_name = response['data'][i]['tn_name'];
				$('.test_name').append('<option value="'+tn_id+'">'+tn_name+'</option>');
				}
			}
			
			
		}
	});
});



//filtering the questions on view_question page
var cat_id,topic_id,sub_id,link;

//reset topic and subtopic when change the category
$(document).on('change','select[name="category_filer"]',function(){
$('[name=topic_filter]').val( '' );	
$('[name=subtopic_filter]').val( '' );
});

//reset  subtopic when change the topic
$(document).on('change','select[name="topic_filter"]',function(){
$('[name=subtopic_filter]').val( '' );
});

$(document).on('change','.select-question',function(){
	 cat_id=$('select[name="category_filer"]').val();
	 topic_id=$('select[name="topic_filter"]').val();
	 sub_id=$('select[name="subtopic_filter"]').val();
	
    if(cat_id){
	   link="view_question.php?cat_id="+cat_id;
		}
	if(topic_id){
		link+="&topic_id="+topic_id;
	}
    if(sub_id){
		
		link+="&sub_id="+sub_id;
		
	}	
	window.location=link;
	
});

//starts basics view table filter
$(document).on('change','select[name="basic-filter"]',function(){
var subtopic_id = $('select[name="basic-filter"]').val();
if(subtopic_id)
	{
		link="view_basics.php?sub_id="+subtopic_id;
	}
	window.location=link;
});
//ends basics view table filter

//starts videos filter
$(document).on('change','select[name="videos-filter"]',function(){
var subtopic_id=$('select[name="videos-filter"]').val();
if(subtopic_id)
	{
		link="view_videos.php?sub_id="+subtopic_id;	
	}
	window.location=link;
});
//ends videos filter

});  //document.ready


