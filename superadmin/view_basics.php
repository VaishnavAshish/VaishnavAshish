<?php 
	require('sidebar.php');
	require('header.php');
?>

          <div class="right_col" ng-app="adminPanel" ng-controller="subtopicADDCtrl as subtopic" role="main">
			<?php include("index_counter.php");?>
			<div class="x_title">
                    <h1>Add SubTopic</h1>
                    <div class="clearfix"></div>
                  </div>
			<form  method="POST" action="" class="form-horizontal form-label-left">
                      
                      <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Category</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select id="category" onChange="showUser(document.getElementById('newssearch').value,document.getElementById('category').value)" class="form-control" name="category" ng-model="subtopic.selectedCategory"  ng-change="subtopic.fetchTopic(subtopic.selectedCategory,'Basics')">
									<option value="">Select Category</option>
									<?php 
										$j = 0;
										$query = mysql_query("Select * from `category` where page='topics.php'");
										while($row=mysql_fetch_array($query))
										{
											
										
									?>
									<option value="<?php echo htmlspecialchars($row['cat_id'],ENT_QUOTES);?>">
											<?php echo htmlspecialchars($row['category'],ENT_QUOTES);?>
									</option>
										<?php } ?>
								</select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select Topic / Sub Catgory</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="form-control" id="topicID" onChange="showUser(document.getElementById('newssearch').value,document.getElementById('category').value,document.getElementById('topicID').value)" ng-model="subtopic.selectedTopic" ng-change="subtopic.nextFetch(subtopic.selectedTopic.split(','),'Basics')" >
									<option value="">{{subtopic.topictext?subtopic.topictext:'Please Select'}}</option>
									<option ng-repeat="topic in subtopic.topic track by $index"  value="{{$index}},{{topic.topic_id}},{{topic.type}}">
										{{topic.topic}}
									</option>
								</select>
                        </div>
                      </div>
					  
					  <div ng-if="subtopic.showFolder" class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Select sub Category Topic</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
							
                          <select class="form-control" ng-model="subtopic.selectedSubTopic" ng-change="subtopic.fetchsubTopic(subtopic.selectedSubTopic,'Question',1)" onChange="showUser(document.getElementById('newssearch').value,document.getElementById('category').value,document.getElementById('topicID').value,document.getElementById('folderID').value)" id="folderID">
									<option value="">{{subtopic.foldertext?subtopic.foldertext:'Please Select'}}</option>
									<option ng-repeat="topic in subtopic.folder track by $index" value="{{topic.f_id}}">
										{{topic.f_name}}
									</option>
								</select>
                        </div>
                      </div>
					  <input type="hidden" id="folderID" ng-if="!subtopic.showFolder">
					  
					 
                      
                      
                      <div class="ln_solid"></div>
                    </form>

    		<div class="col-md-6 col-xs-12" style="width:100%;">
				<div class="x_panel">
						 <div class="x_title">
							<h2>Added<small>Modules</small></h2>
							<div class="clearfix"></div>
						 </div>
				   <div class="x_content">
						 <font color="green"><?php echo @$msg_delete;?></font>
							<br>
								Search:
								<input style="width:100%;" id="newssearch" type="text" placeholder="Search" name="Search" value=" " onkeyup="showUser(document.getElementById('newssearch').value);" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search';}" required="">
							<br>
							<div id="txtHint"></div>
					</div>
						  
				</div>
			</div>

<script>
showUser();
function showUser(search,cat_id,topic_id,folder_id,subtopicID) {
var str=" ";
if(cat_id){str+="cat_id="+cat_id;}
if(topic_id){var topic=topic_id.split(",");str+="&topic_id="+topic[1];}
if(folder_id){str+="&folder_id="+folder_id;}
if(subtopicID){str+="&sub_id="+subtopicID;}
if(search && search!=""){str+="&q="+search;}
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
		console.log(str);
        xmlhttp.open("GET","fetch_basic.php?"+str,true);
        xmlhttp.send();
    
}
</script> 
        
        </div>
		
		
		<!-- page content -->

        <!-- /page content -->
<?php 
require('footer.php');    
?>
