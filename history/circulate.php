<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>history ยอดขาย</title>
<?php require('js/script.php')?>
    
</head>
<body onload="check()">

<?php

$link = fopen("setting/circulate.txt","r") or die("Unable to open file!");
$text = fgets($link);;
$url=$text;
fclose($link);
$now_year =date("Y");					
if(isset($_GET['year'])){$y=$_GET['year'];}
else{$y=$now_year;}

echo "<ul class='nav nav-pills nav-justified' id='menu'>";
echo"
<li class='active' id='select1' onclick='select1()'><a href='#'>สรุปยอดขายต่อสัปดาห์</a></li>
<li class='select_menu' id='select2'  onclick='select2()'><a href='#'>สรุปยอดขายต่อเดือน</a></li>
<li class='select_menu' id='select3'  onclick='select3()'><a href='#'>สรุปยอดขายต่อปี</a></li>	 
					
                    
                </ul>";
				echo"<div  class='select_y' id='select_year'>";
				echo '<p>เลือกปี : </p><select  id="year" name="year" onchange="select_year(this)"class="form-control">';
							for($j = 2013; $j<= $now_year; $j++){
							if(empty($_GET['year'])){
									
								if($j==$_GET['year']){echo '<option value="'.$j.'" >ปี '.($j+543).'</option>';
								}else{echo '<option value="'.$j.'"selected=selected>ปี '.($j+543).'</option>';}
								
							}else{
									
								if($j==$_GET['year']){echo '<option value="'.$j.'" selected=selected>ปี '.($j+543).'</option>';
								}else{echo '<option value="'.$j.'">ปี '.($j+543).'</option>';}
								}
								
							}
							
							echo '</select><br class="clear"></div>';

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
echo"<div  class='select_m'><br><br>";

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

//echo date('Y-m-t',strtotime($y.'-'.$m.'-21'));
//echo date("Y-m-d",strtotime( "$day -7 day"));
//$date_7=date("Y-m-d",strtotime("$day -7 day"));
//echo $date_7;
//echo $day;
	
	
$data_w = array (
	"beginDate" => "$begin_date",
	"endDate" => "$day"
	//request : {"beginDate":"2016-01-01","endDate":"2016-01-06"}
	);	
$data_string_w = json_encode($data_w); 
//$token = 'your token here';
$ch_w = curl_init();
curl_setopt($ch_w, CURLOPT_URL, "$url");
curl_setopt($ch_w, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_w, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch_w, CURLOPT_POST, true);
curl_setopt($ch_w, CURLOPT_POSTFIELDS, $data_string_w);
//curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch_w, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string_w)                                                                       
));  

$all_w="";
$use_w=array();$cancel_w=array();
$u_w=0;$c_w=0;  
// execute the request
$json_w = curl_exec($ch_w);
if(!empty($json_w)){
// output the profile information - includes the header
//echo $json_w."<br>";
//$sub = substr($output,9);
$sub_w = "[";
$subs_w = explode("[",$json_w);
//echo $json_w;
$sub_w .= substr($subs_w[1],0,-1);
//echo $sub_w;
//echo $sub_y;
//var_dump(json_decode($sub_w,true));
$out_w=json_decode($sub_w,true);
//echo $sub_y->{'docYear'};
$cnt_w=count($out_w);
//echo $cnt_w;
//echo $y."-".$m."-01 00:00:00.0";
$sum_w=0;
for($i_w=0;$i_w<$cnt_w;$i_w++){
	
	$date= explode("-",$out_w[$i_w]["docDate"]);
	
	$all_w.='{"category": "วันที่  '.$date[2].'","ยอดขาย":'.$out_w[$i_w]["checkoutAmount"].',"ยอดขายที่ทำบิล":'.$out_w[$i_w]["billAmount"].'},';
	//$all_m.='{"category": "วันที่  '.$date[2].'","ยอดขายที่ทำบิล":'.$out_m[$i_m]["billAmount"].',"ยอดขาย":'.$out_m[$i_m]["checkoutAmount"].'},';
	
	$sum_w+=$out_w[$i_w]["billAmount"];
	}
	//echo "<br>".$all_w;
//{"category": "เดือนที่  '+(j+1)+'","ยอดขาย":'+ use[j]+',"จำนวนรถที่ไม่ได้ซื้อสินค้า": '+cancel[j]+'},

require("graph/circulate_graph_w.php");
echo '<div id="chartdiv_w" class="graph"  style="display:block;"></div>
      <div id="line_chartdiv_w" class="graph" style="display:none;"></div>';

echo "<br>";
echo "<p class='right'>ยอดขายตั้งแต่วันที่ $begin_date ถึง $day เท่ากับ ".number_format($sum_w)." บาท</p>";
}
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
for($n=1;$n<=12;$n++) {
		if($n==$m){echo"<h3>สรุปยอดขาย ประจำเดือน $month[$n] ปี $y</h3>";
}}

	//secho date('Y-m-t',strtotime($y.'-'.$m.'-21'));
