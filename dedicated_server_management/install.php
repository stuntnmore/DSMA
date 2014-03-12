<?

if ($_POST[posted]=="yes")
{

mysql_query("
CREATE TABLE `mod_ds_manage` (
  `server_id` int(1) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `server_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `main_ip_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `additional_ip_addresses` varchar(255) CHARACTER SET utf8 NOT NULL,
  `multiple_nics` varchar(255) CHARACTER SET utf8 NOT NULL,
  `drac_ip` varchar(255) CHARACTER SET utf8 NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 NOT NULL,
  `os` varchar(255) CHARACTER SET utf8 NOT NULL,
  `root_username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `root_pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ssh_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rdc_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `control_panel` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cpu` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cpu_cache` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cpu_ghz` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ram` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bandwidth` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ram_speed` varchar(255) CHARACTER SET utf8 NOT NULL,
  `drive_controller` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hd0` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hd1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hd2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hd3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `drive_raid` varchar(5) CHARACTER SET utf8 NOT NULL,
  `multiple_psus` varchar(255) CHARACTER SET utf8 NOT NULL,
  `chassis_brand` varchar(255) CHARACTER SET utf8 NOT NULL,
  `chassis_model` varchar(255) CHARACTER SET utf8 NOT NULL,
  `service_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `asset_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `warranty_expiration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `managed` varchar(10) CHARACTER SET utf8 NOT NULL,
  `vps` varchar(5) CHARACTER SET utf8 NOT NULL,
  `vps_node` varchar(255) CHARACTER SET utf8 NOT NULL,
  `switch_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `switch_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `switch_speed` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rack_name_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rack_position` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ups` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ups_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pdu_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pdu_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contract_terms` text CHARACTER SET utf8 NOT NULL,
  `server_notes` text CHARACTER SET utf8 NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8") or die ("Error creating table.");

echo "Script successfully installed.";

echo "<meta http-equiv=refresh content=0;url=$modulelink />";

}

else

{

?>
<h1>Install</h1>
<p>Please click on the button below to install the Dedicated Server Management Addon Module.</p>
<p>
<form method="post" action="<?=$modulelink;?>&page=install">
<input type="hidden" name="posted" value="yes" />
<input type="submit" value="Install Addon" />
</form>
</p>
<?

}

?>