		<script type="text/javascript">//================================script=======================================================================

			AmCharts.makeChart("product_w",
				{
					"type": "serial",
					"categoryField": "product",
					"rotate": true,
					"startDuration": 1,
					"categoryAxis": {
					"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "จำนวนสินค้า",
							"type": "column",
							"valueField": "amount",
							"balloonText": "ยอดขายจำนวน [[value]] หน่วย"
						}
					],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "rank สินค้ายอดนิยม 10 อันดับ"
						}
					],
					"allLabels": [],
					"balloon": {},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "rank สินค้ายอดนิยม 10 อันดับ"
						}
					],
					"dataProvider": [
						<?php echo $all_product?>
					]
				}
			);
//===========================================บาท===============================================================
			AmCharts.makeChart("product_bymoney_w",
				{
					"type": "serial",
					"categoryField": "product",
					"rotate": true,
					"startDuration": 1,
					"categoryAxis": {
					"gridPosition": "start"
					},
					"trendLines": [],
					"graphs": [
						{
							"fillAlphas": 1,
							"id": "AmGraph-1",
							"title": "จำนวนสินค้า",
							"type": "column",
							"valueField": "amount",
							"balloonText": "ยอดขายจำนวน [[value]] บาท"
						}
					],
					"valueAxes": [
						{
							"id": "ValueAxis-1",
							"title": "rank สินค้ายอดนิยม 10 อันดับ"
						}
					],
					"allLabels": [],
					"balloon": {},
					"titles": [
						{
							"id": "Title-1",
							"size": 15,
							"text": "rank สินค้ายอดนิยม 10 อันดับ"
						}
					],
					"dataProvider": [
						<?php echo $product_bymoney_w?>
					]
				}
			);
		</script>
