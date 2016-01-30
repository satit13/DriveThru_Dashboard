<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>history สินค้าขายดี </title>
<?php require('js/script.php');?>
    
</head>
<body onload="check()">

<?php
$link = fopen("setting/product.txt","r") or die("Unable to open file!");
$text = fgets($link);;
$url_product=$text;
fclose($link);
$now_year =date("Y");					
if(isset($_GET['year'])){$y=$_GET['year'];}
else{$y=$now_year;}

echo "<ul class='nav nav-pills nav-justified' id='menu'>";
echo"
<li class='active' id='select1' onclick='select1()'><a href='#'>สินค้าขายดี ย้อนหลัง</a></li>
<li class='select_menu' id='select2'  onclick='select2()'><a href='#'>สินค้าขายดี ต่อเดือน</a></li>
<li class='select_menu' id='select3'  onclick='select3()'><a href='#'>สินค้าขายดี ต่อปี</a></li>	 

					
                    
                </ul>";
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
							
							echo '</select><br/></div>';

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
if(isset($_GET['day'])){$day=$_GET['day'];}else{$day=$now_date;}
if(isset($_GET['begin_date'])){$begin_date=$_GET['begin_date'];}else{$begin_date=date("Y-m-d",strtotime("$day -6 day"));}

if(isset($_GET['begin_date'])){
echo'เลือกวันที่เริ่มต้น :<input type="date" max='.$day.' form-control id="begin_date" value='.$begin_date.' onchange="return select_begin_date(this)" />';

}else{echo'เลือกวันที่เริ่มต้น :<input type="date" max='.$day.' form-control id="begin_date" value='.$begin_date.' onchange="return select_begin_date(this)" />';
}
if(isset($_GET['day'])){echo'เลือกวันที่สิ้นสุด :<input type="date" min='.$begin_date.' form-control id="end_date" value='.$day.' onchange="return select_date(this)" />';
}else{
echo'เลือกวันที่สิ้นสุด :<input type="date" min='.$begin_date.' form-control id="end_date" value='.$day.' onchange="return select_date(this)" />';
	}
echo "<br><br><a href='pdf/product_amount_pdf.php?day=$day&begin=$begin_date' class='btn btn-success' target='_blank' style='float:right;'>พิมพ์รายงาน สินค้าขายดีย้อนหลัง</a>";
echo"<h3>สินค้าขายดี ย้อนหลัง</h3>";
//echo date('Y-m-t',strtotime($y.'-'.$m.'-21'));
//echo date("Y-m-d",strtotime( "$day -7 day"));
//$day_7=date("Y-m-d",strtotime("$day -7 day"));
//echo $date_7;
//echo $day;
	
	
$product_w = array (
	"beginDate" => "$begin_date",
	"endDate" => "$day"
	//request : {"beginDate":"2016-01-01","endDate":"2016-01-06"}
	);	
$product_string_w = json_encode($product_w); 
//$token = 'your token here';
$ch_w = curl_init();
curl_setopt($ch_w, CURLOPT_URL, "$url_product");
curl_setopt($ch_w, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_w, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch_w, CURLOPT_POST, true);
curl_setopt($ch_w, CURLOPT_POSTFIELDS, $product_string_w);
//curl_setopt($ch_w, CURLOPT_HEADER, true);
curl_setopt($ch_w, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($product_string_w)                                                                       
));  

$json_w = curl_exec($ch_w);
$subs_w = explode("data",$json_w);
//echo $json_w;
$sub_w = substr($subs_w[1],2);
$sub_w_s = substr($sub_w,0,-1);
//echo $sub_w_s;
//echo $sub_y;
//var_dump(json_decode($sub_w,true));
$out_w=json_decode($sub_w_s,true);
//echo $sub_y->{'docYear'};

