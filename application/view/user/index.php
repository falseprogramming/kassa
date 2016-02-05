<h2>Kasutajad</h2>


<div id='userDiv'>
<form name='addUser' id='addUser' method='post' action='<?php echo URL?>user/addUser'>
	<label for='username'>Kasutajanimi:</label>
		<input type='text' id='username' class='styledForm' name='username'><br>
		<label for='password'>Parool:</label>
		<input type='text' id='password' class='styledForm' name='password'><br>
		<label for='type'>Kasutaja tüüp</label><select name='type' class='styledForm' id='type'>
			<option value='admin'>Administraator</option>
			<option value='user'>Kasutaja</option>
		</select><br>
			<input type='submit' class='styledSubmit' value='Lisa kasutaja'>
		
</form>
</div>
<hr>

<table width='400' border='1'>
	<th>ID</th>
	<th>Kasutajanimi</th>
	<th>Kasutaja tüüp</th>
	<th>Muuda</th>
	<th>Kustuta</th>
<?php
	foreach($this->users as $k => $v) {
		$t = $v['type'];
			if($t == 'admin') {
				
				$t = 'Administraator';
			} else if($t == 'user') {
				
				$t = 'Tava kasutaja';
			}
		echo '<tr>';
		echo '<td>' . $v['id'] . '</td>';
		echo '<td>' . $v['username'] . '</td>';
		echo '<td>' . $t . '</td>';
		echo '<td><a href="'.URL.'user/edit/'.$v['id'].'">Muuda</a></td>';
		echo '<td>' . '<a href="'.URL.'user/delete/'.$v['id'].'" class="rColor delete">Kustuta</a>';
		echo '</tr>';
	}
?>
</table>