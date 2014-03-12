<?
/*
*******************************************************************************
* Dedicated Server Management Addon Module                                   
* Created by: Ahmed Ghazi
* Email: aghazi@gpmeonline.com
* Edited By: Jeremiah Shinkle
* Email: jshinkle@mohawk-host.com
*******************************************************************************
*/

?>
<?
if ($_POST[posted]=="yes")

{
mysql_query("update mod_ds_manage set client_id='$_POST[client_id]',
server_name='$_POST[server_name]',
main_ip_address='$_POST[main_ip_address]',
additional_ip_addresses='$_POST[additional_ip_addresses]',
multiple_nics='$_POST[multiple_nics]',
drac_ip='$_POST[drac_ip]',
location='$_POST[location]',
os='$_POST[os]',
root_username='$_POST[root_username]',
root_pass='$_POST[root_pass]',
ssh_port='$_POST[ssh_port]',
rdc_port='$_POST[rdc_port]',
control_panel='$_POST[control_panel]',
cpu='$_POST[cpu]',
cpu_cache='$_POST[cpu_cache]',
cpu_ghz='$_POST[cpu_ghz]',
ram='$_POST[ram]',
ram_speed='$_POST[ram_speed]',
bandwidth='$_POST[bandwidth]',
drive_controller='$_POST[drive_controller]',
hd0='$_POST[hd0]',
hd1='$_POST[hd1]',
hd2='$_POST[hd2]',
hd3='$_POST[hd3]',
drive_raid='$_POST[drive_raid]',
multiple_psus='$_POST[multiple_psus]',
chassis_brand='$_POST[chassis_brand]',
chassis_model='$_POST[chassis_model]',
service_tag='$_POST[service_tag]',
asset_tag='$_POST[asset_tag]',
warranty_expiration='$_POST[warranty_expiration]',
managed='$_POST[managed]',
vps='$_POST[vps]',
vps_node='$_POST[vps_node]',
switch_id='$_POST[switch_id]',
switch_port='$_POST[switch_port]',
switch_speed='$_POST[switch_speed]',
rack_name_number='$_POST[rack_name_number]',
rack_position='$_POST[rack_position]',
ups='$_POST[ups]',
ups_port='$_POST[ups_port]',
pdu_id='$_POST[pdu_id]',
pdu_port='$_POST[pdu_port]',
contract_terms='$_POST[contract_terms]',
server_notes='$_POST[server_notes]',
product_id='$_POST[product_id]'
where server_id='$_POST[server_id]'
") or die ("Error updating server."); 

if ($_POST[client_id])
{
$res=mysql_query("select client_id from mod_ds_manage where client_id='0' and product_id='$_POST[product_id]'");
$num=mysql_num_rows($res);
if (!$num)
{
mysql_query("update tblproducts set hidden='on' where id='$_POST[product_id]'") or die ("Error updating product.");
}
}

else

{
mysql_query("update tblproducts set hidden='' where id='$_POST[product_id]'") or die ("Error updating product.");
}

echo "Server updated successfully!";

echo "<meta http-equiv=refresh content=0;url=$modulelink&page=server_details&server_id=$_POST[server_id] />";

}

else

{

$server_id=$_GET[server_id];

$res=mysql_query("select * from mod_ds_manage left join tblclients on (mod_ds_manage.client_id=tblclients.id) where server_id='$server_id'");
$row=mysql_fetch_array($res);

?>
<h1>Server Details</h1>
<p>Below are the details of server <b><?=$row[server_name];?></b>. Please use the form below to update the details of the server.</p>
<div id="ds_manage_server">
<form action="<?=$modulelink;?>&page=server_details" method="post">
<table>
<tr><td>Owner:</td><td>
<select name="client_id">
<option value="0">None</option>
<?
$res1=mysql_query("select * from tblclients order by BINARY firstname");
while($row1=mysql_fetch_array($res1))
{
echo "<option value='".$row1[id]."'";

if ($row[client_id]==$row1[id])
{
echo " SELECTED";
}

echo ">".$row1[firstname]." ".$row1[lastname]."</option>";

}
?>
</select>
</td></tr>
<tr><td>Product:</td><td>
<select name="product_id">
<option value="0">None</option>
<?
$res2=mysql_query("select * from tblproducts where type='server' order by BINARY name");
while($row2=mysql_fetch_array($res2))
{
echo "<option value='".$row2[id]."'";

if ($row[product_id]==$row2[id])
{
echo " SELECTED";
}
echo ">".$row2[name]."</option>";
}
?>
</select>
</td></tr>
<tr><td>Server Name:</td><td><input type=text name="server_name" value="<?=$row[server_name];?>" /></td></tr>
<tr><td>Main IP Address:</td><td><input type=text name="main_ip_address" value="<?=$row[main_ip_address];?>" /></td></tr>
<tr><td>Additional IP Addresses:</td><td><input type=text name="additional_ip_addresses" value="<?=$row[additional_ip_addresses];?>" /></td></tr>
<tr><td>Multiple NIC's:</td><td><input type=text name="multiple_nics"  value="<?=$row[multiple_nics];?>" /></td></tr>
<tr><td>DRAC IP:</td><td><input type=text name="drac_ip"  value="<?=$row[drac_ip];?>" /></td></tr>
<tr><td>Location:</td><td><input type=text name="location" value="<?=$row[location];?>" /></td></tr>
<tr><td>OS:</td><td><input type=text name="os" value="<?=$row[os];?>" /></td></tr>
<tr><td>Administrative Username:</td><td><input type=text name="root_username" value="<?=$row[root_username];?>" /></td></tr>
<tr><td>Root Password:</td><td><input type=text name="root_pass" value="<?=$row[root_pass];?>" /></td></tr>
<tr><td>SSH Port:</td><td><input type=text name="ssh_port" value="<?=$row[ssh_port];?>" /></td></tr>
<tr><td>RDC Port:</td><td><input type=text name="rdc_port" value="<?=$row[rdc_port];?>" /></td></tr>
<tr><td>Control Panel:</td><td><input type=text name="control_panel" value="<?=$row[control_panel];?>" /></td></tr>
<tr><td>CPU:</td><td><input type=text name="cpu" value="<?=$row[cpu];?>" /></td></tr>
<tr><td>CPU Cache:</td><td><input type=text name="cpu_cache" value="<?=$row[cpu_cache];?>" /></td></tr>
<tr><td>CPU Speed:</td><td><input type=text name="cpu_ghz" value="<?=$row[cpu_ghz];?>" /></td></tr>
<tr><td>RAM:</td><td><input type=text name="ram" value="<?=$row[ram];?>" /></td></tr>
<tr><td>RAM Speed:</td><td><input type=text name="ram_speed" value="<?=$row[ram_speed];?>" /></td></tr>
<tr><td>Bandwidth:</td><td><input type=text name="bandwidth" value="<?=$row[bandwidth];?>" /></td></tr>
<tr><td>Drive Controller:</td><td><input type=text name="drive_controller" value="<?=$row[drive_controller];?>" /></td></tr>
<tr><td>Primary Hard Disk:</td><td><input type=text name="hd0" value="<?=$row[hd0];?>" /></td></tr>
<tr><td>Secondary Hard Disk:</td><td><input type=text name="hd1" value="<?=$row[hd1];?>" /></td></tr>
<tr><td>Tertiary Hard Disk:</td><td><input type=text name="hd2" value="<?=$row[hd2];?>" /></td></tr>
<tr><td>Fourth Hard Disk:</td><td><input type=text name="hd3" value="<?=$row[hd3];?>" /></td></tr>
<tr><td>Drive RAID:</td><td><input type=text name="drive_raid" value="<?=$row[drive_raid];?>" /></td></tr>
<tr><td>Multiple PSU's:</td><td><input type=text name="multiple_psus" value="<?=$row[multiple_psus];?>" /></td></tr>
<tr><td>Chassis Brand:</td><td><input type=text name="chassis_brand" value="<?=$row[chassis_brand];?>" /></td></tr>
<tr><td>Chassis Model:</td><td><input type=text name="chassis_model" value="<?=$row[chassis_model];?>" /></td></tr>
<tr><td>Service Tag:</td><td><input type=text name="service_tag" value="<?=$row[service_tag];?>" /></td></tr>
<tr><td>Asset Tag:</td><td><input type=text name="asset_tag" value="<?=$row[asset_tag];?>" /></td></tr>
<tr><td>Warranty Expiration:</td><td><input type=text name="warranty_expiration" value="<?=$row[warranty_expiration];?>" /></td></tr>
<tr><td>Managed or Unmanaged:</td><td><input type=text name="managed" value="<?=$row[managed];?>" /></td></tr>
<tr><td>VPS:</td><td><input type=text name="vps" value="<?=$row[vps];?>" /></td></tr>
<tr><td>VPS Node:</td><td><input type=text name="vps_node" value="<?=$row[vps_node];?>" /></td></tr>
<tr><td>Switch:</td><td><input type=text name="switch_id" value="<?=$row[switch_id];?>" /></td></tr>
<tr><td>Switch Port:</td><td><input type=text name="switch_port" value="<?=$row[switch_port];?>" /></td></tr>
<tr><td>Switch Speed:</td><td><input type=text name="switch_speed" value="<?=$row[switch_speed];?>" /></td></tr>
<tr><td>Rack Name/Number:</td><td><input type=text name="rack_name_number" value="<?=$row[rack_name_number];?>" /></td></tr>
<tr><td>Rack Position:</td><td><input type=text name="rack_position" value="<?=$row[rack_position];?>" /></td></tr>
<tr><td>UPS:</td><td><input type=text name="ups" value="<?=$row[ups];?>" /></td></tr>
<tr><td>UPS Port:</td><td><input type=text name="ups_port" value="<?=$row[ups_port];?>" /></td></tr>
<tr><td>PDU:</td><td><input type=text name="pdu_id" value="<?=$row[pdu_id];?>" /></td></tr>
<tr><td>PDU Port:</td><td><input type=text name="pdu_port" value="<?=$row[pdu_port];?>" /></td></tr>
<tr><td valign="top">Contract Terms:</td><td><textarea name="contract_terms" rows="7" cols="35"><?=$row[contract_terms];?></textarea></td></tr>
<tr><td valign="top">Notes:</td><td><textarea name="server_notes" rows="7" cols="35"><?=$row[server_notes];?></textarea></td></tr>
<tr><td align="center"><input type="submit" value="Update Server" /></td></tr>
</table>
<input type="hidden" name="server_id" value="<?=$server_id?>" />
<input type="hidden" name="posted" value="yes" />
</form>

</div>
<?
}
?>