//===========================================================แบ่งตาม จำนวน======================================
$result = array();
foreach ($out_w as $row)
{
  $result[$row['itemName']]['itemName'] = $row['itemName'];
 @ $result[$row['itemName']]['checkoutQty'] += $row['checkoutQty'];
 // $result[$row['producterCode']]['earn'] += $row['earn'];
}
$result = array_values($result);
if(empty($result)){echo "<h1>ไม่มีข้อมูลของปี $y</h1>";
}else{


$sort = array();
foreach($result as $k=>$v) {
    $sort['itemName'][$k] = $v['itemName'];
    $sort['checkoutQty'][$k] = $v['checkoutQty'];
}
# sort by event_type desc and then title asc
array_multisort($sort['checkoutQty'], SORT_DESC, $sort['itemName'], SORT_ASC,$result);

//var_dump($sort);
$all_product="";

$cnt_w=count($result);
//echo $cnt_w;
if($cnt_w<10){
for($i=0;$i<$cnt_w;$i++){
	$all_product.="{'product': '".$sort['itemName'][$i]."','amount':".$sort['checkoutQty'][$i]."},";
	}	
}else{
//echo $cnt_w;

for($i=0;$i<10;$i++){
	$all_product.="{'product': '".$sort['itemName'][$i]."','amount':".$sort['checkoutQty'][$i]."},";
	}
	}
//$xx =json_encode($result);
//echo $xx;

//===================================================แบ่งตาม เงิน==================================================
$result_bymoney_w = array();
foreach ($out_w as $row_bymoney_w)
{
  $result_bymoney_w[$row_bymoney_w['itemName']]['itemName'] = $row_bymoney_w['itemName'];
 @ $result_bymoney_w[$row_bymoney_w['itemName']]['billAmount'] += $row_bymoney_w['billAmount'];
 // $result[$row['pickerCode']]['earn'] += $row['earn'];
}
$result_bymoney_w = array_values($result_bymoney_w);

$sort_bymoney_w = array();
foreach($result_bymoney_w as $k_bymoney_w=>$v_bymoney_w) {
    $sort_bymoney_w['itemName'][$k_bymoney_w] = $v_bymoney_w['itemName'];
    $sort_bymoney_w['billAmount'][$k_bymoney_w] = $v_bymoney_w['billAmount'];
}
# sort by event_type desc and then title asc
array_multisort($sort_bymoney_w['billAmount'], SORT_DESC, $sort_bymoney_w['itemName'], SORT_ASC,$result_bymoney_w);
$cnt_bymoney_w=count($result_bymoney_w);
//echo $cnt_bymoney_w;
$product_bymoney_w="";

if($cnt_bymoney_w<10){
	for($i_bymoney_w=0;$i_bymoney_w<$cnt_bymoney_w;$i_bymoney_w++){
	$product_bymoney_w.="{'product': '".$sort_bymoney_w['itemName'][$i_bymoney_w]."','amount':".$sort_bymoney_w['billAmount'][$i_bymoney_w]."},";
	}
}else{
for($i_bymoney_w=0;$i_bymoney_w<10;$i_bymoney_w++){
	$product_bymoney_w.="{'product': '".$sort_bymoney_w['itemName'][$i_bymoney_w]."','amount':".$sort_bymoney_w['billAmount'][$i_bymoney_w]."},";
	}}
//echo $product_bymoney_w;
//echo $all_product;

}

require("graph/product_graph_w.php");

   if(!empty($result)){
        echo '<div id="product_w" class="graph"  style="display:block;"></div>
        <div id="product_bymoney_w" class="graph"  style="display:none;"></div>';
echo "<p class='right'>สินค้าขายดี 10 อันดับ ตั้งแต่วันที่ $begin_date ถึง $day</p>";
		}
echo "<br>";
echo"</div>";

echo"</div>";



//--------------------------------------------------------------------------------------month-------------------------------------------------------------------------------------------------------------------------
echo"<div id='tcontent2' style='display:none;'>";
if(isset($_GET['month'])){
$m=$_GET['month'];
}else{$m=date("m");}
echo"<div  class='select_m'>";
echo"เลือกเดือน :<select onchange='return select_month(this)' class='form-control'>";

for($i=1;$i<=12;$i++) {
									
						if(empty($_GET['month'])){
						if($i==$m){echo'<option value="'.$i.'" selected=selected>'.$month[$i].'</option>';}
						else{echo'<option value="'.$i.'">'.$month[$i].'</option>';}
								}else{
								
						if($i==$_GET['month']){echo'<option value="'.$i.'" selected=selected>'.$month[$i].'</option>';}
						else{echo'<option value="'.$i.'">'.$month[$i].'</option>';}
								}
								
								}
echo"</select>";

echo "<br><a href='pdf/product_amount_m_pdf.php?month=$m&year=$y' class='btn btn-success' target='_blank' style='float:right;'>พิมพ์รายงาน สินค้าขายดีย้อนหลัง 1 เดือน</a><br>";

for($n=1;$n<=12;$n++) {
		if($n==$m){echo"<h3>สินค้าขายดี ประจำเดือน $month[$n] ปี $y</h3>";
}}

	//secho date('Y-m-t',strtotime($y.'-'.$m.'-21'));
$product_m = array (
	"beginDate" => "$y-$m-01",
	"endDate" => date('Y-m-t',strtotime($y.'-'.$m.'-21'))
	//request : {"beginDate":"2016-01-01","endDate":"2016-01-06"}
	);
$product_string_m = json_encode($product_m); 
//$token = 'your token here';
$ch_m = curl_init();
curl_setopt($ch_m, CURLOPT_URL, "$url_product");
curl_setopt($ch_m, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_m, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch_m, CURLOPT_POST, true);
curl_setopt($ch_m, CURLOPT_POSTFIELDS, $product_string_m);
//curl_setopt($ch_m, CURLOPT_HEADER, true);
curl_setopt($ch_m, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($product_string_m)                                                                       
));  

