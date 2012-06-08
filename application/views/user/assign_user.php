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
            <div class="view_main">
			<h2>Assign Hospitals</h2>			
<!-- HTML form starts -->			
<form id="Assign_User" action="<?php echo base_url(); ?>user/assign/user" method="post" autocomplete="off">
<table class="add_ta" width="100%">
<tr>
<td>User Assigned to </td>
<td><?php echo $user_hospital_name; ?></td>
</tr><tr><td>Change Hospital</td><td>
<select id="hospital_id" name="hospital_id">
<?php foreach($all_hospitals as $row){ 
	if($row['hid'] == $user_hospital_id):
?>
	<option value="<?php echo (int)$row['hid']; ?>" selected><?php echo $row['name'];?></option>
<?
else:
?>
		<option value="<?php echo (int)$row['hid']; ?>"><?php echo $row['name']; ?></option>
<?php 
endif;
} ?>
</select>
</td></tr>

<tr><td colspan="2">
<input type="hidden" name="dashboard_uid" value="<?php echo $dashboard_uid; ?>" />
<div style="text-align:center;"><button class="submit"> Update </button></div>	
</td></tr>
</table>
</form>
<!-- HTML form Ends -->
</div></div></div>