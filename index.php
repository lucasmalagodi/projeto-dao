<?php 

require_once("config.php");

$sql = new Sql('localhost','teste','root', '');

$user = $sql->select("SELECT * FROM user");

echo json_encode($user)
 ?>