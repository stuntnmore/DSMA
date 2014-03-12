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
<?
mysql_query("delete from mod_ds_manage where server_id='$_GET[server_id]'") or die ("Error deleting server.");
echo "Server deleted successfully!";

echo "<meta http-equiv=refresh content=0;url=$modulelink />";
?>
<style>
@import 'http://twitter.github.io/bootstrap/assets/css/bootstrap.css';
</style>