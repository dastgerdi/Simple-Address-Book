<?php

require_once('database.php');

$db = new DB;

$addresses = $db->select_addresses();

?>