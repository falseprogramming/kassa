<h2>Tooted</h2>

<h4>Lisa tooteid</h4>
<form name='addProduct' id='addProduct' method='post' action='<?php echo URL?>product/addProduct'>
	<label for='productName'>Toote nimi:</label>
		<input type='text' id='productName' class='styledForm' name='name'><br>
			<input type='submit' value='Lisa toode' class='styledSubmit' id='addProduct'>
</form>

<hr>
<table width='500' border='1'>
	<th>ID</th>
	<th>Nimi:</th>
	<th>Kustuta</th>
	<?php
	
		foreach($this->listProductsVI as $k => $v) {
			echo '<tr>';
			echo '<td>' . $v['id'] . '</td>';
			echo '<td>' . $v['name'] . '</td>';
		echo '<td>' . '<a href="'.URL.'product/delete/'.$v['id'].'" class="rColor delete">Kustuta</a>';
			
			echo '</tr>';
			
		}
	
	?>
	
</table>
