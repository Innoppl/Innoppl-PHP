<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Eagle Hospitals</title>
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css">
	
</head>
<body id="login">
		<?php if(isset($login_error)) { ?>
		<div class="alert warning"><?php echo $login_error; ?></div>
        <?php } ?>
        <table class="login" width="300" border="0" align="center">
          <tr>
                <th colspan="2" align="center">
                    <header>
                    <div id="logo">
                        <a href="<?php echo base_url(); ?>user/login">Welcome, Guest! Please Login.</a>
                    </div>
                    </header>
                </td>
           </tr>
            <form action="<?php echo base_url(); ?>user/login" id="loginform" method="post">
           <tr>
             <td colspan="2">&nbsp;</td>
             </tr>
           <tr>
                <td><label for="username">Email ID</label></td>
                <td><input type="text" id="email_id" name="email_id" autofocus></td>
           </tr>
           <tr>
                <td><label for="password">Password </label></td>
                <td><input type="password" id="password" name="password"></td>
           </tr>
           <tr>
           		<td colspan="2" align="center"><input type="checkbox" id="remember" name="remember"><label for="remember" class="checkbox">remember me</label></td>
                
           </tr>
           <tr>
           		<td colspan="2" align="center">
                <button class="submit">Login</button>
           		</td>
           </tr>
           <tr>
             <td colspan="2" align="center"><footer>Copyright <?php echo date('Y'); ?></footer></td>
           </tr>
           <fieldset>
             
           </fieldset>
            
		</form>
		
        </table>	
		
</body>
</html>