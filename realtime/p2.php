<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="css/css1.css" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>กราฟ</title>
		<meta name="description" content="chart created using amCharts live editor" />
		<!-- amCharts javascript sources -->
		<script type="text/javascript" src="http://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="http://www.amcharts.com/lib/3/serial.js"></script>
		<!-- amCharts javascript code -->

		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<title>Graph</title>
	</head>
	<body>

<p id="demo">
<?php
require("connect_api.php");
//echo $end;
?></p>
		<script>
             var order = <?php echo $end; ?>;
			 var i = 0;
			 var count = order.length;
  			 var all ="";

			 var n8 = 0;
			 var n9=0;
			 var n10=0;
			 var n11=0;
			 var n12=0;
			 var n13=0;
			 var n14=0;
			 var n15=0;
			 var n16=0;

			 var can8 = 0;
			 var can9=0;
			 var can10=0;
			 var can11=0;
			 var can12=0;
			 var can13=0;
			 var can14=0;
			 var can15=0;
			 var can16=0;

	  		 var p8 = 0;
	  		 var p9 = 0;
	  		 var p10 = 0;
	  		 var p11 = 0;
	  		 var p12 = 0;
	  		 var p13 = 0;
	  		 var p14 = 0;
	  		 var p15 = 0;
	  		 var p16 = 0;

	  		 var c8 = 0;
	  		 var c9 = 0;
	  		 var c10 = 0;
	  		 var c11 = 0;
	  		 var c12 = 0;
	  		 var c13 = 0;
	  		 var c14 = 0;
	  		 var c15 = 0;
	  		 var c16 = 0;

	  		 var b8 = 0;
	  		 var b9 = 0;
	  		 var b10 = 0;
	  		 var b11 = 0;
	  		 var b12 = 0;
	  		 var b13 = 0;
	  		 var b14 = 0;
	  		 var b15 = 0;
	  		 var b16 = 0;

			 var str = "";
             var hres="";
             var mres="";
             var hcount = 0;
             var min,hour,h,m,mix="";
             var ans = 0;
             var sta = "";
