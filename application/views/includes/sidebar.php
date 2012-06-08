<?php

// Fetches the module value from URL
$main_url = $this->uri->segment(1);
$role = $this->session->userdata('role');
$role == "Super Admin"? $allowed = TRUE : $allowed = FALSE;

?>

<div id="left_main">
    	
        <div class="side_menu_main">
			<?php if($allowed): ?>
        	 <div class="<?php if($main_url=="user"){echo "menu_active";}else{echo "menu_main"; } ?>">
            User Management
             </div>
             
             <ul class="sub_menu">
                    	<li><?php echo anchor('user/lists','View Users');?></li>
                        <?php if($allowed): echo "<li>".anchor('user/add','Add User')."</li>"; endif; ?>
                </ul>
               
			   <?php endif; ?>
			   
             <div class="<?php if($main_url=="hospital"){echo "menu_active";}else{echo "menu_main"; } ?>"> 
             Hospitals
             </div>
             
             <ul class="sub_menu">
                    	<li><?php echo anchor('hospital/lists','View Hospitals');?></li>
                        <?php if($allowed): echo "<li>".anchor('hospital/add','Add Hospital')."</li>"; endif; ?>
              </ul>
            
             <div class="<?php if($main_url=="report"){echo "menu_active";}else{echo "menu_main"; } ?>">
             Reports
			 </div>
			 <ul class="sub_menu">
                    	<li><?php echo anchor('report/viewreport','View Reports');?></li>
						<?php if($allowed): echo "<li>".anchor('report/lists','Upload XML Data')."</li>"; endif; ?>
              </ul>
             
                  
        </div>
    
    </div> <!-- Left end -->