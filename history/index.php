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
<title>index</title>
</head>

<body>
<?php
require("connect_api.php");
//echo $end;
?>
	<div id="container">
		<h1>รายงานประจำวัน 16/01/2016</h1>
		<div id="top">
			<form action="index.php" method="GET">
  				<h4>เวลา : <select data-inline="true" name="time">
 				<option value="0">Realtime</option>
  				<option value="8.0">08:00 - 09:00 น.</option>
  				<option value="9.1">09:01 - 10:00 น.</option>
  				<option value="10.1">10:01 - 11:00 น.</option>
  				<option value="11.1">11:01 - 12:00 น.</option>
  				<option value="12.1">12:01 - 13:00 น.</option>
  				<option value="13.1">13:01 - 14:00 น.</option>
  				<option value="14.1">14:01 - 15:00 น.</option>
  				<option value="15.1">15:01 - 16:00 น.</option>
  				<option value="16.1">16:01 - 17:00 น.</option>
				</select>
  			<input type="submit" data-inline="true" value="ค้นหา"></h4>
			</form>

			  <div data-role="main" class="ui-content">
   				 <div class="ui-grid-c ui-responsive">

      				<div class="ui-block-a">
       				 	<div class="menu">
  						<p><font size="+1" color="#000000">New (รถใหม่)</font></p>
  						<p><div id="New"></div>
              <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var all ="";
                  var new0 = 0;
                  var Num= 0;
                  var str = "";
                  var hres="";
                  var mres="";
                  var min,hour,h,m,mix="";
                  alert(<?php echo $_GET['time']; ?>)
                  while(i < count){
                    str = order[i].timeCreate;
                    hres = str.substr(11);
                    hour = hres.substr(0, 2);
                    mres = str.substr(14);
                    min = mres.substr(0, 2);
                    h = Number(hour);
                    m = Number(min);
                    mix = h + "." + m;
                    Num = Number(mix);
                  if(<?php echo $_GET['time']; ?> != 0){ 
                    if(Num <= <?php echo $_GET['time']; ?>){
                    if(order[i].status == 0){ new0 += 1;}
                    }
                  }else{
                    if(order[i].status == 0){ new0 += 1;}
                  }


                  i++;
                  }
                  all = "<br><font size='+7' color='#ffffff'>" + Math.round(100 * (new0/count)) + " %</font></p>"
                  + "<br><p><font size='+1' color='#000000'>จำนวน&nbsp;" + new0 + " คัน</font></p><br>";
                  document.getElementById("New").innerHTML = all
                  
              </script>            
  						</div>
      				</div>

      				<div class="ui-block-b">
       					<div class="menu">
  						<p><font size="+1" color="#000000">Pickup (ยกของ)</font></p>
  						<div id="Pickup"></div>
              <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var all ="";
                  var pickup1= 0;
                  while(i < count){
                  var sta = order[i].status;
                  if(order[i].status == 1){ pickup1 += 1;}
                  i++;
                  }all = "<br><p><font size='+7' color='#ffffff'>" + Math.round(100 * (pickup1/count)) + " %</font></p>" 
                  + "<br><p><font size='+1' color='#000000'>จำนวน&nbsp;" + pickup1 + " คัน</font></p><br>";
                  document.getElementById("Pickup").innerHTML = all

              </script>
              
  						
  						</div>
      				</div>

      				<div class="ui-block-c">
        				<div class="menu">
  						<p><font size="+1" color="#000000">Confirm (ตรวจสอบ)</font></p>
  						<div id="Confirm2"></div>
              <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var all ="";
                  var Confirm2= 0;
                  while(i < count){
                  var sta = order[i].status;
                  if(order[i].status == 2){ Confirm2 += 1;}
                  i++;
                  }all = "<br><p><font size='+7' color='#ffffff'>" + Math.round(100 * (Confirm2/count)) + " %</font></p>" 
                  + "<br><p><font size='+1' color='#000000'>จำนวน&nbsp;" + Confirm2 + " คัน</font></p><br>";
                  document.getElementById("Confirm2").innerHTML = all
              </script>
            </div>
      			</div>

      				<div class="ui-block-d">
        				<div class="menu">
  						<p><font size="+1" color="#000000">Bill (ออกบิล)</font></p>
  						<div id="bill"></div>
              <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var all ="";
                  var bill3= 0;
                  while(i < count){
                  var sta = order[i].status;
                  if(order[i].status == 3){ bill3 += 1;}
                  i++;
                  }all = "<br><p><font size='+7' color='#ffffff'>" + Math.round(100 * (bill3/count)) + " %</font></p>" 
                  + "<br><p><font size='+1' color='#000000'>จำนวน&nbsp;" + bill3 + " คัน</font></p><br>";
                  document.getElementById("bill").innerHTML = all
              </script>
  						</div>
      				</div>  

   				 </div>
 			</div>
		 	
			<div data-role="main" class="ui-content">
    			<div class="ui-grid-a ui-responsive">
      				<div class="ui-block-a">
        				<div class="menuC">
  						<table width="100%"><tr><td><font  color="#000000">ยกเลิกสินค้า</font></td><td align='right'>
              <div id="cancel"></div>
              <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var all ="";
                  var cancel= 0;
                  while(i < count){
                  var sta = order[i].iscancel;
                  if(order[i].iscancel == 1){ cancel += 1;}
                  i++;
                  }all = "<font size='+3' color='#ffffff'>" + Math.round(100 * (cancel/count)) + " %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>" 
                  + "<font color='#000000'>จำนวน&nbsp;" + cancel + " คัน</font>";
                  document.getElementById("cancel").innerHTML = all
              </script>
            </td></tr></table>
  						</div>
     				</div>
      				<div class="ui-block-b">
        				<div class="menuNotsuscess">
  						<table width="100%"><tr><td><font  color="#000000">ทำรายการยังไม่สำเร็จ</font></td>
  						<td align="right">
                <div id="Nsuccess"></div>
              <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var all ="";
                  var Nsuccess= 0;
                  while(i < count){
                  var sta = order[i].status;
                  if(order[i].status != 3){ Nsuccess += 1;}
                  i++;
                  }all = "<font size='+3' color='#ffffff'>" + Math.round(100 * (Nsuccess/count)) + " %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>" 
                  + "<font color='#000000'>จำนวน&nbsp;" + Nsuccess + " คัน</font>";
                  document.getElementById("Nsuccess").innerHTML = all
              </script>
            </td></tr></table>
  						</div>
      				</div>
     
    			</div>
 			</div>

 			<div data-role="main" class="ui-content">
    			<div class="ui-grid-a ui-responsive">
      				<div class="ui-block-a">
        				<div class="menu2">
  						<table width="100%"><tr><td><font  color="#ffffff">จำนวนรถในคลัง </font></td>
  						<td align="right">
                  <div id="realCar"></div>
              <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var all ="";
                  var realCar= 0;
                  while(i < count){
                  var sta = order[i].status;
                  if(order[i].status != 3){ realCar += 1;}
                  i++;
                  }all = "<font size='+3' color='#ffffff'>" + Math.round(100 * (realCar/count)) + " %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
                  document.getElementById("realCar").innerHTML = all
              </script>
  						</td></tr></table>
  						</div>
     				</div>
      				<div class="ui-block-b">
        				<div class="menu2">
  						<table width="100%"><tr><td><font  color="#ffffff">จำนวนรถที่ทำรายการสำเร็จ</font></td>
  						<td align="right">
                <div id="success"></div>
                <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var all ="";
                  var success= 0;
                  while(i < count){
                  var sta = order[i].status;
                  if(order[i].status == 3){ success += 1;}
                  i++;
                  }all = "<font size='+3' color='#ffffff'>" + Math.round(100 * (success/count)) + " %&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</font>";
                  document.getElementById("success").innerHTML = all
              </script>
  						</td></tr></table>
  						</div>
      				</div>
     
    			</div>
 			</div>

			<div id="NumCar"></div> 
    </div>
                <script>
                  var order = <?php echo $end; ?>;
                  var i = 0;
                  var count = order.length;
                  var Num = 0;
                  var all = "";
                  while(i < count){
                    Num += 1;
                  i++;
                  }all = "<p align='right'><font size='+2'>จำนวนรถที่เข้ามาในบริษัท (100%)&nbsp;&nbsp; " + Num + "&nbsp;&nbsp;คัน</font></p>"
                  document.getElementById("NumCar").innerHTML = all
              </script> 

		<div id="bottom">
			<table width="100%"><tr valign="top"><td width="45%"><h5>&nbsp;&nbsp;ยอดขายทั้งหมด</h5></td><td><font  color="#ffffff"><h2>XX,XXX</font> บาท</h2></td></tr></table>
		</div> 	
	</div>

</body>
</html>