$json_m = curl_exec($ch_m);
$subs_m = explode("data",$json_m);
//echo $json_m;
$sub_m = substr($subs_m[1],2);
$sub_m_s = substr($sub_m,0,-1);
//echo $sub_m_s;
//echo $sub_y;
//var_dump(json_decode($sub_m,true));
$out_m=json_decode($sub_m_s,true);
//echo $sub_y->{'docYear'};
$result_m = array();

foreach ($out_m as $row_m)
{
  $result_m[$row_m['itemName']]['itemName'] = $row_m['itemName'];
 @ $result_m[$row_m['itemName']]['checkoutQty'] += $row_m['checkoutQty'];
 // $result[$row['producterCode']]['earn'] += $row['earn'];
}
if(empty($result_m)){echo "<h1>ไม่มีข้อมูลของปี $y</h1>";
}else{
	$result_m = array_values($result_m);

$sort_m = array();
foreach($result_m as $k_m=>$v_m) {
    $sort_m['itemName'][$k_m] = $v_m['itemName'];
    $sort_m['checkoutQty'][$k_m] = $v_m['checkoutQty'];
}
# sort by event_type desc and then title asc
if(is_array($sort_m)){ 
array_multisort($sort_m['checkoutQty'], SORT_DESC, $sort_m['itemName'], SORT_ASC,$result_m);
}
//var_dump($sort);

$cnt_m=count($result_m);
//echo $cnt_m;
$all_product_m="";

for($i_m=0;$i_m<10;$i_m++){
	$all_product_m.="{'product': '".$sort_m['itemName'][$i_m]."','amount':".$sort_m['checkoutQty'][$i_m]."},";
	}
//echo $all_product_m;
//$xx =json_encode($result);
//echo $xx;


//===================================================แบ่งตาม เงิน==================================================
$result_bymoney_m = array();
foreach ($out_m as $row_bymoney_m)
{
  $result_bymoney_m[$row_bymoney_m['itemName']]['itemName'] = $row_bymoney_m['itemName'];
 @ $result_bymoney_m[$row_bymoney_m['itemName']]['billAmount'] += $row_bymoney_m['billAmount'];
 // $result[$row['pickerCode']]['earn'] += $row['earn'];
}
$result_bymoney_m = array_values($result_bymoney_m);

$sort_bymoney_m = array();
foreach($result_bymoney_m as $k_bymoney_m=>$v_bymoney_m) {
    $sort_bymoney_m['itemName'][$k_bymoney_m] = $v_bymoney_m['itemName'];
    $sort_bymoney_m['billAmount'][$k_bymoney_m] = $v_bymoney_m['billAmount'];
}
# sort by event_type desc and then title asc
array_multisort($sort_bymoney_m['billAmount'], SORT_DESC, $sort_bymoney_m['itemName'], SORT_ASC,$result_bymoney_m);
$cnt_bymoney_m=count($result_bymoney_m);
//echo $cnt_bymoney_m;
$product_bymoney_m="";
for($i_bymoney_m=0;$i_bymoney_m<10;$i_bymoney_m++){
	$product_bymoney_m.="{'product': '".$sort_bymoney_m['itemName'][$i_bymoney_m]."','amount':".$sort_bymoney_m['billAmount'][$i_bymoney_m]."},";
	}
//echo $product_bymoney_m;
}
require("graph/product_graph_m.php");
        if(!empty($result_m)){
		echo "<div id='product_m' class='graph'  style='display:block;'></div>
        <div id='product_bymoney_m' class='graph'  style='display:none;'></div>";}


echo"<br></div>";


echo"</div>";
//--------------------------------------------------------------------------------------year-------------------------------------------------------------------------------------------------------------------------
echo "<div id='tcontent3' style='display:none;'>";
echo"<div  class='select_m'>";
echo "<a href='pdf/product_amount_y_pdf.php?year=$y' class='btn btn-success' target='_blank' style='float:right;'>พิมพ์รายงาน สินค้าขายดีย้อนหลัง 1 ปี</a><br>";
echo"<h3>สินค้าขายดี  ประจำปี $y</h3>";

$product_y = array (
	"beginDate" => "$y-01-01",
	"endDate" => "$y-12-31"
	//request : {"beginDate":"2016-01-01","endDate":"2016-01-06"}
	);
$product_string_y = json_encode($product_y); 
//$token = 'your token here';
$ch_y = curl_init();
curl_setopt($ch_y, CURLOPT_URL, "$url_product");
curl_setopt($ch_y, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_y, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch_y, CURLOPT_POST, true);
curl_setopt($ch_y, CURLOPT_POSTFIELDS, $product_string_y);
//curl_setopt($ch_y, CURLOPT_HEADER, true);
curl_setopt($ch_y, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($product_string_y)                                                                       
));  

