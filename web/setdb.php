<?php
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$username = $url["user"];
	$password = $url["pass"];
	$dbname = substr($url["path"], 1);

	$db = new PDO("mysql:dbname=$dbname;host=$server", $username, $password);

	$query = $db->prepare('create table user (userid int, username varchar(255), email varchar(255), first-name varchar(255), last-name varchar(255), pebble-id varchar(255)');
	$query->execute();

	$insert = $db->prepare('insert into user (id, username, email, first-name, last-name, pebble-id) values (1, greenjm, greenjm_rose-hulman.edu, Josh, Green, qwerty');
	$insert->execute();

	$select = $db->prepare('select * from user');
	$select->execute();

	$rowCount = $select->rowCount();

	echo "<h1>$rowCount</h1>";
?>