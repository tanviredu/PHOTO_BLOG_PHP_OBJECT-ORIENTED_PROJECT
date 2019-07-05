<?php

//redirect
function redirect_to($location=""){
        if ($location!= NULL){
            header("Location: '$location'");
        }
    }


// redundency function

/**
 * auto load automatiacally ckech the class in the location
 *we convert to lower case cause all the file is in lower case
 *then we add a php extension
 *then check if the file exists
 *then if it is require the file
 *but remember this file will be called from the index.php (its different)
 *so you have to give the url from the index.php
 * you dont have to assign class name cause if php doesnot find any class
 * that is used but not imported the assign it for you
 * we only use one path you could use multiple path for redundency
 */



function __autoload($class_name){
    $class_name = strtolower($class_name); // make the class name lowerclass
    $path = "../includes/{$class_name}.php"; // make it like a file with extension

    if(file_exists($path)){
        require_once($path);
    }else{
        die("The file '$class_name'.php not found");
    }

}




?>