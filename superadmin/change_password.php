<?php 
require('sidebar.php');
require('header.php');


	if(isset($_POST["submit"]))
	{	
       $old = crypt(md5($_POST['old']),'$2y$@NTRIKSH$@@Y$#$%2sW@s&8Anxwu@SUbw23828@283hduchd');
	   $new = $_POST['new'];
	   $newc = $_POST['newc'];
		if($new == $newc)
		{   
			$f = crypt(md5($_POST['new']),'$2y$@NTRIKSH$@@Y$#$%2sW@s&8Anxwu@SUbw23828@283hduchd');
	        $query = mysql_query("UPDATE `users` set password='".$f."' where password='".$old."' AND status=0");
			if($query){
				echo "<script>alert('Password Changes for ADMIN ".mysql_insert_id()."');</script>";
			}else {echo "<script>alert('Password Did'nt match');</script>";mysql_error();}
		}
		else echo "<script>alert('Password Did'nt match');</script>";
	}
	
?>

	


 <!-- page content -->
        <div class="right_col" role="main">
			
			<div class="x_title">
                    <h1>Change Passsword</h1>
                    <div class="clearfix"></div>
                  </div>
				<form id="demo-form2" data-parsley-validate method="POST" class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Current Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="password" class="form-control"  placeholder="Enter the Current Password" name="old" required>
                        </div>
                      </div>	
						 <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">New Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="password" class="form-control"  placeholder="Enter New Password" name="new" required>
                        </div>
                      </div>	
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Confirm Password<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                           <input type="text" class="form-control"  placeholder="Re-Enter New Password" name="newc" required>
                        </div>
                      </div>	
					  <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                           <button type="submit" name="submit" class="btn btn-success">Submit</button>
						   <button class="btn btn-primary" type="reset">Reset</button>
                        </div>
                      </div>
			</form>	  
			
    


        
        </div>
        <!-- /page content -->

<?php 
require('footer.php');    
?>
