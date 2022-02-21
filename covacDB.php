<?php

$db = new PDO("mysql:host=covac-database.cr30zu6nndkq.ap-northeast-2.rds.amazonaws.com;
port=3306;dbname=covac", "redo", "memento!");

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
