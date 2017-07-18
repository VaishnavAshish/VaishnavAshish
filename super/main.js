				
var toggle = true;
$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
						
							

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

           
        });
 




$(document).ready(function(){
$(document).on('change','select[name="category"]',function(){
	var cat_id=$('select[name="category"]').val();
	
	$.ajax({
		type:'post',
		url:'get_topic.php',
		data:{'cat_id':cat_id},
		dataType:'json',
		success:function(response){
			$('.topic-select').html('<option value="">Please select topic</option>');
			for(var i=0;i<response['data'].length;i++)
			{
			var topic = response['data'][i]['topic'];
			var topic_id = response['data'][i]['topic_id'];
			$('.topic-select').append('<option value="'+topic_id+'">'+topic+'</option>');
			}
			
		}
	});
});	


//Change status of registered user
	$(document).on('click','change-status',function(){
		$.ajax({
			type:'post',
			url:'index.php';
			data:
		});
	});	
	

});