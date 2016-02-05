<?php
function etDate($var) {
$arr = array();
		$arr['Jan'] = 'Jaanuar';
		$arr['Feb'] = 'Veebruar';
		$arr['Mar'] = 'Märts';
		$arr['Apr'] = 'Aprill';
		$arr['May'] = 'Mai';
		$arr['Jun'] = 'Juuni';
		$arr['Jul'] = 'Juuli';
		$arr['Aug'] = 'August';
		$arr['Sep'] = 'September';
		$arr['Oct'] = 'Oktoober';
		$arr['Nov'] = 'November';
		$arr['Dec'] = 'Detsember';
		$date = date('j. M Y',strtotime($var));
		$str = strtr($date,$arr);
		return $str;
}

?>