while(i < count){
	sta = order[i].status;
	str = order[i].timeCreate;
    hres = str.substr(11);
    hour = hres.substr(0, 2);
    mres = str.substr(14);
    min = mres.substr(0, 2);
    h = Number(hour);
    m = Number(min);
    mix = h + "." + m;
    Num = Number(mix);

    if(Num >= 8.0){
    	if(Num <= 9.0){
	if(order[i].status == 0){ n8 += 1; if(order[i].iscancel == 1){n8 -=1;}sta = "new";}
	else if(order[i].status == 1){ p8 += 1; if(order[i].iscancel == 1){p8 -=1;} sta = "pickup";}
	else if(order[i].status == 2){ c8 += 1; if(order[i].iscancel == 1){c8 -=1;} sta = "confirm";}
	else if(order[i].status == 3){ b8 += 1; sta = "bill";}
	if(order[i].iscancel == 1){ can8 +=1;}
		}
	}

	if(Num >= 9.1){
    	if(Num <= 10.0){
	if(order[i].status == 0){ n9 += 1; if(order[i].iscancel == 1){n9 -=1;}sta = "new";}
	else if(order[i].status == 1){ p9 += 1; if(order[i].iscancel == 1){p9 -=1;} sta = "pickup";}
	else if(order[i].status == 2){ c9 += 1; if(order[i].iscancel == 1){c9 -=1;} sta = "confirm";}
	else if(order[i].status == 3){ b9 += 1; sta = "bill";}
	if(order[i].iscancel == 1){ can9 +=1;}
		}
	}

	if(Num >= 10.1){
    	if(Num <= 11.0){
	if(order[i].status == 0){ n10 += 1; if(order[i].iscancel == 1){n10 -=1;}sta = "new";}
	else if(order[i].status == 1){ p10 += 1; if(order[i].iscancel == 1){p10 -=1;} sta = "pickup";}
	else if(order[i].status == 2){ c10 += 1; if(order[i].iscancel == 1){c10 -=1;} sta = "confirm";}
	else if(order[i].status == 3){ b10 += 1; sta = "bill";}
	if(order[i].iscancel == 1){ can10 +=1;}
		}
	}

	if(Num >= 11.1){
    	if(Num <= 12.0){
	if(order[i].status == 0){ n11 += 1; if(order[i].iscancel == 1){n11 -=1;}sta = "new";}
	else if(order[i].status == 1){ p11 += 1; if(order[i].iscancel == 1){p11 -=1;} sta = "pickup";}
	else if(order[i].status == 2){ c11 += 1; if(order[i].iscancel == 1){c11 -=1;} sta = "confirm";}
	else if(order[i].status == 3){ b11 += 1; sta = "bill";}
	if(order[i].iscancel == 1){ can11 +=1;}
		}
	}

	if(Num >= 12.1){
    	if(Num <= 13.0){
	if(order[i].status == 0){ n12 += 1; if(order[i].iscancel == 1){n12 -=1;}sta = "new";}
	else if(order[i].status == 1){ p12 += 1; if(order[i].iscancel == 1){p12 -=1;} sta = "pickup";}
	else if(order[i].status == 2){ c12 += 1; if(order[i].iscancel == 1){c12 -=1;} sta = "confirm";}
	else if(order[i].status == 3){ b12 += 1; sta = "bill";}
	if(order[i].iscancel == 1){ can12 +=1;}
		}
	}

	if(Num >= 13.1){
    	if(Num <= 14.0){
	if(order[i].status == 0){ n13 += 1; if(order[i].iscancel == 1){n13 -=1;}sta = "new";}
	else if(order[i].status == 1){ p13 += 1; if(order[i].iscancel == 1){p13 -=1;} sta = "pickup";}
	else if(order[i].status == 2){ c13 += 1; if(order[i].iscancel == 1){c13 -=1;} sta = "confirm";}
	else if(order[i].status == 3){ b13 += 1; sta = "bill";}
	if(order[i].iscancel == 1){ can13 +=1;}
		}
	}

	if(Num >= 14.1){
    	if(Num <= 15.0){
			if(order[i].status == 0){ n14 += 1; if(order[i].iscancel == 1){n14 -=1;}sta = "new";}
			else if(order[i].status == 1){ p14 += 1; if(order[i].iscancel == 1){p14 -=1;} sta = "pickup";}
			else if(order[i].status == 2){ c14 += 1; if(order[i].iscancel == 1){c14 -=1;} sta = "confirm";}
			else if(order[i].status == 3){ b14 += 1; sta = "bill";}
			if(order[i].iscancel == 1){ can14 +=1;}
		}
	}

	if(Num >= 15.1){
    	if(Num <= 16.0){
	if(order[i].status == 0){ n15 += 1; if(order[i].iscancel == 1){n15 -=1;}sta = "new";}
	else if(order[i].status == 1){ p15 += 1; if(order[i].iscancel == 1){p15 -=1;} sta = "pickup";}
	else if(order[i].status == 2){ c15 += 1; if(order[i].iscancel == 1){c15 -=1;} sta = "confirm";}
	else if(order[i].status == 3){ b15 += 1; sta = "bill";}
	if(order[i].iscancel == 1){ can15 +=1;}
		}
	}
	if(Num >= 16.1){
    	if(Num <= 17.0){
	if(order[i].status == 0){ n16 += 1; if(order[i].iscancel == 1){n16 -=1;}sta = "new";}
	else if(order[i].status == 1){ p16 += 1; if(order[i].iscancel == 1){p16 -=1;} sta = "pickup";}
	else if(order[i].status == 2){ c16 += 1; if(order[i].iscancel == 1){c16 -=1;} sta = "confirm";}
	else if(order[i].status == 3){ b16 += 1; sta = "bill";}
	if(order[i].iscancel == 1){ can16 +=1;}
		}
	}
i++;
}
//alert(n14 + " " +p14+" " +" "+ c14+" " + b14 + "  " +can14);
all = "จำนวนคิวรถที่เข้ามาในบริษัททั้งหมด " + count +" คิว";
document.getElementById("demo").innerHTML = all
                  
			AmCharts.makeChart("chartdiv",
				{
					"type": "serial",
					"categoryField": "category",
					"startDuration": 1,
					"categoryAxis": {
						"gridPosition": "start"
					},
					"type": "serial",
					"categoryField": "category",
					"colors": [
						"#13A000",
						"#FFA800",
						"#fcff00",
						"#003cff",
						"#ff0000",
						"#CD0D74",
						"#CC0000",
						"#00CC00",
						"#0000CC",
						"#DDDDDD",
						"#999999",
						"#333333",
						"#990000"
					],
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "รถเข้า",
							"type": "column",
							"valueField": "column-1"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-2",
							"title": "ขนของ",
							"type": "column",
							"valueField": "column-2"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-3",
							"title": "ตรวจเช็ค",
							"type": "column",
							"valueField": "column-3"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-4",
							"title": "ออกบิล",
							"type": "column",
							"valueField": "column-4"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-5",
							"title": "ยกเลิกสินค้า",
							"type": "column",
							"valueField": "column-5"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "จำนวน/คัน"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": all
						}
					],
					"dataProvider": [
						{
							"category": "08:00 - 09:00",
							"column-1": n8,            
							"column-2": p8,
							"column-3": c8,
							"column-4": b8,
							"column-5": can8
						},
						{
							"category": "09:01 - 10:00",
							"column-1": n9,            
							"column-2": p9,
							"column-3": c9,
							"column-4": b9,
							"column-5": can9
						},
						{
							"category": "10:01 - 11:00",
							"column-1": n10,            
							"column-2": p10,
							"column-3": c10,
							"column-4": b10,
							"column-5": can10
						},
						{
							"category": "11:01 - 12:00",
							"column-1": n11,            
							"column-2": p11,
							"column-3": c11,
							"column-4": b11,
							"column-5": can11
						},
						{
							"category": "12:01 - 13:00",
							"column-1": n12,            
							"column-2": p12,
							"column-3": c12,
							"column-4": b12,
							"column-5": can12
						},
						{
							"category": "13:01 - 14:00",
							"column-1": n13,            
							"column-2": p13,
							"column-3": c13,
							"column-4": b13,
							"column-5": can13
						},
						{
							"category": "14:01 - 15:00",
							"column-1": n14,            
							"column-2": p14,
							"column-3": c14,
							"column-4": b14,
							"column-5": can14
						},
						{
							"category": "15:01 - 16:00",
							"column-1": n15,            
							"column-2": p15,
							"column-3": c15,
							"column-4": b15,
							"column-5": can15
						},
						{
							"category": "16:01 - 17:00",
							"column-1": n16,            
							"column-2": p16,
							"column-3": c16,
							"column-4": b16,
							"column-5": can16
						}
					]
				}
			);

