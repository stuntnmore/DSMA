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

$page=$_GET[page];

$table="mod_ds_manage";

if(!mysql_num_rows( mysql_query("SHOW TABLES LIKE '".$table."'")))
{
if ($page<>"install")
{
header("Location: ".$modulelink."&page=install");
}
}

?>




<?
if ($page<>"install")
{
?>
<div id="ds_manage_header">
<p class="well">
 <a class="btn" href="<?=$modulelink?>">Server List</a> | <a class="btn" href="<?=$modulelink?>&page=server_add">Add Server</a> 
</p>
</div>
<?
}


if (!$page)

{
include ("server_list.php");
}
else
{
include ($_GET[page].".php");
}


?>