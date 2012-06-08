<?php

// Fetches the module value from URL
$main_url = $this->uri->segment(1);
$role = $this->session->userdata('role');
$role == "Super Admin"? $allowed = TRUE : $allowed = FALSE;

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
<h2>Select Role</h2>
<!-- Listing Of Role starts -->
<table width="100%">
<tr valign="middle" class="table_top_mid">
        <td class="table_top_left"></td>
		<th class="table_top_mid"></th>
		<td class="table_top_right"></td>
    </tr>
<?php
foreach($user_roles as $row)
	{	
?>
	<tr class="view">
		<td></td>
		<td><?php echo anchor('user/lists/role/'.$row['rid'],'<input type="button" style="width: 150px" value=" &nbsp; '.$row['name'].' &nbsp; " />'); ?></td>
		<td></td>
	</tr>
<?php
	} ?>
	<tr valign="middle" class="table_bot_mid">
        <td class="table_bot_left"></td>
		<th class="table_top_mid"></th>
		<td class="table_bot_right"></td>
	</tr>
</table>
<!-- Listing Of Role Ends -->
	</div>
        </div>
        
    </div><!-- Right end -->