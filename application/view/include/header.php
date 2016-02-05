<!doctype html>
<html>
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<meta name='author' content='M-M T'>
<title><?php echo PROJECT_NAME . ' | '. $this->title;?></title>
 <link rel="stylesheet" href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/ui-lightness/jquery-ui.css' />
 <link href='<?php echo URL?>assets/css/style.css' rel='stylesheet' type='text/css'>
    <script src='http://code.jquery.com/jquery-1.8.2.min.js'></script>
    <script src='http://code.jquery.com/ui/1.9.0/jquery-ui.min.js'></script>
	<script src='<?php echo URL;?>assets/js/script.js'></script>
</head>

<body>
	<noscript>
		<div style='background: #ccc; width:400px; padding: 5px;'>
		<h4>Teie lehitsejas on Javascript välja lülitatud!</h4>
		<p>Teil on võimalik rakendust küll kasutada , aga soovitatavalt lülitada<br>
			Javascript sisse.</p>
		</div>
	</noscript>
	<div id='container'>
<p><h1>Kassasüsteem</h1>
</p>
<p class="p_style">Kauplus KASSA online kassas&uuml;steem</p>
<?php if(Session::fetch('type')== admin):?>
<b>Kasutaja:</b> <?php echo '<a href="'.URL.'user/edit/'.Session::fetch('id').'" style="text-decoration:none;">'.ucfirst(Session::fetch('username')).'</a>';?> |
<?php else:?>
	<b>Kasutaja:</b> <?php echo ucfirst(Session::fetch('username'));?> |

	<?php endif;?>
<span><b>Päev: </b><?php
echo date("d-m-Y");
		$time = date('H:i',time());	
	echo ' |<b> Kell:</b> '. $time;	
?></span>
<span class="style1"><br>
	
	
  <img src="<?php echo URL?>assets/img/line.jpg" width="425" height="2"></span> </p>

<p class="p_style">
	<a href='<?php echo URL?>'>KASSA</a> | 
	<a href='<?php echo URL?>stats'>VAATA ARUANDEID</a> | 
	<?php if(Session::fetch('type')== 'admin'):?>
	<a href='<?php echo URL?>settings'>SEADED</a> |
	<?php endif;?>
	<a href='<?php echo URL?>index/logout' class='rColor' title='Logi välja'>Logi välja</a><br><br>
	 <img src="<?php echo URL?>assets/img/line.jpg" width="425" height="2"></span> </p>
