
<script type="text/javascript">
			AmCharts.makeChart("chartdiv_m",
				{
					"type": "serial",
					"categoryField": "category",
					"colors": [
						"#119900",
						"#ee0000",
						"#B0DE09",
						"#0D8ECF",
						"#2A0CD0",
						"#CD0D74",
						"#CC0000",
						"#00CC00",
						"#0000CC",
						"#DDDDDD",
						"#999999",
						"#333333",
						"#990000"
					],
					"startDuration": 1,
					"categoryAxis": {
						"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] ใน [[category]] ทั้งหมด [[value]] คัน",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "จำนวนรถที่ซื้อสินค้า",
							"type": "column",
							"valueField": "จำนวนรถที่ซื้อสินค้า"
						},
						{
							"balloonText": "[[title]] ใน [[category]] ทั้งหมด [[value]] คัน",
							"fillAlphas": 1,
							"id": "AmGraph-2",
							"title": "จำนวนรถที่ไม่ได้ซื้อสินค้า",
							"type": "column",
							"valueField": "จำนวนรถที่ไม่ได้ซื้อสินค้า"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"stackType": "regular",
							"title": "จำนวนรถที่เข้าใช้บริการ Drive Thru รายเดือน"
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
							"text": "จำนวนรถที่เข้าใช้บริการ Drive Thru รายเดือน"
						}
					],
					"dataProvider": [
						<?php echo $all_m;?>
						
					]
				}
			);
			//============================================line_year====================================================
AmCharts.makeChart("line_chartdiv_m",
				{
					"type": "serial",
					"categoryField": "category",
					"colors": [
						"#119900",
						"#ee0000",
						"#B0DE09",
						"#0D8ECF",
						"#2A0CD0",
						"#CD0D74",
						"#CC0000",
						"#00CC00",
						"#0000CC",
						"#DDDDDD",
						"#999999",
						"#333333",
						"#990000"
					],
					"startDuration": 1,
					"categoryAxis": {
						"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"balloonText": "[[title]] ใน [[category]] ทั้งหมด [[value]] คัน",
							"bullet": "round",
							"id": "AmGraph-1",
							"title": "จำนวนรถที่ซื้อสินค้า",
							"valueField": "จำนวนรถที่ซื้อสินค้า"
						},
						{
							"balloonText": "[[title]] ใน [[category]] ทั้งหมด [[value]] คัน",
							"bullet": "square",
							"id": "AmGraph-2",
							"title": "จำนวนรถที่ไม่ได้ซื้อสินค้า",
							"valueField": "จำนวนรถที่ไม่ได้ซื้อสินค้า"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"stackType": "regular",
							"title": "จำนวนรถที่เข้าใช้บริการ Drive Thru รายเดือน"
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
							"text": "จำนวนรถที่เข้าใช้บริการ Drive Thru รายเดือน"
						}
					],
					"dataProvider": [
						<?php echo $all_m;?>
					]
				}
			);
		
	
</script>
