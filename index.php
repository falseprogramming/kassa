<?php

require 'lib/jream/autoload.php';
require 'lib/jream/hash.php';
   new \jream\Autoload('lib/jream');
	   jream\Registry::set('db',$db);
require 'system/config/config.php';


$bootstrap = new \jream\mvc\Bootstrap();

$bootstrap->setPathRoot(getcwd());

$bootstrap->setControllerDefault('index');

//$bootstrap->setPathController('');

$bootstrap->init();
