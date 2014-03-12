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
@import 'http://twitter.github.io/bootstrap/assets/css/bootstrap.css';
</style>
<h1>Add server</h1>
<?

if ($_POST[posted]=="yes")

{
mysql_query("insert into mod_ds_manage (client_id,server_name,main_ip_address,additional_ip_addresses,multiple_nics,drac_ip,location,os,root_username,root_pass,ssh_port,rdc_port,control_panel,cpu,cpu_cache,cpu_ghz,ram,ram_speed,drive_controller,hd0,hd1,hd2,hd3,drive_raid,multiple_psus,chassis_brand,chassis_model,service_tag,asset_tag,warranty_expiration,managed,vps,vps_node,switch_id,switch_port,switch_speed,rack_name_number,rack_position,ups,ups_port,pdu_id,pdu_port,contract_terms,server_notes,bandwidth) 
values ('$_POST[client_id]','$_POST[server_name]','$_POST[main_ip_address]','$_POST[additional_ip_addresses]','$_POST[multiple_nics]','$_POST[drac_ip]','$_POST[location]','$_POST[os]','$_POST[root_username]','$_POST[root_pass]','$_POST[ssh_port]','$_POST[rdc_port]','$_POST[control_panel]','$_POST[cpu]','$_POST[cpu_cache]','$_POST[cpu_ghz]','$_POST[ram]','$_POST[ram_speed]','$_POST[drive_controller]','$_POST[hd0]','$_POST[hd1]','$_POST[hd2]','$_POST[hd3]','$_POST[drive_raid]','$_POST[multiple_psus]','$_POST[chassis_brand]','$_POST[chassis_model]','$_POST[service_tag]','$_POST[asset_tag]','$_POST[warranty_expiration]','$_POST[managed]','$_POST[vps]','$_POST[vps_node]','$_POST[switch_id]','$_POST[switch_port]','$_POST[switch_speed]','$_POST[rack_name_number]','$_POST[rack_position]','$_POST[ups]','$_POST[ups_port]','$_POST[pdu_id]','$_POST[pdu_port]','$_POST[contract_terms]','$_POST[bandwidth]','$_POST[server_notes]')") or die ("Error adding server.");

echo "Server added successfully!";
echo "<meta http-equiv=refresh content=0;url=".$modulelink." />";
}
else
{
?>
<p>Please use the following form to add a new server.</p>
<form action="<?=$modulelink;?>&page=server_add" method="post">
<table>
<tr><td>Owner:</td><td>
<select name="client_id">
<option value="0">None</option>
<?
$res=mysql_query("select * from tblclients order by BINARY firstname");
while($row=mysql_fetch_array($res))
{
echo "<option value='".$row[id]."'>".$row[firstname]." ".$row[lastname]."</option>";
}
?>
</select>
<tr><td>Server Name:</td><td><input type=text name="server_name" /></td></tr>
<tr><td>Main IP Address:</td><td><input type=text name="main_ip_address" /></td></tr>
<tr><td>Additional IP Addresses:</td><td><input type=text name="additional_ip_addresses" /></td></tr>
<tr><td>Multiple NIC's:</td><td><input type=text name="multiple_nics" /></td></tr>
<tr><td>DRAC IP:</td><td><input type=text name="drac_ip" /></td></tr>
<tr><td>Location:</td><td><input type=text name="location" /></td></tr>
<tr><td>OS:</td><td><input type=text name="os" /> </td></tr>
<tr><td>Administrative Username:</td><td><input type=text name="root_username" /></td></tr>
<tr><td>Root Password:</td><td><input type=text name="root_pass" /></td></tr>
<tr><td>SSH Port:</td><td><input type=text name="ssh_port" /></td></tr>
<tr><td>RDC Port:</td><td><input type=text name="rdc_port" /></td></tr>
<tr><td>Control Panel:</td><td><input type=text name="control_panel" /></td></tr>
<tr><td>CPU:</td><td><input type=text name="cpu" /></td></tr>
<tr><td>CPU Cache:</td><td><input type=text name="cpu_cache" /></td></tr>
<tr><td>CPU Speed:</td><td><input type=text name="cpu_ghz" /></td></tr>
<tr><td>RAM:</td><td><input type=text name="ram" /></td></tr>
<tr><td>RAM Speed:</td><td><input type=text name="ram_speed" /></td></tr>
<tr><td>Bandwidth:</td><td><input type=text name="bandwidth" /></td></tr>
<tr><td>Drive Controller:</td><td><input type=text name="drive_controller" /></td></tr>
<tr><td>Primary Hard Disk:</td><td><input type=text name="hd0" /></td></tr>
<tr><td>Secondary Hard Disk:</td><td><input type=text name="hd1" /></td></tr>
<tr><td>Tertiary Hard Disk:</td><td><input type=text name="hd2" /></td></tr>
<tr><td>Fourth Hard Disk:</td><td><input type=text name="hd3" /></td></tr>
<tr><td>Drive RAID:</td><td><input type=text name="drive_raid" /></td></tr>
<tr><td>Multiple PSU's:</td><td><input type=text name="multiple_psus" /></td></tr>
<tr><td>Chassis Brand:</td><td><input type=text name="chassis_brand" /></td></tr>
<tr><td>Chassis Model:</td><td><input type=text name="chassis_model" /></td></tr>
<tr><td>Service Tag:</td><td><input type=text name="service_tag" /></td></tr>
<tr><td>Asset Tag:</td><td><input type=text name="asset_tag" /></td></tr>
<tr><td>Warranty Expiration:</td><td><input type=text name="warranty_expiration" /></td></tr>
<tr><td>Managed or Unmanaged:</td><td><input type=text name="managed" /></td></tr>
<tr><td>VPS:</td><td><input type=text name="vps" /></td></tr>
<tr><td>VPS Node:</td><td><input type=text name="vps_node" /></td></tr>
<tr><td>Switch:</td><td><input type=text name="switch_id" /></td></tr>
<tr><td>Switch Port:</td><td><input type=text name="switch_port" /></td></tr>
<tr><td>Switch Speed:</td><td><input type=text name="switch_speed" /></td></tr>
<tr><td>Rack Name/Number:</td><td><input type=text name="rack_name_number" /></td></tr>
<tr><td>Rack Position:</td><td><input type=text name="rack_position" /></td></tr>
<tr><td>UPS:</td><td><input type=text name="ups" /></td></tr>
<tr><td>UPS Port:</td><td><input type=text name="ups_port" /></td></tr>
<tr><td>PDU:</td><td><input type=text name="pdu_id" /></td></tr>
<tr><td>PDU Port:</td><td><input type=text name="pdu_port" /></td></tr>
<tr><td valign="top">Contract Terms:</td><td><textarea name="contract_terms" rows="7" cols="35"></textarea></td></tr>
<tr><td valign="top">Notes:</td><td><textarea name="server_notes" rows="7" cols="35"></textarea></td></tr>
<tr><td colspan="2" align="center"><input type="submit" value="Add Server" /></td></tr>
</table>
<input type="hidden" name="posted" value="yes" />
</form>
<?
}
?>