<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
$api = $_POST['api'];
$fp = fopen("drive_thru.txt","w");
/*$ccc="<?php $xxx = ".$api."?>";*/
//echo $ccc;
fputs($fp,$api);
fclose($fp);
}
?>
<script>window.location="setting.php"</script>
