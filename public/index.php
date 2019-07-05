<?php
require_once('../includes/functions.php');
require_once('../includes/database.php');
require_once('../includes/user.php');
if(isset($databse)){
    echo 'true';
}


$users = User::find_all();


foreach($users as $user){
    echo "User :". $user->username ."</br>";
    echo "Name :". $user->full_name() ."</br>";
}

?>