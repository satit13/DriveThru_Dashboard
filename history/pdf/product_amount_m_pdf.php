<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php require('ThaiPDF/thaipdf.php');
if(isset($_GET['month'])){
$m=$_GET['month'];
}else{$m=date("m");}

if(isset($_GET['year'])){
$y=$_GET['year'];
}else{$y=date("Y");}

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

for($n=1;$n<=12;$n++) {
		if($n==$m){$report="<h2>รายงานสินค้าขายดี ประจำเดือน $month[$n] ปี $y</h2>";
		

}}
$title="รายงานสินค้าขายดี ประจำเดือน";
$sq .= "<h3>เรียงตามจำนวนสินค้า</h3>";
$link = fopen("../setting/product.txt","r") or die("Unable to open file!");
$text = fgets($link);;
$url_product=$text;
fclose($link);
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
if(empty($result_m)){$report= "<h1>ไม่มีข้อมูลของปี $y</h1>";
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



$report.= "<table border='1' width='100%' style='border-collapse:collspse;'>";
$report.="<tr style='background:#ccc;'><th>สินค้า</th><th>จำนวนสินค้าที่ขายได้</th></tr>";
$cnt_m=count($result_m);
//echo $cnt_m;
$all_product_m=0;

for($i_m=0;$i_m<$cnt_m;$i_m++){
	$report.="<tr><td>".$sort_m['itemName'][$i_m]."</td><td style='text-align:center;'>".number_format($sort_m['checkoutQty'][$i_m])." หน่วย</td></tr>";
	$all_product_m+=$sort_m['checkoutQty'][$i_m];
	}
$report.="</table>";
$report.="<p align='right'>จำนวนสินค้าทั้งหมด ".number_format($all_product_m)." หน่วย</p>";
//echo $all_product_m;
//$xx =json_encode($result);
//echo $xx;

$report.="<br><h3>เรียงตามจำนวนเงิน</h3>";
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
$report.= "<table border='1' width='100%' style='border-collapse:collspse;'>";
$report.="<tr style='background:#ccc;'><th>สินค้า</th><th>ยอดเงินที่ได้รับ</th></tr>";
$cnt_bymoney_m=count($result_bymoney_m);
//echo $cnt_bymoney_m;
$product_bymoney_m=0;
for($i_bymoney_m=0;$i_bymoney_m<$cnt_m;$i_bymoney_m++){
	$report.="<tr><td>".$sort_bymoney_m['itemName'][$i_bymoney_m]."</td><td style='text-align:center;'>".number_format($sort_bymoney_m['billAmount'][$i_bymoney_m])." บาท</td></tr>";
	$product_bymoney_m+=$sort_bymoney_m['billAmount'][$i_bymoney_m];
	}
$report.="</table>";
$report.="<p align='right'>จำนวนเงินทั้งหมด ".number_format($product_bymoney_m)." บาท</p>";
//echo $product_bymoney_m;
}

pdf_title($title);
pdf_html($report);
pdf_echo();

?>
</body>
</html>