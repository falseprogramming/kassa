
<div id='loginContainer'>
<h2>Sisse logimine</h2>

	<form name='login' method='post' action='<?php echo URL?>login/go'>
			<label for='uName'>Kasutaja:</label>
				<input type='text' id='uName' name='username'>
			<label for='pWord'>Parool:</label>
				<input type='text' id='pWord' name='password'>
				<br>
				<input type='submit' value='Sisene'>	
</form>
</div>