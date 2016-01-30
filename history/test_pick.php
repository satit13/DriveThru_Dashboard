<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายละเอียด drive thru</title>
<?php require('js/script.php');?>
</head>
<body onload="check()">

<?php
$link = fopen("setting/detail.txt","r") or die("Unable to open file!");
$text = fgets($link);;
$url=$text;
fclose($link);

//===========================url===============================================================================
/*$now_year =date("Y");					
if(isset($_GET['year'])){$y=$_GET['year'];}
else{$y=$now_year;}
echo"<div  class='select_y'>";
				echo 'เลือกปี : <select  id="year" name="year" onchange="select_year(this)"class="form-control">';
							for($j = 2013; $j<= $now_year; $j++){
							if(empty($_GET['year'])){
									
								if($j==$_GET['year']){echo '<option value="'.$j.'" >ปี '.($j+543).'</option>';
								}else{echo '<option value="'.$j.'"selected=selected>ปี '.($j+543).'</option>';}
								
							}else{
									
								if($j==$_GET['year']){echo '<option value="'.$j.'" selected=selected>ปี '.($j+543).'</option>';
								}else{echo '<option value="'.$j.'">ปี '.($j+543).'</option>';}
								}
								
							}
							
							echo '</select><br/></div>';*/
						echo "<br><br>";

$month[1]    =    'มกราคม';
$month[2]    =    'กุมภาพันธ์';
$month[3]    =    'มีนาคม';
$month[4]    =    'เมษายน';
$month[5]    =    'พฤษภาคม';
$month[6]    =    'มิถุนายน';
$month[7]    =    'กรกฎาคม';
$month[8]    =    'สิงหาคม';
$month[9]    =    'กันยายน ';
$month[10]    =    'ตุลาคม';
$month[11]    =    'พฤศจิกายน';
$month[12]    =    'ธันวาคม';
$menu="";
if(isset($_GET['menu'])){$menu=$_GET['menu'];}
else{$menu="select1";}
echo"<input type='hidden' id='cal' value=".$menu.">";
//--------------------------------------------------------------------------------------week-------------------------------------------------------------------------------------------------------------------------
echo "<div id='tcontent1' style='display:block;'>";
echo"<div  class='select_m'>";

$now_date =date("Y-m-d");					
if(isset($_GET['day'])){$day=$_GET['day'];}
else{$day=$now_date;}

if(isset($_GET['day'])){
echo'เลือกวันที่สิ้นสุด :<input type="date" form-control value='.$day.' onchange="return select_date(this)" />';
}else{echo'เลือกวันที่สิ้นสุด :<input type="date" form-control  value='.$now_date.' onchange="return select_date(this)" />';}
//===================================================================================================================================================================pick/day===================================================================================================================================================================
echo "<div id='tcontent4' style='display:block;'>";
$url_pick_w="$url";
$day_7=date("Y-m-d",strtotime("$day -1 day"));
//echo $date_7;
	
	
$pick_w = array (
	"beginDate" => "$day",
	"endDate" => "$day"
	//request : {"beginDate":"2016-01-01","endDate":"2016-01-06"}
	);	
$pick_string_w = json_encode($pick_w); 
//$token = 'your token here';
$ch_w = curl_init();
curl_setopt($ch_w, CURLOPT_URL, "$url_pick_w");
curl_setopt($ch_w, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_w, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch_w, CURLOPT_POST, true);
curl_setopt($ch_w, CURLOPT_POSTFIELDS, $pick_string_w);
//curl_setopt($ch_w, CURLOPT_HEADER, true);
curl_setopt($ch_w, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($pick_string_w)                                                                       
));  

