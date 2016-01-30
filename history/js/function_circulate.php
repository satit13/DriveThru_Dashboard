<script>


function line1(li){
	if(li.value==1){
	document.getElementById("chartdiv_w").style.display = "block";
	document.getElementById("line_chartdiv_w").style.display = "none"
	document.getElementById("chartdiv_m").style.display = "block";
	document.getElementById("line_chartdiv_m").style.display = "none"
	document.getElementById("chartdiv_y").style.display = "block";
	document.getElementById("line_chartdiv_y").style.display = "none";
	}else if(li.value==2){
	document.getElementById("chartdiv_w").style.display = "none";
	document.getElementById("line_chartdiv_w").style.display = "block";
	document.getElementById("chartdiv_m").style.display = "none";
	document.getElementById("line_chartdiv_m").style.display = "block";
	document.getElementById("chartdiv_y").style.display = "none";
	document.getElementById("line_chartdiv_y").style.display = "block";}
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
	document.getElementById("select_year").style.display = "none";
	}
function select2(){
	document.getElementById("select1").className = "select_menu";
	document.getElementById("select2").className = "active";
	document.getElementById("select3").className = "select_menu";

	document.getElementById("tcontent1").style.display = "none";
	document.getElementById("tcontent2").style.display = "block";
	document.getElementById("tcontent3").style.display = "none";
	document.getElementById("cal").value = "select2";
	document.getElementById("select_year").style.display = "block";
	}

function select3(){
	document.getElementById("select1").className = "select_menu";
	document.getElementById("select2").className = "select_menu";
	document.getElementById("select3").className = "active";

	document.getElementById("tcontent1").style.display = "none";
	document.getElementById("tcontent2").style.display = "none";
	document.getElementById("tcontent3").style.display = "block";
	document.getElementById("cal").value = "select3";
	document.getElementById("select_year").style.display = "block";

	
	}
function select4(){
	document.getElementById("select1").className = "select_menu";
	document.getElementById("select2").className = "select_menu";
	document.getElementById("select3").className = "select_menu";
	document.getElementById("select4").className = "active";

	document.getElementById("tcontent1").style.display = "none";
	document.getElementById("tcontent2").style.display = "none";
	document.getElementById("tcontent3").style.display = "none";
	document.getElementById("tcontent4").style.display = "block";
	
	}



    function select_month(str){
		menu=document.getElementById("cal").value;         
		window.location="circulate.php?month="+str.value+"&year="+<?php echo $y?>+"&day=<?php echo $day?>"+"&menu="+menu+"&begin_date=<?php echo $begin_date?>"
                }
    function select_year(year){ 
	menu=document.getElementById("cal").value;          
		window.location="circulate.php?year="+year.value+"&month="+<?php echo $m?>+"&day=<?php echo $day?>"+"&menu="+menu+"&begin_date=<?php echo $begin_date?>"
                }
	function select_date(date){
		menu=document.getElementById("cal").value;           
		window.location="circulate.php?day="+date.value+"&month="+<?php echo $m?>+"&year="+<?php echo $y?>+"&menu="+menu+"&begin_date=<?php echo $begin_date?>";
                }
	function select_begin_date(begin_date){
		menu=document.getElementById("cal").value;          
		window.location="circulate.php?begin_date="+begin_date.value+"&month="+<?php echo $m?>+"&year="+<?php echo $y?>+"&day=<?php echo $day?>"+"&menu="+menu;
                }


</script>