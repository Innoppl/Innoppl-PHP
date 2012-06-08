<?php foreach($user_details as $row){

$uid = $row['uid'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$email = $row['email'];
$phone = $row['phone'];

}

// Executed only for doctor login
if($user_role == "Doctor"):
	foreach($alias_data as $row)
	{
		$first_name_one = $row['first_name_one'];
		$last_name_one = $row['last_name_one'];
		$first_name_two = $row['first_name_two'];
		$last_name_two = $row['last_name_two'];
		$first_name_three = $row['first_name_three'];
		$last_name_three = $row['last_name_three'];
	}
endif;

// Fetches the module value from URL
$main_url = $this->uri->segment(1);

?>

<div id="right_main">
    
        
        <div class="body_content_main">
			<!-- Bread Crumb starts -->
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
<form id="Edit_User" action="<?php echo base_url(); ?>user/edit/<?php echo $uid; ?>" method="post" autocomplete="off">
	<fieldset>
	
	 <table class="add_ta" width="100%">
	 
		
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name" value="<?php echo $first_name;?>" required></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name" value="<?php echo $last_name;?>" required></div>
			</td></tr>
			<tr><td><label for="required_field">Email ID</label></td><td>
				<div><input type="text" id="required_field" name="email_id" value="<?php echo $email;?>" required></div>
			</td></tr>
			<tr><td><label for="required_field">Phone</label></td><td>
				<div><input type="text" id="required_field" name="phone" value="<?php echo $phone;?>" required></div>
			</td></tr>
			<tr><td><label for="required_field">Privelege</label></td><td>
				<div><select id="role_select" name="role_select" class="sele"><?php
				foreach ($all_roles as $row)
				{ 
					if($row['name'] == $user_role):
				?>
            	<option value="<?php echo $row['rid']; ?>" selected><?php echo $row['name']; ?></option>
				<?php
					else:
				?>
				<option value="<?php echo $row['rid']; ?>"><?php echo $row['name']; ?></option>
				<?php
					endif;
				} ?></select></div>
			</td></tr>
		<?php
		if($user_role == "Doctor"):
		?>
			<tr><td colspan="2">
			<div id="alias_name">
			<i>Alias names(only for Doctors)</i>
			<br/><br/>
			<fieldset><legend><i> Set One </i></legend>
			<table>
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name_one" value="<?php echo $first_name_one;?>" /></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name_one" value="<?php echo $last_name_one;?>" /></div>
				</table>
			</fieldset>
			
			<fieldset><legend><i> Set Two </i></legend>
			<table>
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name_two" value="<?php echo $first_name_two;?>" /></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name_two" value="<?php echo $last_name_two;?>" /></div>
			</td></tr>
			</table>
			</fieldset>
			
			<fieldset><legend><i> Set Three </i></legend>
			<table>
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name_three" value="<?php echo $first_name_three;?>" /></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name_three" value="<?php echo $last_name_three;?>" /></div>
			</td></tr>
			</table>
			</fieldset>
			</div>
			</td></tr>
		<?php 
		endif;
		?>
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