$all_w="";
$use_w=array();$cancel_w=array();
$u_w=0;$c_w=0;  
// execute the request
$json_w = curl_exec($ch_w);
// output the profile information - includes the header
//echo $json_w."<br>";
//$sub = substr($output,9);
$subs_w = explode("data",$json_w);
//echo $json_w;
$sub_w = substr($subs_w[1],2);
$sub_w_s = substr($sub_w,0,-1);
//echo $sub_w_s;
//echo $sub_y;
//var_dump(json_decode($sub_w,true));
$out_w=json_decode($sub_w_s,true);
//echo $sub_y->{'docYear'};
$cnt_w=count($out_w);
$result = array();
$product = array();
$sum=0;$sum_p=0;$i=1;
foreach ($out_w as $row)
{
  $result[$row['pickerName']]['pickerName'] = $row['pickerName'];
 @$result[$row['pickerName']]['billAmount'] += $row['billAmount'];
 // $result[$row['pickerCode']]['earn'] += $row['earn'];
 $sum+=$row['billAmount'];
}
$result = array_values($result);
echo "<table border='1'>";
echo "<tr><th>รายการที่</th><th>หมายเลขคิว</th><th>เลขทะเบียนรถ</th><th>สินค้า</th><th>จำนวน</th><th>ราคา/หน่วย</th><th>ราคา</th><th>ยอดออกบิล</th>
<th>ผู้ขาย</th></tr>";
$per=0;$qty=0;
foreach ($out_w as $pro)
{
  //$product[$pro['itemName']]['itemName'] = $pro['itemName'];
 //@$product[$pro['itemName']]['checkoutQty'] += $pro['checkoutQty'];
 // $result[$pro['pickerCode']]['earn'] += $pro['earn'];
 $sum_p+=$pro['checkoutQty'];
 if($pro['checkoutQty']==0){$qty=1;}
 else{$qty=$pro['checkoutQty'];}
 $per=($pro['checkoutAmount']/$qty);
 
 
 echo"<tr><td>$i</td><td>".$pro['qId']."</td><td>".$pro['carBrand']." ".$pro['carLicence']."</td><td>".$pro['itemName']."</td><td>".$pro['checkoutQty']." ".$pro['unitCode']."</td><td> ".number_format($per)." บาท </td><td> ".number_format($pro['checkoutAmount'])." บาท </td><td> ".number_format($pro['billAmount'])." บาท </td><td> ".$pro['pickerName']." </td></tr>";
$i++;
}
//var_dump($product);
//for($i=0;$i<10;$i++){
	
	//$all_product.="{'product': '".$sort['itemName'][$i]."','amount':".$sort['checkoutQty'][$i]."},";
	//}
//var_dump(json_encode($result));

$sum_amount =json_encode($result);
//echo $sum_amount;
echo "</table>";

?>
<script>
			AmCharts.makeChart("pick_w",
				{
					"type": "pie",
					"angle": 12,
					"balloonText": "ยอดขายของ [[title]]<br><span style='font-size:14px'><b>[[value]] บาท</b> ([[percents]]%)</span>",
					"depth3D": 15,
					"titleField": "pickerName",
					"valueField": "billAmount",
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"align": "center",
						"markerType": "circle"
					},
					"titles": [],
					"dataProvider": 
						<?php echo $sum_amount?>
					
				}
			);
</script>
<?php
if($cnt_w==0){echo "<br><h1>ไม่มีข้อมูลของวันที่ $day</h1>";}
else{
 echo '<div id="pick_w" class="graph"  style="display:block;"></div>';
echo "<p class='right'>ยอดขายรวมของวันที่ $day เท่ากับ ".number_format($sum)." บาท</p>"; 
}
?>
</div>
<!--<div class="select_g">
<input type="radio" checked="checked" class="regular-radio" name="line1" id="radio-1-set" value="1"  onclick="return line1(this)">
<label for="radio-1-set">กราฟแท่ง</label>
<input type="radio" checked="" class="regular-radio" name="line1" id="radio-2-set" value="2"  onclick="return line1(this)">
<label for="radio-2-set">กราฟเส้น</label>
</div><br>
<br>-->
<div class="back"><a href="circulate.php" class="back"></a></div>
<div class="setup"><a href="setting/setting.php" class="setup"></a></div>
<?php require('js/function_test.php');?>

</body>
</html>