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

$user = User::find_by_id(1);


//foreach($users as $user){
    echo "User :". $user->username ."</br>";
    echo "Name :". $user->full_name() ."</br>";
//}


$user1 = User::authenticate('tanvir123','1122');
echo "User :". $user1->username ."</br>";
echo "Name :". $user1->full_name() ."</br>";

?>