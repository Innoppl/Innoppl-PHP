<?php

// Fetches the module value from URL
$main_url = $this->uri->segment(1);

// Fetches the role of the user from session
$role = $this->session->userdata('role');

$role == "Super Admin"? $allowed = TRUE : $allowed = FALSE;

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
<h2>User Details View</h2>
<!-- User Detailed view starts -->
<table width="100%">
	<tr valign="middle" class="table_top_mid">
        <td class="table_top_left"></td>
		<th class="table_top_mid"></th>
		<th class="table_top_mid"></th>
		<td class="table_top_right"></td>
    </tr>
<?php
foreach($user_details as $row)
	{	
?>
	<tr class="view">
		<td></td>
		<td>First Name: </td>
		<td><?php echo $row['first_name'];?></td>
		<td></td>
	</tr><tr class="view">	
		<td></td>
		<td>Last Name: </td>
		<td><?php echo $row['last_name'];?></td>
		<td></td>
	</tr><tr class="view">		
		<td></td>
		<td>E-mail ID: </td>
		<td><?php echo $row['email'];?></td>
		<td></td>
	</tr><tr class="view">	
		<td></td>
		<td>Phone: </td>
		<td><?php echo $row['phone'];?></td>
		<td></td>
	</tr>
<?php
	} ?>
	<tr valign="middle" class="table_bot_mid">
        <td class="table_bot_left"></td>
		<th class="table_top_mid"><?php if($allowed): echo anchor('user/edit/'.$row['uid'],'<input type="button" value=" &nbsp; Edit &nbsp; " />'); endif; ?></th>
		<th class="table_top_mid"><?php if($allowed): echo anchor('user/assign/'.$row['uid'],'<input type="button" value="Assign Hospital" />'); endif; ?></th>
		<td class="table_bot_right"></td>
	</tr>
</table>
<!-- User Detailed view Ends -->
	</div>
        </div>
        
    </div><!-- Right end -->