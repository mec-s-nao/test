<?php
require_once("../config.php");
require_once("../function.php");
//セッションを開始
session_start();

//DB接続
$con = db_connect();
if($con === false){
	exit();
}
?>