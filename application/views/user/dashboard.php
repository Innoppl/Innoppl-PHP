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
                    <!-- <li><?php if($main_url=="user"): echo anchor('user/lists','Users'); elseif($main_url=="hospital"): echo anchor('hospital/lists','Hospitals'); elseif($main_url=="report"): echo anchor('report/viewreport','Reports'); endif; ?> /</li> -->
                    <div class="clear"></div>
                </ul>            
            </div> <!-- Bread Crumb end -->
            
            <div class="view_main">
			<h2>User Dashboard</h2>
            <table width="100%">
            	<tr valign="middle" class="table_top_mid">
                <td class="table_top_left"></td>
                <th class="table_top_mid"></th>
                <td class="table_top_right"></td>
                </tr>
				<!-- HTML Form Starts -->
                <form name="frm1" action="">
                
                <tr class="view">
                <td></td>
                <td><?php echo anchor('hospital/lists','Hospitals List');?></td>
                <td></td>
                </tr>
                
                <tr class="view">
                <td></td>
                <td><?php echo anchor('user/lists','Users List');?></td>
                <td></td>
                </tr>
                
               
               
                
               <tr valign="middle" class="table_bot_mid">
                <td class="table_bot_left"></td>
                <th></th>
                <td class="table_bot_right"></td>
                </tr>
            </form>
			<!-- HTML Form Starts -->
            </table>
                   
            </div>
            
        
        </div>
        
    </div>
	<!-- Right end -->