<?php
require_once 'classes/DB.php';

$users=DB::getInstance()->query('select * from users');

if($users->count()){
	foreach ($users->results() as $user) {
		echo $user->name."<br>";
	}
}
