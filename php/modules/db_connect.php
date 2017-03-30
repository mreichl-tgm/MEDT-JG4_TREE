<?php
$host = "projekte.tgm.ac.at";
$username = "db4yhit_s10";
$passwd = "aeWa7foo";
$dbname = "db4yhit_s10";

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname", $username, $passwd);
} catch (PDOException $e) {
    echo $e->getMessage();
}