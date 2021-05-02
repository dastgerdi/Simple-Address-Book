<?php

require_once('database.php');

$db = new DB;

$cities = $db->select_cities();

?>