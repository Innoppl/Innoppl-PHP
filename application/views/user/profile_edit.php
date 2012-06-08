<?php foreach($user_details as $row){

$uid = $row['uid'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$phone = $row['phone'];

}

// Fetches the module value from URL
$main_url = $this->uri->segment(1);

?>

<div id="right_main">
        <div class="body_content_main">
			<!-- Bread Crumb Starts -->
        	<div class="breadcrumb_main">
            	<ul class="breadcrumb">
                	<li><?php echo anchor('user/dashboard','Home');?> /</li>
                    <li><?php if($main_url=="user"): echo anchor('user/lists','Users'); elseif($main_url=="hospital"): echo anchor('hospital/lists','Hospitals'); elseif($main_url=="report"): echo anchor('report/viewreport','Reports'); endif; ?> /</li>
                    <div class="clear"></div>
                </ul>            
            </div> <!-- Bread Crumb end -->
            <div class="view_main">
<h2>Edit User Details</h2>
<!-- HTML Form Starts -->
<form id="Edit_User" action="<?php echo base_url(); ?>user/settings/profile_edit" method="post" autocomplete="off">
	<fieldset>
	
	 <table class="add_ta" width="100%">
	 
		
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name" value="<?php echo $first_name;?>" required></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name" value="<?php echo $last_name;?>" required></div>
			</td></tr>
			<tr><td><label for="required_field">Email ID</label></td><td>
				<div><input type="text" id="required_field" name="email_id" value="<?php echo $email;?>" required readonly></div>
			</td></tr>
			<tr><td><label for="required_field">Phone</label></td><td>
				<div><input type="text" id="required_field" name="phone" value="<?php echo $phone;?>" required></div>
			</td></tr>
			<tr><td></td><td>
				<div><button class="submit"> Update User </button></div>
			</td></tr>
			
			</table>
	</fieldset>
</form>	
<!-- HTML Form Ends -->
</div>
        </div>
        
    </div><!-- Right end -->