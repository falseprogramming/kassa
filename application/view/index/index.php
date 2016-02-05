<?php 
if (!empty($this->sale)) {
	$d = date('d-m-Y');
	echo '<div class="style11">';
	echo '<b>Tänane päev on: </b>'. etDate($d).'<div class="lBreak"></div>';
	echo '<b>Uus müük</b><div class="lBreak"></div>';
	echo '</div>';
} 
?>
	
		<form name='insertSale' id='insertSale' method='post' action='<?php echo URL?>index/add'>
<label for='chooseProduct'>Vali toode</label>
	<select id='chooseProduct' name='type'>
		<?php
			foreach($this->productListVI as $k => $v) {
				
				echo '<option value="'.$v['name'].'">'.$v['name'].'</option>';
			}
		
		?>

	</select>
	<label for='price'>Sisesta hind:</label><input type='text' id='price' class='styledForm' size='10' name='price'>&euro;
	<br>
	<br>
<div class="lBreak"></div>
	<label for='method'>Makseviis:</label>
	<select name='method' id='method'>
		<option value='cash'>Sulas</option>
		<option value='card'>Kaardiga</option>
	</select>
	<input type='submit' class='styledSubmit' value='Sisesta müük'>
</form>

<br>
<div id='salesContainer'>
	<img src="<?php echo URL?>assets/img/line.jpg" width="425" height="2"></span> 
<table width='400' border='0' id='saleTbl'>

	<form method='post' id='insertStat' action='<?php echo URL?>stats/insert'>
<?php
	$c = 1;
	$cash = array();
		$card = array();
		$totalPrice = array();
		if(empty($this->sale)) {
			echo '<h2>Müügid puuduvad!</h2>';
			return false;
		}
	foreach($this->sale as $k => $v) {
		$price = $v['price'];
		$r = str_replace(',','.',$price);	
		$fNumber = number_format($r, 2, '.', '');
		$method = $v['method'];
			if($method == 'card') {
				
				$method= 'Kaardiga';
			} else if($method == 'cash') {
				$method = 'Sulas';
			}
		
		echo '<tr>';
		echo '<td class="style7">' . $c++ . '.</td>';
		echo '<td><input type="text" size="10" class="daySales style9" readonly name="type[]" value="'.$v['type'].'"></td>';
		echo '<td><input type="text" size="10" class="daySales style9" readonly name="time[]" value="'.$v['time'].'"></td>';
		echo '<td><input type="text" size="10" class="daySales style9" readonly name="price[]" value="'.$fNumber.' &euro;"></td>';
		echo '<td><input type="text" size="7" class="daySales style9" readonly name="method[]" value="'.$method.'"></td>';
		echo '<td><a href="'.URL.'sale/deleteSaleItem/'.$v['id'].'" class="delete rColor style9" title="Kustuta müük <'.$v['type'].'>">X</a>';
		$totalPrice[] = $v['price'];
		
			if($v['method'] == 'cash') {
				
				$cash[] =  $v['price'];
			}
			if($v['method'] == 'card') {
				
				$card[] = $v['price'];
			}
		
		}
	
?>
</table>
<table width='500'  style='float:left;margin-left: 247px;'  border='0' id='totalSumTbl'>

	<tr>
		<td>
			<span class='style5'><strong>Kaardimaksed:</strong></span>
			<input type="text" 
	class="daySales style1" name="card_payment" readonly value='<?php echo array_sum($card);?> &euro;'</td>
	</tr>
	<tr>
		<td>
			<span class='style5'><strong>Sularaha</strong></span>
				<input type='text' name='cash_payment' class='daySales style1' readonly value='<?php echo array_sum($cash); ?> &euro;'>
			</td>
		</tr>
		
	<tr>
		<td>
			<strong><span class='style5'>Kokku:</span></b>
		<input type="text" name="total_sum" readonly 
	class="daySales style10" value='<?php echo array_sum($totalPrice);?> &euro;'></td>
	
	</tr>
	
	
</table>
<img src="<?php echo URL?>assets/img/line.jpg" width="425" height="2"></span> 
<br>
<input type="submit" id='eDateSubmit' class='style1' value="Lõpeta päev">
		
		<img src="<?php echo URL?>assets/img/line.jpg" width="425" height="2"></span> 
	<br>
</form>
</div>
