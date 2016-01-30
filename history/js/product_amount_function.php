<script>


function line1(li){
	if(li.value==1){
	document.getElementById("product_w").style.display = "block";
	document.getElementById("product_bymoney_w").style.display = "none"
	document.getElementById("product_m").style.display = "block";
	document.getElementById("product_bymoney_m").style.display = "none"
	document.getElementById("product_y").style.display = "block";
	document.getElementById("product_bymoney_y").style.display = "none";
	
	
	}else if(li.value==2){
	document.getElementById("product_w").style.display = "none";
	document.getElementById("product_bymoney_w").style.display = "block";
	document.getElementById("product_m").style.display = "none";
	document.getElementById("product_bymoney_m").style.display = "block";
	document.getElementById("product_y").style.display = "none";
	document.getElementById("product_bymoney_y").style.display = "block";}
	}
function check(){
  	if(document.getElementById("cal").value == "select1"){
	select1();
	}else if(document.getElementById("cal").value == "select2"){
	select2();	
	}else if(document.getElementById("cal").value == "select3"){
	select3();
	}
}
function select1(){
	document.getElementById("select1").className = "active";
	document.getElementById("select2").className = "select_menu";
	document.getElementById("select3").className = "select_menu";

	document.getElementById("tcontent1").style.display = "block";
	document.getElementById("tcontent2").style.display = "none";
	document.getElementById("tcontent3").style.display = "none";
	document.getElementById("cal").value = "select1";
	}
function select2(){
	document.getElementById("select1").className = "select_menu";
	document.getElementById("select2").className = "active";
	document.getElementById("select3").className = "select_menu";

	document.getElementById("tcontent1").style.display = "none";
	document.getElementById("tcontent2").style.display = "block";
	document.getElementById("tcontent3").style.display = "none";
	document.getElementById("cal").value = "select2";
	}

function select3(){
	document.getElementById("select1").className = "select_menu";
	document.getElementById("select2").className = "select_menu";
	document.getElementById("select3").className = "active";

	document.getElementById("tcontent1").style.display = "none";
	document.getElementById("tcontent2").style.display = "none";
	document.getElementById("tcontent3").style.display = "block";
	document.getElementById("cal").value = "select3";

	
	}


    function select_month(str){
		menu=document.getElementById("cal").value;         
		window.location="product_amount.php?month="+str.value+"&year="+<?php echo $y?>+"&day=<?php echo $day?>"+"&menu="+menu+"&begin_date=<?php echo $begin_date?>";
                }
    function select_year(year){ 
	menu=document.getElementById("cal").value;          
		window.location="product_amount.php?year="+year.value+"&month="+<?php echo $m?>+"&day=<?php echo $day?>"+"&menu="+menu+"&begin_date=<?php echo $begin_date?>";
                }
	function select_date(date){
		menu=document.getElementById("cal").value;           
		window.location="product_amount.php?day="+date.value+"&month="+<?php echo $m?>+"&year="+<?php echo $y?>+"&menu="+menu+"&begin_date=<?php echo $begin_date?>";
                }
	function select_begin_date(begin_date){
		menu=document.getElementById("cal").value;          
		window.location="product_amount.php?begin_date="+begin_date.value+"&month="+<?php echo $m?>+"&year="+<?php echo $y?>+"&day=<?php echo $day?>"+"&menu="+menu;
                }
</script>