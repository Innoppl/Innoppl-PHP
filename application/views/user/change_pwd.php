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
            </div> <!-- Bread Crumb end -->
			<p style="text-align:center;color:#89C123"><i><br /><?php echo $warning_msg; ?></i></p>
            <div class="view_main">
<h2>Change Password</h2>
<!-- HTML form starts -->
<form id="Edit_User" action="<?php echo base_url(); ?>user/settings/change_pwd" method="post" autocomplete="off">

<fieldset>
		
		<table class="add_ta" width="100%">
			<tr><td><label for="required_field">Old Password</label></td><td>
				<div><input type="password" id="required_field" name="old_pwd" value="" required></div>
			</td></tr>
			<tr><td><label for="required_field">New Password</label></td><td>
				<div><input type="password" id="required_field" name="password" value="" required></div>
			</td></tr>
			<tr><td><label for="required_field">Confirm New Password</label></td><td>
				<div><input type="password" id="required_field" name="passconf" value="" required></div>
			</td></tr>
			
			<tr><td></td><td>
				<div><button class="submit"> Change Password </button></div>
			</td></tr>
		</table>	
	</fieldset>

</form>
<!-- HTML form Ends -->

		</div>
	</div>
</div>
<!-- Right end -->