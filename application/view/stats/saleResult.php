	<?php
	function countMessage($var) {
		if(count($var) == 1) {
			$message = ' tulemus';
		} else {
			
			$message = ' tulemust';
		}
	echo 'Kokku: ' .  '<b>' . count($var) .'</b>' .$message;
	}
	

	?>
<h2>Tulemused</h2>
<div id='dialog' title='Müügi arendite päring'>
<table width='300' border='1'>

	<form name='arendid' method='get' action='<?php echo URL?>stats/getStats'>
		<tr>
		<td><label for='stat1'><b>Kuupäev:</b>
		<input type="text" style="width: 0; height: 0; top: -100px; position: absolute;"/>
		<input type='text' class='datepicker styledForm' <?php if(isset($_GET['date'])) echo 'value="'.$_GET['date'].'"'?> autofocus="false" id='stat1' name='date'>
		</label>
		</td>
		</tr>
		<tr>
		<td><label for='sDate'><b>Algus:</b></label><input type='text' id='sDate' 
			<?php if(isset($_GET['startDate'])) echo 'value="'.$_GET['startDate'].'"'?> class='datepicker styledForm' size='9' name='startDate'>
		<label for='eDate'><b>Lõpp:</b></label><input type='text' id='eDate' 
		<?php if(isset($_GET['endDate'])) echo 'value="'.$_GET['endDate'].'"'?> class='datepicker styledForm' size='9' name='endDate'></td>
		</tr>
	
		
		<tr>
		<td><label for='todayStat'><b>Täna</b></label><input id='todayStat' type='checkbox' name='today'
			 value="<?php echo date("Y-m-d",  strtotime("today"));?>" 
			 <?php if(isset($_GET['today'])) echo 'checked="checked"';?>>
		<label for='yesterdayStat'><b>Eile</b></label><input id='yesterdayStat' type='checkbox' 
		name='yesterday' value="<?php echo date("Y-m-d",  strtotime("yesterday"));?>"  <?php if(isset($_GET['yesterday'])) echo 'checked="checked"';?>></td>
		</tr>
		<tr>
		<td><label for='thisWeek'><b>Jooksev nädal</b></label><input id='thisWeek' type='checkbox' name='thisWeek' 
			<?php if(isset($_GET['thisWeek'])) echo 'checked="checked"';?> value="<?php echo date("Y-m-d",  strtotime("this week"));?>">
		<label for='pastWeek'><b>Eelmine nädal</b></label>
		
		<input id='pastWeek' 
		type='checkbox' value="<?php echo date('Y-m-d',strtotime('last monday'));?>" <?php if(isset($_GET['pastWeek'])) echo 'checked="checked"';?> name='pastWeek'>
			<input id='pastWeek2' type='checkbox' style='display:none;' <?php if(isset($_GET['pastWeek2'])) echo 'checked="checked"';?> value="<?php echo date('Y-m-d',strtotime('last sunday'));?>" name='pastWeek2'></td>
		</td>
		</tr>
		<tr>
		<td><label for='thisMonth'><b>Jooksev kuu</b></label><input id='thisMonth' type='checkbox' 
			name='thisMonth' <?php if(isset($_GET['thisMonth'])) echo 'checked="checked"';?> value="<?php echo date("Y-m",  strtotime("this month"));?>">

		<label for='pastMonth'><b>Eelmine kuu</b></label><input id='pastMont' type='checkbox' name='pastMonth'
		<?php if(isset($_GET['pastMonth'])) echo 'checked="checked"';?> value="<?php echo date("Y-m",  strtotime("-1 month"));?>"></td>
		</tr>
		<tr>
		<td><input type='submit' class='styledSubmit' value='Päring'></td>
	</tr>
			</form>


</table>
</div>
<a href='javascript:void(0)' id='openDialog'>Muuda tulemuste päringut</a>
<hr>
<br>
<table width='650' border='1'>
	