$data_m = array (
	"beginDate" => "$y-$m-01",
	"endDate" => date('Y-m-t',strtotime($y.'-'.$m.'-21'))
	//request : {"beginDate":"2016-01-01","endDate":"2016-01-06"}
	);
$data_string_m = json_encode($data_m); 
//$token = 'your token here';
$ch_m = curl_init();
curl_setopt($ch_m, CURLOPT_URL, "$url");
curl_setopt($ch_m, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_m, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch_m, CURLOPT_POST, true);
curl_setopt($ch_m, CURLOPT_POSTFIELDS, $data_string_m);
//curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch_m, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string_m)                                                                       
));  

$all_m="";
$use_m=array();$cancel_m=array();
$u_m=0;$c_m=0;  
// execute the request
$json_m = curl_exec($ch_m);
// output the profile information - includes the header
//echo $output."<br>";
//$sub = substr($output,9);
if(!empty($json_m)){
$sub_m = "[";
$subs_m = explode("[",$json_m);
//echo $json_m;
$sub_m .= substr($subs_m[1],0,-1);
//echo $sub_m;
//echo $sub_y;
//var_dump(json_decode($sub_m,true));
$out_m=json_decode($sub_m,true);
//echo $sub_y->{'docYear'};
$cnt_m=count($out_m);
//echo $cnt_m;
//echo $y."-".$m."-01 00:00:00.0";
$sum_m=0;
for($i_m=0;$i_m<$cnt_m;$i_m++){
	 
	$date= explode("-",$out_m[$i_m]["docDate"]);
	
	$all_m.='{"category": "วันที่  '.$date[2].'","ยอดขายที่ทำบิล":'.$out_m[$i_m]["billAmount"].',"ยอดขาย":'.$out_m[$i_m]["checkoutAmount"].'},';
	$sum_m+=$out_m[$i_m]["billAmount"];
	}
	//echo "<br>".$all_m;
//{"category": "เดือนที่  '+(j+1)+'","ยอดขาย":'+ use[j]+',"จำนวนรถที่ไม่ได้ซื้อสินค้า": '+cancel[j]+'},

require("graph/circulate_graph_m.php");
echo'<div id="chartdiv_m" class="graph"  style="display:block;"></div>
<div id="line_chartdiv_m" class="graph"  style="display:none;"></div>';


echo"<br>";
for($n=1;$n<=12;$n++) {
		if($n==$m){echo"<p class='right'>ยอดขายประจำเดือน $month[$n]ปี $y เท่ากับ ".number_format($sum_m)." บาท</p>";
}}
}

echo"</div>";
echo"</div>";
//--------------------------------------------------------------------------------------year-------------------------------------------------------------------------------------------------------------------------
echo "<div id='tcontent3' style='display:none;'>";
echo"<div  class='select_m'>";
echo"<h3>สรุปยอดขาย ประจำปี $y</h3>";
$data_y = array (
	"beginDate" => "$y-01-01",
	"endDate" => "$y-12-31"
	//request : {"beginDate":"2016-01-01","endDate":"2016-01-06"}
	);
$data_string_y = json_encode($data_y); 
//$token = 'your token here';
$ch_y = curl_init();
curl_setopt($ch_y, CURLOPT_URL, "$url");
curl_setopt($ch_y, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_y, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch_y, CURLOPT_POST, true);
curl_setopt($ch_y, CURLOPT_POSTFIELDS, $data_string_y);
//curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch_y, CURLOPT_HTTPHEADER, array(                                                                          
    'Content-Type: application/json',                                                                                
    'Content-Length: ' . strlen($data_string_y)                                                                       
));  

