<title>connect_db</title>
<?php
mysql_connect("192.168.0.89","it","[ibdkifu");
mysql_select_db("SmartQ")or die (mysql_error());
mysql_query("SET NAMES UTF8");
?>