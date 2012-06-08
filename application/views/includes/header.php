<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Eagle Hospitals</title>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/fancybox/jquery.fancybox-1.3.4.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>css/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('.menu_active').next('.sub_menu').show();
		
		$('.menu_main,.menu_active').click(function(){
			
			if($(this).attr("class")=="menu_main")
			{
				
				$('.sub_menu').hide("slow");
				$('.menu_active').removeClass().addClass('menu_main');
				$(this).removeClass().addClass('menu_active');
				$(this).next('.sub_menu').show('slow');
				
			}else
			{
				$(this).removeClass().addClass('menu_main');
				$(this).next(".sub_menu").hide('slow');
			}
				
		});

	 });
</script>

</head>
<body>

<div id="main_container">

  <div class="header_main">
            <div class="logo_main">
                    <a href="<?php echo base_url(); ?>user/dashboard"><img src="<?php echo base_url(); ?>css/images/logo.gif" width="281" height="69" /></a>
                </div>
                    
                   <div class="header_right_main"> 
                    <div class="header_icon_main">
                        <div class="header_icon_bg"><a href="<?php echo base_url(); ?>user/logout"><img src="<?php echo base_url(); ?>css/images/logout_icon.png" width="32" height="33" /></a></div>
                            <div class="header_icon_bg"><a href="<?php echo base_url(); ?>user/settings"><img src="<?php echo base_url(); ?>css/images/settings_icon.png" width="32" height="33" /></a></div>
                            <div class="clear"></div>
                        </div>
                        <div class="admin_text_main">
                            <h1><?php echo $first_name.' '.$last_name; ?> </h1>
                            <p>| <?php echo $role; ?> </p>
                        </div>
                    </div>
                    
                <div class="clear"></div>    
          </div><!-- Header ends -->
