<?php
require_once 'classes/DB.php';

//echo '<pre>', print_r(DB::getInstance()->query('select * from users')->results()),'</pre>';
$users=DB::getInstance()->query('select * from users');

if($users->count()){
	foreach ($users->results() as $user) {
		//print_r($user);
		echo $user->name."<br>";
	}
}
