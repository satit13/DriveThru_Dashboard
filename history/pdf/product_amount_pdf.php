<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php require('ThaiPDF/thaipdf.php');
$link = fopen("../setting/product.txt","r") or die("Unable to open file!");
$text = fgets($link);;
$url_product=$text;
fclose($link);
$now_date =date("Y-m-d");					
if(isset($_GET['day'])){$day=$_GET['day'];}else{$day=$now_date;}
if(isset($_GET['begin'])){$begin_date=$_GET['begin'];}else{$begin_date=date("Y-m-d",strtotime("$day -6 day"));}
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
//$sq= $sub_w_s;
//$sq= $out_w;
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

$sq = "<h2>รายการสินค้าทั้งหมดที่ขายได้ตั้งแต่วันที่ $begin_date ถึง $day</h2>";
$title="รายการสินค้าทั้งหมดที่ขายได้ตั้งแต่วันที่ $begin_date ถึง $day";
$sq .= "<h3>เรียงตามจำนวนสินค้า</h3>";

$sq.= "<table border='1' width='100%' style='border-collapse:collspse;'>";
$sq.= "<tr style='background:#ccc;'><th>สินค้า</th><th>จำนวนสินค้าที่ขายได้</th></tr>";
$cnt_w=count($result);
//echo $cnt_w;
$all_product_w="";
for($i=0;$i<$cnt_w;$i++){
	$sq.= "<tr><td>".$sort['itemName'][$i]."</td><td style='text-align:center;'>".number_format($sort['checkoutQty'][$i])." หน่วย </td></tr>";
	$all_product_w+=$sort['checkoutQty'][$i];
	}
$sq.= "</table>";

$sq.="<p align='right'>จำนวนสินค้า ".number_format($all_product_w)." หน่วย</p>";
//$xx =json_encode($result);
//echo $xx;


//===================================================แบ่งตาม เงิน==================================================

$sq.="<br><h3>เรียงตามจำนวนเงิน</h3>";
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
$sq.= "<table border='1' width='100%' style='border-collapse:collspse;'>";
$sq.= "<tr style='background:#ccc;'><th>สินค้า</th><th>จำนวนเงินที่ได้รับ</th></tr>";
$cnt_bymoney_w=count($result_bymoney_w);
//echo $cnt_bymoney_w;
$product_bymoney_w=0;
for($i_bymoney_w=0;$i_bymoney_w<$cnt_bymoney_w;$i_bymoney_w++){
	$sq.="<tr><td>".$sort_bymoney_w['itemName'][$i_bymoney_w]."</td><td style='text-align:center;'>".number_format($sort_bymoney_w['billAmount'][$i_bymoney_w])." บาท </td></tr>";
	$product_bymoney_w+=$sort_bymoney_w['billAmount'][$i_bymoney_w];
	}
$sq.="</table>";
$sq.="<p align='right'>จำนวนเงินทั้งหมด ".number_format($product_bymoney_w)." บาท</p>";
//echo $product_bymoney_w;
//echo $all_product;

}
pdf_title($title);
pdf_html($sq);
pdf_echo();
?>
</body>
</html>