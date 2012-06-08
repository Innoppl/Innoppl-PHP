<script type="text/javascript">
$(document).ready(function(){
	$('#alias_name').hide();
	$('#role_select').change(function(){

	if($(this).val() == 5)
	{
	$('#alias_name').show();
	}
	else
	{
	$('#alias_name').hide();
	}
	});
});
</script>

<?php

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
            </div> 
			<!-- Bread Crumb end -->
			<div class="view_main">
				<h2>Add User</h2>				

<!-- HTML Form to add User - Block Starts -->				
<form id="Add_User" action="<?php echo base_url(); ?>user/add/" method="post" autocomplete="off">
	<fieldset>
		
		<table class="add_ta" width="100%">
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name" value="" required></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name" value="" required></div>
			</td></tr>
			<tr><td><label for="required_field">Email ID</label></td><td>
				<div><input type="text" id="required_field" name="email_id" value="" required></div>
			</td></tr>
			<tr><td><label for="required_field">Phone</label></td><td>
				<div><input type="text" id="required_field" name="phone" value="" required></div>
			</td></tr>
			<tr><td><label for="required_field">Privelege</label></td><td>
				<div><select id="role_select" name="role_select" class="sele"><?php
				foreach ($users_roles as $row)
				{ ?>
            	<option value="<?php echo $row['rid']; ?>"><?php echo $row['name']; ?></option>
				<?php
				} ?></select></div>
			</td></tr>
			
			
			<tr><td colspan="2">
			<div id="alias_name">
			<i>Alias names(only for Doctors)</i>
			<br/><br/>
			<fieldset><legend><i> Set One </i></legend>
			<table>
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name_one" value="" /></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name_one" value="" /></div>
				</table>
			</fieldset>
			
			<fieldset><legend><i> Set Two </i></legend>
			<table>
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name_two" value="" /></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name_two" value="" /></div>
			</td></tr>
			</table>
			</fieldset>
			
			<fieldset><legend><i> Set Three </i></legend>
			<table>
			<tr><td><label for="required_field">First Name</label></td><td>
				<div><input type="text" id="required_field" name="first_name_three" value="" /></div>
			</td></tr>
			<tr><td><label for="required_field">Last Name</label></td><td>
				<div><input type="text" id="required_field" name="last_name_three" value="" /></div>
			</td></tr>
			</table>
			</fieldset>
			</div>
			</td></tr>
			
			<tr><td></td><td>
				<div><button class="submit"> Add Hospital </button> <br/><br/></div>
			</td></tr>
		</table>	
	</fieldset>
</form>	
<!-- HTML Form to add User - Block Starts -->
</div>
        </div>
        </div>
<!-- Right end -->