/*//============================================= chart2 =====================================================222============//
			AmCharts.makeChart("chartdiv2",
				{
					"type": "serial",
					"categoryField": "category",
					"angle": 30,
					"depth3D": 30,
					"startDuration": 1,
					"categoryAxis": {
						"gridPosition": "start"
					},"colors": [
						"#13A000",
						"#FFA800",
						"#fcff00",
						"#003cff",
						"#ff0000",
						"#CD0D74",
						"#CC0000",
						"#00CC00",
						"#0000CC",
						"#DDDDDD",
						"#999999",
						"#333333",
						"#990000"
					],
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "รถเข้า",
							"type": "column",
							"valueField": "column-1"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-2",
							"title": "ขนของ",
							"type": "column",
							"valueField": "column-2"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-3",
							"title": "ตรวจเช็ค",
							"type": "column",
							"valueField": "column-3"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-4",
							"title": "ออกบิล",
							"type": "column",
							"valueField": "column-4"
						},
						{
							"balloonText": "[[title]] of [[category]]:[[value]]",
							"fillAlphas": 1,
							"id": "AmGraph-5",
							"title": "ยกเลิกสินค้า",
							"type": "column",
							"valueField": "column-5"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"stackType": "100%",
							"title": "Axis title"
						}
					],
					"allLabels": [],
					"balloon": {},
					"legend": {
						"enabled": true,
						"useGraphSettings": true
					},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "Chart Title"
						}
					],
					"dataProvider": [
						{
							"category": "08:00 - 09:00",
							"column-1": n8,            
							"column-2": p8,
							"column-3": c8,
							"column-4": b8,
							"column-5": can8
						},
						{
							"category": "09:01 - 10:00",
							"column-1": n9,            
							"column-2": p9,
							"column-3": c9,
							"column-4": b9,
							"column-5": can9
						},
						{
							"category": "10:01 - 11:00",
							"column-1": n10,            
							"column-2": p10,
							"column-3": c10,
							"column-4": b10,
							"column-5": can10
						},
						{
							"category": "11:01 - 12:00",
							"column-1": n11,            
							"column-2": p11,
							"column-3": c11,
							"column-4": b11,
							"column-5": can11
						},
						{
							"category": "12:01 - 13:00",
							"column-1": n12,            
							"column-2": p12,
							"column-3": c12,
							"column-4": b12,
							"column-5": can12
						},
						{
							"category": "13:01 - 14:00",
							"column-1": n13,            
							"column-2": p13,
							"column-3": c13,
							"column-4": b13,
							"column-5": can13
						},
						{
							"category": "14:01 - 15:00",
							"column-1": n14,            
							"column-2": p14,
							"column-3": c14,
							"column-4": b14,
							"column-5": can14
						},
						{
							"category": "15:01 - 16:00",
							"column-1": n15,            
							"column-2": p15,
							"column-3": c15,
							"column-4": b15,
							"column-5": can15
						},
						{
							"category": "16:01 - 17:00",
							"column-1": n16,            
							"column-2": p16,
							"column-3": c16,
							"column-4": b16,
							"column-5": can16
						}
					]
				}
			);
*/
		</script>
