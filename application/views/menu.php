<?php
for ($i=0; $i<count($menu); $i++) {
	if (isset($now_page)) $np = $now_page;
	else $np=false;
	if ($np == $i) {
	?><b><?}
	echo $menu[$i];
	if ($np == $i) {
	?></b><?}
	echo " ";
}
?>
