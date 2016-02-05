<h2>Toote põhine päring</h2>
<table width='300' border='1'>
<form name='pStatsForm' method='get' action='<?php echo URL?>stats/getProductStats'>
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
		<input type='text' class='datepicker styledForm'  id='stat1' name='date'>
		</label>
		</td>
		</tr>
		<tr>
		<td><label for='sDate'><b>Algus:</b></label><input type='text' id='sDate' class='datepicker styledForm' size='9' name='startDate'>
		<label for='eDate'><b>Lõpp:</b></label><input type='text' id='eDate' class='datepicker styledForm' size='9' name='endDate'></td>
		</tr>

		
		<tr>
		<td><label for='todayStat'><b>Täna</b></label><input id='todayStat' type='checkbox' name='today' value="<?php echo date("Y-m-d",  strtotime("today"));?> ">
		<label for='yesterdayStat'><b>Eile</b></label><input id='yesterdayStat' type='checkbox' name='yesterday' value="<?php echo date("Y-m-d",  strtotime("yesterday"));?>"></td>
		</tr>
		<tr>
		<td><label for='thisWeek'><b>Jooksev nädal</b></label>
			
		<input id='thisWeek' type='checkbox' name='thisWeek' value="<?php echo date('Y-m-d H:i:s',time()-(7*86400));?>">
		
		<input id='thisWeek2' type='checkbox' style='display:none;' name='thisWeek2' value="<?php echo date("Y-m-d",  strtotime("this sunday"));?>">
			
		<label for='pastWeek'><b>Eelmine nädal</b></label>
		<input id='pastWeek' type='checkbox' value="<?php echo date('Y-m-d',strtotime('last monday'));?>" name='pastWeek'>

				<input id='pastWeek2' type='checkbox' style='display:none;' value="<?php echo date('Y-m-d',strtotime('last sunday'));?>" name='pastWeek2'></td>

		</tr>
		<tr>
		<td><label for='thisMonth'><b>Jooksev kuu</b></label><input id='thisMonth' type='checkbox' name='thisMonth' value="<?php echo date("Y-m",  strtotime("this month"));?>">
		<label for='pastMonth'><b>Eelmine kuu</b></label><input id='pastMonth' type='checkbox' name='pastMonth' value="<?php echo date("Y-m",  strtotime("-1 month"));?>"></td>
		</tr>
		<tr>
		<td><input type='submit' class='styledSubmit' value='Päring'></td>
	</tr>
</form>
</table>