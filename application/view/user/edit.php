<?php

	foreach($this->editUser as $k => $v) {
		$i = $v['id'];
		$u = $v['username'];
		$p = $v['password'];
		$t = $v['type'];
	}
?>
<h2>Muuda kasutajat</h2>
<div id='userDiv'>
<form name='edit-user' method='post' action='<?php echo URL?>user/editDo/<?php echo $i?>'>
	<label for='username'>Kasutajanimi:</label>
		<input type='text' name='username' id='username' class='styledForm' value='<?php echo $u;?>'><br>
		<label for='password'>Parool:</label>
		
		<input type='text' name='password' class='styledForm' id='password'><br>
		<span class='infoDesc'>Kui Te ei soovi parooli vahetada jätke see väli tühjaks.</span>
		<br>
		<label for='type'>Kasutaja tüüp</label><select id='type' name='type'>
			<option value='admin' <?php if($t == 'admin') echo 'selected="selected"'?>>Administraator</option>
			<option value='user' <?php if($t == 'user') echo 'selected="selected"'?>>Kasutaja</option>
		</select><br>
			<input type='submit' class='styledSubmit' value='Muuda kasutajat'>
</form>
</div>