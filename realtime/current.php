<?php
if(empty($_GET['time'])){
  $_GET['time'] = 0;
}
?>
<!DOCTYPE html>
<html>
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/css1.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<!-- Ajax -->
<script src="http://code.jquery.com/jquery-latest.js"></script>
<meta charset=utf-8 />
<!-- ========================================================== -->
<?php
Include("function_cal.php");
?>
<title>index</title>
</head>

<body>

<?php
//require("connect_api.php");
//echo $end;
require("dateThai.php");
?>
	<div id="container">
		<h2>รายงานประจำวันที่ <?php echo $curdate; ?></h2>
		<div id="top">

			<form action="current.php" method="GET">
  				<h4>เวลา : <select data-inline="true" name="time" onchange="return select_time(this)">
            <?php
          $selected1="";$selected2="";$selected3="";$selected4="";$selected5="";$selected6="";$selected7="";$selected8="";$selected9="";$selected10="";

          switch($_GET['time']){
          case "0" :$selected1 = "selected = 'selected=selected'";
          break;
          case "8.0" : $selected2 = "selected = 'selected=selected'";
          break;
          case "9.1" : $selected3 = "selected = 'selected=selected'";
          break;
          case "10.1" : $selected4 = "selected = 'selected=selected'";
          break;
          case "11.1" : $selected5 = "selected = 'selected=selected'";
          break;
          case "12.1" : $selected6 = "selected = 'selected=selected'";
          break;
          case "13.1" : $selected7 = "selected = 'selected=selected'";
          break;
          case "14.1" : $selected8 = "selected = 'selected=selected'";
          break;
          case "15.1" : $selected9 = "selected = 'selected=selected'";
          break;
          case "16.1" : $selected10 = "selected = 'selected=selected'";
          break;
          
          }
          ?>
 				<option value="0" <?php echo $selected1; ?> >-- Realtime --</option>
  				<option value="8.0" <?php echo $selected2; ?> >08:00 - 09:00 น.</option>
  				<option value="9.1" <?php echo $selected3; ?> >09:01 - 10:00 น.</option>
  				<option value="10.1" <?php echo $selected4; ?> >10:01 - 11:00 น.</option>
  				<option value="11.1" <?php echo $selected5; ?> >11:01 - 12:00 น.</option>
  				<option value="12.1" <?php echo $selected6; ?> >12:01 - 13:00 น.</option>
  				<option value="13.1" <?php echo $selected7; ?> >13:01 - 14:00 น.</option>
  				<option value="14.1" <?php echo $selected8; ?> >14:01 - 15:00 น.</option>
  				<option value="15.1" <?php echo $selected9; ?> >15:01 - 16:00 น.</option>
  				<option value="16.1" <?php echo $selected10; ?> >16:01 - 17:00 น.</option>
				</select>
        
<script>
  function select_time(time){
   window.location="current.php?time="+time.value;    
  }
</script>
			</form>

			  <div data-role="main" class="ui-content">
   				 <div class="ui-grid-c ui-responsive">

      				<div class="ui-block-a">
       				 	<div class="menu">
  						<p><font size="+1" color="#000000">New (รถใหม่)</font></p>
  						<p><div id="new0"></div>
                     
  						</div>
      				</div>

      				<div class="ui-block-b">
       					<div class="menu">
  						<p><font size="+1" color="#000000">Pickup (ยกของ)</font></p>
  						<div id="pickup1"></div>  						
  						</div>
      				</div>

      				<div class="ui-block-c">
        				<div class="menu">
  						<p><font size="+1" color="#000000">Confirm (ตรวจสอบ)</font></p>
  						<div id="confirm2"></div>
            </div>
      			</div>

      				<div class="ui-block-d">
        				<div class="menu">
  						<p><font size="+1" color="#000000">Bill (ออกบิล)</font></p>
  						<div id="bill3"></div>
  						</div>
      				</div>  

   				 </div>
 			</div>
		 	
			<div data-role="main" class="ui-content">
    			<div class="ui-grid-a ui-responsive">
      				<div class="ui-block-a">
        				<div class="menuC">
  						<table width="100%"><tr><td><font  color="#000000">ยกเลิกสินค้า</font><p></p></td></tr><tr><td align='right'>
              <div id="cancel"></div>
                   </td></tr></table>
  						</div>
     				</div>

      				<div class="ui-block-b">
        				<div class="menuNotsuscess">
  						<table width="100%"><tr valign="top"><td width="45%"><h4>&nbsp;&nbsp;ยอดขายทั้งหมด</h4></td><td align="right">
              <div id="Sale"></div>
              </td></tr></table>
  						</div>
      				</div>
          		
			<p><div id="NumCar" onClick="window.location='p2.php'"></div></p>
    </div>
	</div>
</div>
<div class="home" onClick="window.location='../index.php'" ><a href="#" class="home"></a></div>
</body>
</html>
                