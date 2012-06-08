<script type="text/javascript">
$(document).ready(function () {
	
$('#exit').keyup(function(event) {
	
	var search_text = $.trim($('#exit').val());
	if(search_text != ''){
	var rg = new RegExp(search_text,'i');
	$('#source option').each(function(){
		
		if($.trim($(this).html()).search(rg) == -1) {
			//$(this).css('display', 'none');
			$(this).attr('selected','');
		}
		else
		{
			$(this).css('display', '');
			$(this).attr('selected','selected');
			
		}
		
	});
	
	}
	else
	{
		
	}
	
	});


$('#other').keyup(function(event) {
	
	var search_text = $.trim($('#other').val());
	if(search_text !=''){
	var rg = new RegExp(search_text,'i');
	$('#target option').each(function(){
		
		if($.trim($(this).html()).search(rg) == -1) {
			$(this).css('display', 'none');
			$(this).attr('selected','');
		}
		else
		{
			$(this).css('display', '');
			$(this).attr('selected','selected');
			
		}
		
	});
	
	}
	else
	{
		
	}
	
	});

	
function sureTransfer(from, to, all) {
if ( from.getElementsByTagName && to.appendChild ) {
while ( getCount(from, !all) > 0 ) {
transfer(from, to, all);
document.getElementById("exit").value=" ";
}
}
}
function getCount(target, isSelected) {
var options = target.getElementsByTagName("option");
if ( !isSelected ) {
return options.length;
}
var count = 0;
for ( i = 0; i < options.length; i++ ) {
if ( isSelected && options[i].selected ) {
count++;
}
}
return count;
}
function transfer(from, to, all) {
if ( from.getElementsByTagName && to.appendChild ) {
var options = from.getElementsByTagName("option");
for ( i = 0; i < options.length; i++ ) {
if ( all ) {
to.appendChild(options[i]);
} else {
if ( options[i].selected ) {
to.appendChild(options[i]);
}
}
}
}
}

window.onload = function() {
document.getElementById("src2TargetAll").onclick = function() {
sureTransfer(document.getElementById("source"), document.getElementById("target"), true);
};
document.getElementById("src2Target").onclick = function() {
sureTransfer(document.getElementById("source"), document.getElementById("target"), false);
};
document.getElementById("target2SrcAll").onclick = function() {
sureTransfer(document.getElementById("target"), document.getElementById("source"), true);
};
document.getElementById("target2Src").onclick = function() {
sureTransfer(document.getElementById("target"), document.getElementById("source"), false);
};
}
	
	$('#Assign_User').submit(function() {  
 $('#target option').each(function(i) {  
  $(this).attr("selected", "selected");  
 });  
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
            </div> <!-- Bread Crumb end -->
            <div class="view_main">
<h2>Assign Hospitals</h2>			
<!-- HTML form starts -->
 <form id="Assign_User" action="<?php echo base_url(); ?>user/assign/" method="post" autocomplete="off">
<table class="assign">

<tr valign="top">
<td width="156"> <input type="text" name="exit" id="exit" value=""> </td>
<td  width="65"align="center" valign="top">

</td>
<td width="175"> <input type="text" name="exit" id="other" value=""> </td>

</tr>

<tr>
<td colspan="3">
<div style="float:left; padding-right:85px;">
  <select id="source" name="source"  multiple>
  <?php foreach($other_hospitals as $row){ ?>		
    <option value="<?php echo (int)$row['hid']; ?>"><?php echo $row['name'];?></option>
  <?php } ?>
  </select>
</div>

<div style="float:left; padding-right:85px;">

<input type="button" id="src2TargetAll" name="src2TargetAll" value=">>"/><br/>
<input type="button" id="src2Target" name="src2Target" value=">"/><br/>
<input type="button" id="target2Src" name="target2Src" value="<"/><br/>
<input type="button" id="target2SrcAll" name="target2SrcAll" value="<<"/><br/>

</div>
<div style="float:left;">
  <select id="target" name="target[]" multiple>
  <?php foreach($user_hospitals as $row){ ?>		
    <option value="<?php echo (int)$row['hid']; ?>"><?php echo $row['name'];?></option>
  <?php } ?>
  </select>
  </div>
  <div class="clear"></div>
</td>
</tr>
<tr>
<td colspan="3">
<input type="hidden" name="dashboard_uid" value="<?php echo $dashboard_uid; ?>" />
<div style="text-align:center;"><button class="submit"> Update </button></div>
</td>
</tr>
</table>
</form>
<!-- HTML Form ends -->
</div>
</div>
</div>