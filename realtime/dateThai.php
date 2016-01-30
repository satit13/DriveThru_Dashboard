<?php

$day = date('d');
$y = date('Y');
$year ="";

$curdate = "";
switch (date("m")){
  case 1: $curdate = $day ." "." มกราคม ". ($y+543);
    break;
  case 2: $curdate = $day ." "." กุมภาพันธ์ ". ($y+543);
    break;
  case 3: $curdate = $day ." "." มีนาคม ". ($y+543);
    break;
  case 4: $curdate = $day ." "." เมษายน ". ($y+543);
    break;
  case 5: $curdate = $day ." "." พฤษภาคม ". ($y+543);
    break;
  case 6: $curdate = $day ." "." มิถุนายน ". ($y+543);
    break;
  case 7: $curdate = $day ." "." กรกฎาคม ". ($y+543);
    break;
  case 8: $curdate = $day ." "." สิงหาคม ". ($y+543);
    break;
  case 9: $curdate = $day ." "." กันยายน ". ($y+543);
    break;
  case 19: $curdate = $day ." "." ตุลาคม ". ($y+543);
    break;
  case 11: $curdate = $day ." "." พฤศจิกายน". ($y+543);
    break;
  case 12: $curdate = $day ." "." ธันวาคม ". ($y+543);
    break;  
}
?>