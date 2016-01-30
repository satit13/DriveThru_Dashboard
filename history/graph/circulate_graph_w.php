<script type="text/javascript">
			AmCharts.makeChart("chartdiv_w",
				{
					"type": "serial",
					"categoryField": "category",
					"colors": [
						"#FCD202",
						"#66FF00",
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
							"balloonText": "[[title]] ของ [[category]] เท่ากับ [[value]] บาท",
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "ยอดขาย",
							"type": "column",
							"valueField": "ยอดขาย"
						},
						{
							"balloonText": "[[title]] ของ [[category]] เท่ากับ [[value]] บาท",
							"fillAlphas": 1,
							"id": "AmGraph-2",
							"title": "ยอดขายที่ทำบิล",
							"type": "column",
							"valueField": "ยอดขายที่ทำบิล"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "ยอดขายสินค้า"
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
							"text": "ยอดขายสินค้าย้อนหลัง 7 วัน"
						}
					],
					"dataProvider": [<?php echo $all_w;?>
					]
				}
			);
		
			
//-------------------------------------------------------------------------------------------
					AmCharts.makeChart("line_chartdiv_w",
				{
					"type": "serial",
					"categoryField": "category",
					"colors": [
						"#22cc00",
						"#FCD202",
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
							"balloonText": "[[title]] ของ [[category]] เท่ากับ [[value]] บาท",
							"bullet": "round",
							"id": "AmGraph-1",
							"title": "ยอดขาย",
							"valueField": "ยอดขาย"
						},
						{
							"balloonText": "[[title]] ของ [[category]] เท่ากับ [[value]] บาท",
							"bullet": "square",
							"id": "AmGraph-2",
							"title": "ยอดขายที่ทำบิล",
							"valueField": "ยอดขายที่ทำบิล"
						}
					],
					"guides": [],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "ยอดขายสินค้า"
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
							"text": "ยอดขายสินค้าย้อนหลัง 7 วัน"
						}
					],
					"dataProvider": [
						<?php echo $all_w;?>
					]
				}
			);
		</script>