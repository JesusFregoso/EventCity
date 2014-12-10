<?php 

require "../config.php";

require ROOT."/helpers.php";
require ROOT."/framework/mysqlpdo.php";
require ROOT."/framework/Request.php";
require ROOT."/framework/Form.php";

$request = new Request($_GET['url']);
$request->execute();