$all_y="";
$bill_y=array();
$c_y=0;
$cir_y=array();
$b_y=0; 
// execute the request
$json_y = curl_exec($ch_y);
// output the profile information - includes the header
//echo $output."<br>";
//$sub = substr($output,9);
if(!empty($json_y)){
$sub_y = "[";
$subs_y = explode("[",$json_y);
$sub_y .= substr($subs_y[1],0,-1);
//echo $sub_y;
//var_dump(json_decode($sub_y,true));
$out=json_decode($sub_y,true);
//echo $sub_y;
$cnt=count($out);
for($i=0;$i<$cnt;$i++){
	
	
switch($out[$i]["docMonth"]){
	case '1':$b_y+=$out[$i]["billAmount"]; $bill_y[0]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[0]=$c_y; break;
	case '2':$b_y += $out[$i]["billAmount"]; $bill_y[1]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[1]=$c_y;  break;
	case '3':$b_y += $out[$i]["billAmount"]; $bill_y[2]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[2]=$c_y; break;	
	case '4':$b_y += $out[$i]["billAmount"]; $bill_y[3]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[3]=$c_y;  break;
	case '5':$b_y += $out[$i]["billAmount"]; $bill_y[4]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[4]=$c_y;  break;
	case '6':$b_y += $out[$i]["billAmount"]; $bill_y[5]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[5]=$c_y;  break;
	case '7':$b_y += $out[$i]["billAmount"]; $bill_y[6]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[6]=$c_y;  break;
	case '8':$b_y += $out[$i]["billAmount"]; $bill_y[7]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[7]=$c_y;  break;
	case '9':$b_y += $out[$i]["billAmount"]; $bill_y[8]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[8]=$c_y;  break;
	case '10':$b_y+= $out[$i]["billAmount"]; $bill_y[9]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[9]=$c_y;  break;
	case '11':$b_y+= $out[$i]["billAmount"]; $bill_y[10]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[10]=$c_y;  break;
	case '12':$b_y+= $out[$i]["billAmount"]; $bill_y[11]=$b_y; $c_y+=$out[$i]["checkoutAmount"]; $cir_y[11]=$c_y;  break;
	
	}	
	
//echo $out[$i]["isUsedQty"]."<br>"; 
}
$sum_y=0;
for($j=0;$j<12;$j++){
	if(empty($bill_y[$j])){$bill_y[$j]=0;}
	if(empty($cir_y[$j])){$cir_y[$j]=0;}
	$all_y.='{"category": "เดือนที่  '.($j+1).'","ยอดขาย":'.$cir_y[$j].',"ยอดขายที่ทำบิล":'.$bill_y[$j].'},';
	//$all_m.='{"category": "วันที่  '.$date[2].'","ยอดขายที่ทำบิล":'.$out_m[$i_m]["billAmount"].',"ยอดขาย":'.$out_m[$i_m]["checkoutAmount"].'},';
	$sum_y+=$bill_y[$j];
	
	}
	//echo $all_y;
//{"category": "เดือนที่  '+(j+1)+'","ยอดขาย":'+ use[j]+',"จำนวนรถที่ไม่ได้ซื้อสินค้า": '+cancel[j]+'},
require("graph/circulate_graph_y.php");


echo '<div id="chartdiv_y" class="graph"  style="display:block;"></div>
<div id="line_chartdiv_y" class="graph"  style="display:none;"></div>';
echo "<br><p class='right'>ยอดขายประจำปี $y เท่ากับ ".number_format($sum_y)." บาท</p>";
}
echo"</div>";

echo"</div>";

//echo'<div class="select_g"><input type="radio" name="line1" value="1" onclick="return line1(this)" checked="checked"/> กราฟแท่ง <input type="radio" name="line1" value="2"  onclick="return line1(this)"/> กราฟเส้น</div><br>';


?>
<div class="select_g">
<input type="radio" checked="checked" class="regular-radio" name="line1" id="radio-1-set" value="1"  onclick="return line1(this)">
<label for="radio-1-set">กราฟแท่ง</label>
<input type="radio" class="regular-radio" name="line1" id="radio-2-set" value="2"  onclick="return line1(this)">
<label for="radio-2-set">กราฟเส้น</label>
</div><br>
<br>
<div class="back"><a href="../index_history.php" class="back"></a></div>
<div class="pie"><a href="test_pick.php" class="pie"></a></div>
<div class="setup"><a href="setting/setting.php" class="setup"></a></div>
<?php require('js/function_circulate.php');?>
</body>
</html>