<?php
include_once('../simplehtmldom_1_5/simple_html_dom.php');
$cron_togel = new cron_togel;
$cron_togel->scrap();
class cron_togel{
	function scrap(){
		$html = new simple_html_dom();
		// $html->load_file('http://www.4dking.com.my/');
		$html->load_file('http://putartogel.com/live_4d.php');
		/* echo "<pre>";
		for($i=0;$i<23;$i++){
			$sgtoto[] = $html->find("#SG_today",0)->parent()->next_sibling()->find('span',$i)->plaintext;
		}
		var_dump($sgtoto); */
		$prize1 = $html->plaintext;
		$prize = preg_replace('/[\[\]\"]/', '', $prize1);
		echo $prize;
	}
	function save(){
		
	}
}
?>