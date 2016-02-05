
	<?php
			
$arr = array();
$countResult = array();
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
<div id='dialog' title='Toote arendite päring'>
<table width='300' border='1'>

	<form name='arendid' method='get' action='<?php echo URL?>stats/getProductStats'>
			<tr>
<td><select name='pStats[]' multiple="multiple" style="width: 200px; height: auto;">
<?php
foreach($this->pStatsVi as $k => $v) {
	
	echo '<option selected="selected" value="'.$v['name'].'">'.$v['name'].'</option>';
	
}
?>
</select></td>
</tr>
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
		<label for='pastWeek'><b>Eelmine nädal</b></label><input id='pastWeek' 
		type='checkbox' value="<?php echo strtotime('last monday');?>" <?php if(isset($_GET['pastWeek'])) echo 'checked="checked"';?> name='pastWeek'>
		<input id='pastWeek2' type='checkbox' style='display:none;' <?php if(isset($_GET['pastWeek2'])) echo 'checked="checked"';?> value="<?php echo date('Y-m-d',strtotime('last sunday'));?>" name='pastWeek2'>
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
	
<table width='400' border='1'>

<?php
$c0 = 1;
if(isset($this->productDateResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Kuupäeva tulemused</h4>';
if(is_array($this->productDateResult)) {
foreach($this->productDateResult as $k => $v) {
	$d = $v['date'];
	$arr[] =   $v['type'] . '<br>';
}
$arrCount = array_count_values($arr);
	foreach($arrCount as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c0++ . '</td>';
		echo '<td>' . $k . '</td>';
		echo '<td>' . $v . ' tk.</td>';
		echo '</tr>';
		$countResult[] = $c0;
	}
}
countMessage($countResult);
}
?>
</table>


<table width='400' border='1'>

<?php
$c1 = 1;
if(isset($this->productSandEdateResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Kuupäeva vahemiku tulemused</h4>';
if(is_array($this->productSandEdateResult)) {
foreach($this->productSandEdateResult as $k => $v) {
	$d = $v['date'];
	$arr[] =   $v['type'] . '<br>';
}
$arrCount = array_count_values($arr);
	foreach($arrCount as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c1++ . '</td>';
		echo '<td>' . $k . '</td>';
		echo '<td>' . $v . ' tk.</td>';
		echo '</tr>';
		$countResult[] = $c1;
	}
}
countMessage($countResult);
}
?>
</table>


<table width='400' border='1'>
	
<?php
$c2 = 1;
if(isset($this->productTodayResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Tänasepäeva tulemused</h4>';

if(is_array($this->productTodayResult)) {
foreach($this->productTodayResult as $k => $v) {
	$d = $v['date'];
	$arr[] =   $v['type'] . '<br>';
}
$arrCount = array_count_values($arr);
	foreach($arrCount as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c2++ . '</td>';
		echo '<td>' . $k . '</td>';
		echo '<td>' . $v . ' tk.</td>';
		echo '</tr>';
		$countResult[] = $c2;
	}
}
countMessage($countResult);
}
?>
</table>



<table width='400' border='1'>
	
<?php
$c3 = 1;
if(isset($this->productYesterdayResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Eilse päeva tulemused</h4>';
if(is_array($this->productYesterdayResult)) {
	
foreach($this->productYesterdayResult as $k => $v) {
	$d = $v['date'];
	$arr[] =   $v['type'] . '<br>';
}
$arrCount = array_count_values($arr);
	foreach($arrCount as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c3++ . '</td>';
		echo '<td>' . $k . '</td>';
		echo '<td>' . $v . ' tk.</td>';
		echo '</tr>';
		$countResult[] = $c3;
	}
}
countMessage($countResult);
}
?>
</table>


<table width='400' border='1'>
	
<?php
$c4 = 1;
if(isset($this->productThisWeekResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Jooksva nädala tulemused</h4>';
if(is_array($this->productThisWeekResult)) {
	
foreach($this->productThisWeekResult as $k => $v) {
	$d = $v['date'];
	$arr[] =   $v['type'] . '<br>';
}
$arrCount = array_count_values($arr);
	foreach($arrCount as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c4++ . '</td>';
		echo '<td>' . $k . '</td>';
		echo '<td>' . $v . ' tk.</td>';
		echo '</tr>';
		$countResult[] =  $c4;
	}
}
countMessage($countResult);
}
?>
</table>

<table width='400' border='1'>
	
<?php
$c5 = 1;
if(isset($this->productPastWeekResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Eelmise nädala tulemused</h4>';
if(is_array($this->productPastWeekResult)) {
	
foreach($this->productPastWeekResult as $k => $v) {
	$d = $v['date'];
	$arr[] =   $v['type'] . '<br>';
}
$arrCount = array_count_values($arr);
	foreach($arrCount as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c5++ . '</td>';
		echo '<td>' . $k . '</td>';
		echo '<td>' . $v . ' tk.</td>';
		echo '</tr>';
		$countResult[] = $c5;
	}
}
countMessage($countResult);
}
?>
</table>


<table width='400' border='1'>
	
<?php
$c6 = 1;
if(isset($this->productThisMonthResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Jooksva kuu tulemused</h4>';

if(is_array($this->productThisMonthResult)) {
	
foreach($this->productThisMonthResult as $k => $v) {
	$d = $v['date'];
	$arr[] =   $v['type'] . '<br>';
}

$arrCount = array_count_values($arr);
	foreach($arrCount as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c6++ . '</td>';
		echo '<td>' . $k . '</td>';
		echo '<td>' . $v . ' tk.</td>';
		echo '</tr>';
		
		$countResult[] = $c6;
	}
}
countMessage($countResult);
}
?>
</table>

<table width='400' border='1'>
	
<?php
$c7 = 1;
if(isset($this->productPastMonthResult) == '') {
	
	echo '';
	
} else {
echo '<h4>Eelmise kuu tulemused</h4>';
if(is_array($this->productPastMonthResult)) {
	
foreach($this->productPastMonthResult as $k => $v) {
	$d = $v['date'];
	$arr[] =   $v['type'] . '<br>';
}
$arrCount = array_count_values($arr);
	foreach($arrCount as $k => $v) {
		echo '<tr>';
		echo '<td>' . $c7++ . '</td>';
		echo '<td>' . $k . '</td>';
		echo '<td>' . $v . ' tk.</td>';
		echo '</tr>';
		$countResult[] = $c7;
	}
}
countMessage($countResult);
}
?>
</table>
