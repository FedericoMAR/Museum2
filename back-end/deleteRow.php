<?php
require_once("db.class.php");
DB::$user = 'root';
DB::$password = '';
DB::$dbName = 'museo_it';

$categoryOfDelete = $_GET[""];
$valueToDelete = $_GET["value"];
var_dump($valueToDelete);
var_dump($categoryOfDelete);
DB::query("DELETE * FROM %s WHERE ID LIKE %s", $categoryOfDelete,$valueToDelete);
header('Location: ./livesearch.php');



?>