$json_y = curl_exec($ch_y);
$subs_y = explode("data",$json_y);
//echo $json_y;
$sub_y = substr($subs_y[1],2);
$sub_y_s = substr($sub_y,0,-1);
//echo $sub_y_s;
//echo $sub_y;
//var_dump(json_decode($sub_y,true));
$out_y=json_decode($sub_y_s,true);
//echo $sub_y->{'docYear'};
$result_y = array();

foreach ($out_y as $row_y)
{
  $result_y[$row_y['itemName']]['itemName'] = $row_y['itemName'];
 @ $result_y[$row_y['itemName']]['checkoutQty'] += $row_y['checkoutQty'];
 // $result[$row['producterCode']]['earn'] += $row['earn'];
}
if(empty($result_y)){echo "<h1>ไม่มีข้อมูลของปี $y</h1>";
}else{
	$result_y = array_values($result_y);

$sort_y = array();
foreach($result_y as $k_y=>$v_y) {
    $sort_y['itemName'][$k_y] = $v_y['itemName'];
    $sort_y['checkoutQty'][$k_y] = $v_y['checkoutQty'];
}
# sort by event_type desc and then title asc
if(is_array($sort_y)){ 
array_multisort($sort_y['checkoutQty'], SORT_DESC, $sort_y['itemName'], SORT_ASC,$result_y);
}
//var_dump($sort);

$cnt_y=count($result_y);
//echo $cnt_y;
$all_product_y="";
for($i_y=0;$i_y<10;$i_y++){

	$all_product_y.="{'product': '".$sort_y['itemName'][$i_y]."','amount':".$sort_y['checkoutQty'][$i_y]."},";
	}
//echo $all_product_y;
//$xx =json_encode($result);
//echo $xx;


//===================================================แบ่งตาม เงิน==================================================
$result_bymoney_y = array();
foreach ($out_y as $row_bymoney_y)
{
  $result_bymoney_y[$row_bymoney_y['itemName']]['itemName'] = $row_bymoney_y['itemName'];
 @ $result_bymoney_y[$row_bymoney_y['itemName']]['billAmount'] += $row_bymoney_y['billAmount'];
 // $result[$row['pickerCode']]['earn'] += $row['earn'];
}
$result_bymoney_y = array_values($result_bymoney_y);

$sort_bymoney_y = array();
foreach($result_bymoney_y as $k_bymoney_y=>$v_bymoney_y) {
    $sort_bymoney_y['itemName'][$k_bymoney_y] = $v_bymoney_y['itemName'];
    $sort_bymoney_y['billAmount'][$k_bymoney_y] = $v_bymoney_y['billAmount'];
}
# sort by event_type desc and then title asc
array_multisort($sort_bymoney_y['billAmount'], SORT_DESC, $sort_bymoney_y['itemName'], SORT_ASC,$result_bymoney_y);
$cnt_bymoney_y=count($result_bymoney_y);
//echo $cnt_bymoney_y;
$product_bymoney_y="";
for($i_bymoney_y=0;$i_bymoney_y<10;$i_bymoney_y++){
	
	$product_bymoney_y.="{'product': '".$sort_bymoney_y['itemName'][$i_bymoney_y]."','amount':".$sort_bymoney_y['billAmount'][$i_bymoney_y]."},";
	}
//echo $product_bymoney_y;
}
//================================script=======================================================================
require("graph/product_graph_y.php");

if(!empty($result_y)){
echo'<div id="product_y" class="graph"  style="display:block;"></div>
        <div id="product_bymoney_y" class="graph"  style="display:none;"></div>';}
echo"<br></div>";

echo"</div>";

//echo'<div class="select_g"><input type="radio" name="line1" value="1" onclick="return line1(this)" checked="checked"/> กราฟแท่ง <input type="radio" name="line1" value="2"  onclick="return line1(this)"/> กราฟเส้น</div><br>';


?>
<div class="select_by">
<input type="radio" checked="checked" class="regular-radio" name="by" id="radio-1-set" value="1"  onclick="return line1(this)">
<label for="radio-1-set">เรียงตาม จำนวนสินค้า</label>
<input type="radio"  class="regular-radio" name="by" id="radio-2-set" value="2"  onclick="return line1(this)">
<label for="radio-2-set">เรียงตาม จำนวนเงิน</label>
</div><br>
<br>
<div class="back"><a href="../index_history.php" class="back"></a></div>
<div class="setup"><a href="setting/setting.php" class="setup"></a></div>
<?php require('js/product_amount_function.php')?>
</body>
</html>