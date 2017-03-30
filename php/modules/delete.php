<?php
$seminar_id = $_GET["a"];
$user_id = $_GET["u"];

include "db_connect.php";

$stmt = $db->prepare("DELETE FROM attendance WHERE userid=:uid and seminarid=:sid");
$stmt->bindParam(":uid", $user_id);
$stmt->bindParam(":sid", $seminar_id);
$stmt->execute();

$db = null;

header('Location: ' . $_SERVER['HTTP_REFERER']);
die();