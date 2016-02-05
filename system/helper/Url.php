<?php

function urlActive($u) {
$url = 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];


if (false !== strpos($url,$u)) {
   return true;
}
		
}