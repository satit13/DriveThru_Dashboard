<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Setting link api</title>
<link rel="stylesheet" href="../../css/bootstrap.css" />
<link rel="stylesheet" href="../../css/main.css" />
</head>

<body>
<?php
$myfile1 = fopen("drive_thru.txt","r") or die("Unable to open file!");
$url1 = fgets($myfile1);
fclose($myfile1);

$myfile2 = fopen("circulate.txt","r") or die("Unable to open file!");
$url2 = fgets($myfile2);
fclose($myfile2);

$myfile3 = fopen("product.txt","r") or die("Unable to open file!");
$url3 = fgets($myfile3);
fclose($myfile3);

$myfile4 = fopen("detail.txt","r") or die("Unable to open file!");
$url4 = fgets($myfile4);
fclose($myfile4);
?>
<!-- ใส่ URL ของไฟล์ sign.php ลงไปบรรทัดด้านล่างนี้ครับ -->
<div class="setting">
<h1>Setting</h1>
<!--=================================================รถ=====================================================-->
<FORM action="setup_drive_thru.php" method="POST">
<label for="drive_thru">link ของ api Drive thru:</label><br>
 <INPUT name="api" class="form-control" id="setup" value="<?php echo $url1?>" size="40">  &nbsp; 
  <INPUT type="submit" value="Submit" class="btn btn-default"><br class="clear">
</FORM>
<!--================================================ยอดขาย===================================================-->
<FORM action="setup_circulate.php" method="POST">
<label for="circulate">link ของ api ยอดขาย  Drive thru:</label><br>
 <INPUT name="api" class="form-control" id="setup" value="<?php echo $url2?>" size="40">  &nbsp; 
  <INPUT type="submit" value="Submit" class="btn btn-default"><br class="clear">
</FORM>
<!--==============================================ยอดขาย/คน=================================================-->
<FORM action="setup_product.php" method="POST">
<label for="circulate">link ของ api สินค้าขายดี Drive thru:</label><br>
<INPUT name="api" class="form-control" id="setup" value="<?php echo $url3?>" size="40">  &nbsp; 
  <INPUT type="submit" value="Submit" class="btn btn-default">
  <br class="clear">
</FORM>
<!--==============================================สินค้าขายดีช=================================================-->
<FORM action="setup_detail.php" method="POST">
<label for="circulate">link ของ api ยอดขาย/คน  Drive thru:</label><br>
 <INPUT name="api" class="form-control" id="setup" value="<?php echo $url4?>" size="40"> &nbsp; 
  <INPUT type="submit" value="Submit" class="btn btn-default">
  <br class="clear">
</FORM>
</div>
<div class="back"><a href="../../index_history.php" class="back"></a></div>
</body>

</html>