<?php
$c0 = 1;
if(isset($this->dateResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Kuupäeva tulemused</h4>';
countMessage($this->dateResult);
if (is_array($this->dateResult))
{
	foreach($this->dateResult as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c0++ . '</td>';
		echo '<td>' . etDate($v['date']).', '. $v['time'].'</td>';
		echo '<td>' . $v['type'] . '</td>';
		echo '<td>' . $v['price'] . '&euro;</td>';
		echo '</tr>';
		
	}
}

foreach($this->dateSumResult as $key => $value) {
			
			echo '<tr>';
			echo '<td><b>Kuupäev: </b>' . etDate($value['sum_date']) .'</td>';
			echo '<td><b>Kaardimakse: </b>' . $value['card_payment'] .'&euro;</td>';
			echo '<td><b>Sularaha: </b>' . $value['cash_payment'] .'&euro;</td>';
			echo '<td><b>Summa kokku: </b> ' . $value['total_sum'] . '&euro;</td>';
			echo '</tr>';
		}
}
?>
</table>

<table width='650' border='1'>
	
<?php
$c1 = 1;
if(isset($this->eandsDateResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Vahemiku tulemused</h4>';
countMessage($this->eandsDateResult);
if (is_array($this->eandsDateResult))
{
	foreach($this->eandsDateResult as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c1++ . '</td>';
		echo '<td>' . etDate($v['date']).', '. $v['time'].'</td>';
		echo '<td>' . $v['type'] . '</td>';
		echo '<td>' . $v['price'] . '&euro;</td>';
		echo '</tr>';
		
	}
}

foreach($this->eandsDateSumResult as $key => $value) {
			
			echo '<tr>';
			echo '<td><b>Kuupäev: </b>' . etDate($value['sum_date']) .'</td>';
			echo '<td><b>Kaardimakse: </b>' . $value['card_payment'] .'&euro;</td>';
			echo '<td><b>Sularaha: </b>' . $value['cash_payment'] .'&euro;</td>';
			echo '<td><b>Summa kokku: </b> ' . $value['total_sum'] . '&euro;</td>';
			echo '</tr>';
		}

}
?>
</table>



<table width='650' border='1'>
<?php
$c2 = 1;
if(isset($this->todayResult) == '') {
	
	echo '';
	
} else {
	echo '<h4>Tänasepäeva tulemused</h4>';
		countMessage($this->todayResult);
if (is_array($this->todayResult))
{
	foreach($this->todayResult as $k => $v) {
		
		//echo $b;
		//$blah = date("j. F, Y", strtotime($v['date']));
		
		echo '<tr>';
		echo '<td>' . $c2++ . '</td>';
		echo '<td>' . etDate($v['date']).', '. $v['time'].'</td>';
		echo '<td>' . $v['type'] . '</td>';
		echo '<td>' . $v['price'] . '&euro;</td>';
		
		echo '</tr>';
		
		
		
	}
}
	foreach($this->todaySumResult as $key => $value) {
			
			echo '<tr>';
			echo '<td><b>Kuupäev: </b>' . etDate($value['sum_date']) .'</td>';
			echo '<td><b>Kaardimakse: </b>' . $value['card_payment'] .'&euro;</td>';
			echo '<td><b>Sularaha: </b>' . $value['cash_payment'] .'&euro;</td>';
			echo '<td><b>Summa kokku: </b> ' . $value['total_sum'] . '&euro;</td>';
			echo '</tr>';
		}
	
}

?>
</table>

<table width='650' border='1'>
	
<?php
$c3 = 1;
if(isset($this->yesterdayResult) == '') {
	
	echo '';
	
} else {
	echo '<h4>Eilsepäeva tulemused</h4>';
	countMessage($this->yesterdayResult);
if (is_array($this->yesterdayResult))
{
	foreach($this->yesterdayResult as $k => $v) {
		
	
		echo '<tr>';
		echo '<td>' . $c3++ . '</td>';
		echo '<td>' . etDate($v['date']).', '. $v['time'].'</td>';
		echo '<td>' . $v['type'] . '</td>';
		echo '<td>' . $v['price'] . '&euro;</td>';
		echo '</tr>';
		
	}
}

	foreach($this->yesterdaySumResult as $key => $value) {
			
			echo '<tr>';
			echo '<td><b>Kuupäev: </b>' . etDate($value['sum_date']) .'</td>';
			echo '<td><b>Kaardimakse: </b>' . $value['card_payment'] .'&euro;</td>';
			echo '<td><b>Sularaha: </b>' . $value['cash_payment'] .'&euro;</td>';
			echo '<td><b>Summa kokku: </b> ' . $value['total_sum'] . '&euro;</td>';
			echo '</tr>';
		}

}
?>
</table>

<table width='650' border='1'>
	
<?php
$c4 = 1;
if(isset($this->thisWeekResult) == '') {
	
	echo '';
	
} else {
	echo '<h4>Selle nädala tulemused</h4>';
	countMessage($this->thisWeekResult);
if (is_array($this->thisWeekResult))
{
	foreach($this->thisWeekResult as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c4++ . '</td>';
		echo '<td>' . etDate($v['date']).', '. $v['time'].'</td>';
		echo '<td>' . $v['type'] . '</td>';
		echo '<td>' . $v['price'] . '&euro;</td>';
		echo '</tr>';
		
	}
}

foreach($this->thisWeekSumResult as $key => $value) {
			
			echo '<tr>';
			echo '<td><b>Kuupäev: </b>' . etDate($value['sum_date']) .'</td>';
			echo '<td><b>Kaardimakse: </b>' . $value['card_payment'] .'&euro;</td>';
			echo '<td><b>Sularaha: </b>' . $value['cash_payment'] .'&euro;</td>';
			echo '<td><b>Summa kokku: </b> ' . $value['total_sum'] . '&euro;</td>';
			echo '</tr>';
		}
}
?>
</table>


<table width='650' border='1'>
	
<?php
$c5 = 1;
if(isset($this->pastWeekResult) == '') {
	
	echo '';
	
} else {
	echo '<h4>Eelmise nädala tulemused</h4>';
	countMessage($this->pastWeekResult);
if (is_array($this->pastWeekResult))
{
	foreach($this->pastWeekResult as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c5++ . '</td>';
		echo '<td>' . etDate($v['date']).', '. $v['time'].'</td>';
		echo '<td>' . $v['type'] . '</td>';
		echo '<td>' . $v['price'] . '&euro;</td>';
		echo '</tr>';
		
	}
}

foreach($this->pastWeekSumResult as $key => $value) {
			
			echo '<tr>';
			echo '<td><b>Kuupäev: </b>' . etDate($value['sum_date']) .'</td>';
			echo '<td><b>Kaardimakse: </b>' . $value['card_payment'] .'&euro;</td>';
			echo '<td><b>Sularaha: </b>' . $value['cash_payment'] .'&euro;</td>';
			echo '<td><b>Summa kokku: </b> ' . $value['total_sum'] . '&euro;</td>';
			echo '</tr>';
		}
}
?>
</table>
<table width='650' border='1'>
	
<?php
$c6 = 1;
if(isset($this->thisMonthResult) == '') {
	
	echo '';
	
} else {
	echo '<h4>Jooksev kuu</h4>';
	countMessage($this->thisMonthResult);
if (is_array($this->thisMonthResult))
{
	foreach($this->thisMonthResult as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c6++ . '</td>';
		echo '<td>' . etDate($v['date']).', '. $v['time'].'</td>';
		echo '<td>' . $v['type'] . '</td>';
		echo '<td>' . $v['price'] . '&euro;</td>';
		echo '</tr>';
		
	}
}
foreach($this->thisMonthSumResult as $key => $value) {
			
			echo '<tr>';
			echo '<td><b>Kuupäev: </b>' . etDate($value['sum_date']) .'</td>';
			echo '<td><b>Kaardimakse: </b>' . $value['card_payment'] .'&euro;</td>';
			echo '<td><b>Sularaha: </b>' . $value['cash_payment'] .'&euro;</td>';
			echo '<td><b>Summa kokku: </b> ' . $value['total_sum'] . '&euro;</td>';
			echo '</tr>';
		}

}
?>
</table>

<table width='650' border='1'>
	
<?php
$c7 = 1;
if(isset($this->pastMonthResult) == '') {
	
	echo '';
	
} else {
	echo '<h4>Eelmise kuu</h4>';
	countMessage($this->pastMonthResult);
if (is_array($this->pastMonthResult))
{
	foreach($this->pastMonthResult as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c7++ . '</td>';
		echo '<td>' . etDate($v['date']).', '. $v['time'].'</td>';
		echo '<td>' . $v['type'] . '</td>';
		echo '<td>' . $v['price'] . '&euro;</td>';
		echo '</tr>';
		
	}
}

foreach($this->pastMonthSumResult as $key => $value) {
			
			echo '<tr>';
			echo '<td><b>Kuupäev: </b>' . etDate($value['sum_date']) .'</td>';
			echo '<td><b>Kaardimakse: </b>' . $value['card_payment'] .'&euro;</td>';
			echo '<td><b>Sularaha: </b>' . $value['cash_payment'] .'&euro;</td>';
			echo '<td><b>Summa kokku: </b> ' . $value['total_sum'] . '&euro;</td>';
			echo '</tr>';
		}

}
?>
</table>




