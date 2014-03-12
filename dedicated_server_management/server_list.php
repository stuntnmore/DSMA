<?
/*
*******************************************************************************
* Dedicated Server Management Addon Module                                   
* Created by: Ahmed Ghazi
* Email: aghazi@gpmeonline.com
* Edited By: stuntnmore
* Email: stuntkiller123@gmail.com
*******************************************************************************
*/

?>
<style>
@import 'http://getbootstrap.com/2.3.2/assets/css/bootstrap.css';
</style>
<div style="padding: 15px 15px 10px 6px;border: 1px solid #DDDDDD;border-radius: 4px 4px 4px 4px;border-left: 0px;border-right: 0px;box-shadow: 0 1px 3px rgba(0,0,0,0.1);-webkit-border-radius-topright: 5px;-webkit-border-radius-topleft: 5px;-moz-border-radius-topright: 5px;-moz-border-radius-topleft: 5px;" id="box-header seperator ds_manage_main">
<p class="pull-left"><h1>Server List</h1></p>
<p>Below is a list of the currently available servers. Please click on server name to get the server details.</p>
<table class="table table-bordered" width=100% cellspacing=0 cellpadding=5>
<tr><td><b>Name</b></td><td><b>Location</b></td><td><b>Primary IP Address</b></td><td><b>Owner</b></td><td><b>OS</b></td><td><b>Product</b></td>
<td><b>CPU</b></td><td><b>RAM</b></td><td><b>Primary Hard Drive</b></td><td><b>Bandwidth</b></td><td><b>Control Panel</b></td><td align="center"><b>Delete</b></td></tr>
<?
$res=mysql_query("select * from mod_ds_manage left join tblclients on (mod_ds_manage.client_id=tblclients.id)
left join tblproducts on (mod_ds_manage.product_id=tblproducts.id)");
$numservers=mysql_num_rows($res);
while($rows=mysql_fetch_array($res))
{
$odd=$odd+1;

if ($odd%2)
{
$bgcolor="#eeeeee";
}
else
{
$bgcolor="#ffffff";
}
echo "<tr bgcolor=$bgcolor><td><a href=$modulelink&page=server_details&server_id=".$rows[server_id].">".$rows[server_name]."</a></td><td>".$rows[location]."</td><td>".$rows[main_ip_address]."</td><td><a href=clientssummary.php?userid=".$rows[client_id].">".$rows[firstname]." ".$rows[lastname]."</a></td>
<td>".$rows[os]."</td><td>".$rows[name]."</td><td>".$rows[cpu]."</td><td>".$rows[ram]."</td><td>".$rows[hd0]."</td><td>".$rows[bandwidth]."</td><td>".$rows[control_panel]."</td><td align=center><a href=$modulelink&server_id=$rows[server_id]&page=server_delete>[x]</a></td>
</tr>";
}
?>
</table>
<p>You currently have a total of <b><?=$numservers;?></b> Servers.</p>
</div>