<div id="contianer">
<div id="p2">
	<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF; margin: auto; border-radius: 5px;" ></div>

	<!--<div id="chartdiv2" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>-->

	<br><h2>รายละเอียดรถที่เข้ามาในบริษัท :</h2>
	<div id="demo"><?php
	require("connect_apiQsmart.php");
?></div>
<div id="TReport"></div>

<script>
                  var data = <?php echo $Qsmart; ?>;
                  var i = 0;
                  var count = data.length;
                  var all ="";
                  var time="";
                  var isCan = "";
                  var sty = "";
                  var Spick=0;
                  var Scheck=0;
                  var Sbill=0;
                  var Mpick=0;
                  var Mcheck=0;
                  var Mbill=0;
                  var Cpick=0;
                  var Ccheck=0;
                  var Cbill=0;
                  var CSpick=0;
                  var CScheck=0;
                  var CSbill=0;

                  all += "<table>";
                  all += "<tr align='center'><th>คิว</th><th width='10%'>ทะเบียนรถ</th><th>ยี่ห้อรถ</th><th>เวลา</th><th width='5%'>สินค้า/รายการ</th><th>มูลค่า pickup</th>";
                  all += "<th>มูลค่าเช็คของ</th><th>มูลค่าออกบิล</th><th>ยกเลิกสินค้า</th></tr>"

                  while(i<count){
                    if(data[i].isCancel == 0){ isCan = "<font color='green'>สมบูรณ์</font>"; }
                    else if(data[i].isCancel == 1){ isCan = "<font color='red'>ยกเลิกคิว</font> "; sty = "style='background:red; color:#fff;'";}

                    Spick += data[i].pickAmount;
                    Scheck += data[i].checkoutAmount;
                    Sbill += data[i].billAmount;
 					time = data[i].createTime.substring(0, 5);
 					Mpick = data[i].pickAmount.toFixed(2);
 					Mcheck = data[i].checkoutAmount.toFixed(2);
 					Mbill = data[i].billAmount.toFixed(2); 				

                    all += "<tr "+sty+"><td align='center'>"+data[i].qId+" </td><td align='right'>"+ data[i].carLicence + 
                    "</td><td align='right'>"+ data[i].carBrand +"</td><td align='right'>"+time+"</td><td align='right'>"+ data[i].numberOfItem+
                    "</td><td align='right'>"+Mpick.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"</td><td align='right'>"+Mcheck.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+
                    "</td><td align='right'>";
                   
                    all += Mbill.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"</td><td align='right'>" + isCan +"</td></tr>";

                    i++;
                  }
                  var SMpick = Spick.toFixed(2);
                  var SMcheck = Scheck.toFixed(2);
                  var SMbill = Sbill.toFixed(2);

                  all +="<tr style='background:#dedee0;' align='right'><td colspan='5' align='left'><b>ยอดรวม Total</b></td><td><b>" + SMpick.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",") 
                  + "</b></td><td><b>"+SMcheck.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"</b></td><td><b>"+SMbill.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+"</b></td><td style='background:gray;'></td></tr>";         
                  all +="</table>";
                  document.getElementById("TReport").innerHTML = all
                  
</script>             
</div>
<div class="back" onClick="window.location='current.php'" ><a href="#" class="back"></a></div>
</div>
	</body>
</html>