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



   
   
function select_date(date){      
		window.location="test_pick.php?day="+date.value;
                }
</script>