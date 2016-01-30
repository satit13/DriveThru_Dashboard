<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php require('ThaiPDF/thaipdf.php');
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

$report="<h2>รายงานสินค้าขายดี ประจำปี $y</h2>";
$title="รายงานสินค้าขายดี ประจำปี $y";
$report .= "<h3>เรียงตามจำนวนสินค้า</h3>";
$link = fopen("../setting/product.txt","r") or die("Unable to open file!");
$text = fgets($link);;
$url_product=$text;
fclose($link);
	//secho date('Y-m-t',strtotime($y.'-'.$m.'-21'));
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
if(empty($result_y)){$report= "<h1>ไม่มีข้อมูลของปี $y</h1>";
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



$report.= "<table border='1' width='100%' style='border-collapse:collspse;'>";
$report.="<tr style='background:#ccc;'><th>สินค้า</th><th>จำนวนสินค้าที่ขายได้</th></tr>";
$cnt_y=count($result_y);
//echo $cnt_y;
$all_product_y=0;

for($i_y=0;$i_y<$cnt_y;$i_y++){
	$report.="<tr><td>".$sort_y['itemName'][$i_y]."</td><td style='text-align:center;'>".number_format($sort_y['checkoutQty'][$i_y])." หน่วย</td></tr>";
	$all_product_y+=$sort_y['checkoutQty'][$i_y];
	}
$report.="</table>";
$report.="<p align='right'>จำนวนสินค้าทั้งหมด ".number_format($all_product_y)." หน่วย</p>";
//echo $all_product_y;
//$xx =json_encode($result);
//echo $xx;

$report.="<br><h3>เรียงตามจำนวนเงิน</h3>";
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
$report.= "<table border='1' width='100%' style='border-collapse:collspse;'>";
$report.="<tr style='background:#ccc;'><th>สินค้า</th><th>ยอดเงินที่ได้รับ</th></tr>";
$cnt_bymoney_y=count($result_bymoney_y);
//echo $cnt_bymoney_y;
$product_bymoney_y=0;
for($i_bymoney_y=0;$i_bymoney_y<$cnt_y;$i_bymoney_y++){
	$report.="<tr><td>".$sort_bymoney_y['itemName'][$i_bymoney_y]."</td><td style='text-align:center;'>".number_format($sort_bymoney_y['billAmount'][$i_bymoney_y])." บาท</td></tr>";
	$product_bymoney_y+=$sort_bymoney_y['billAmount'][$i_bymoney_y];
	}
$report.="</table>";
$report.="<p align='right'>จำนวนเงินทั้งหมด ".number_format($product_bymoney_y)." บาท</p>";
//echo $product_bymoney_y;
}

pdf_title($title);
pdf_html($report);
pdf_echo();

?>
</body>
</html>