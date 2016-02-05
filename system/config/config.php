<?php
date_default_timezone_set('Europe/Tallinn');
include 'ET_date.php';
define('URL','http://localhost/kassa/');
define('PROJECT_NAME','Kassa');
require 'system/model/Model.php';
//ini_set('display_errors', 0);
error_reporting(E_ALL ^ E_NOTICE);
define('HASH_GENERAL_KEY', 'somethinghgbhgdg3455');
define('HASH_PASSWORD_KEY', 'randfgjngrnjkg453495');

//echo jream\Hash::create('sha256', 'parool', HASH_PASSWORD_KEY);
require 'system/controller/Controller.php';
require 'system/Session.php';
require 'system/helper/Url.php';

$db = new jream\Database(array(
           'type' => 'mysql',
          'host' => 'localhost',
            'name' => 'kassa',
             'user' => 'root',
            'pass' => ''
       ));