<?php

include_once 'includes/mic.class.php';
include_once 'includes/database.class.php';
include_once 'includes/user.class.php';
include_once 'includes/Session.class.php';
include_once 'includes/usersession.class.php';

global $__site_config;
$__site_config = file_get_contents($_SERVER['DOCUMENT_ROOT']."/../photogramconfig.json");

session::start();

function get_config($key, $default=null){

    global $__site_config;
    $array = json_decode($__site_config, true);
    if(isset($array[$key])){
        return $array[$key];
    }else{
        return $default;
    }
}

// ----------------------- Template Loading -----------------------

function load_templates($name){
    include $_SERVER['DOCUMENT_ROOT'].get_config('base_path')."_templates/$name.php";
}

// ------------------------- Validate Login --------------------------

// function validate($username,$password){
//     if($username == 'guru' and $password == 'password'){
//         return true;
//     }
//     else{
//         return false;
//     }
// }

// ---------------------------- Signup --------------------------------

// function signup($user,$phone,$email,$pass)
// {
// $conn = database::getconnection();

// $sql = "INSERT INTO `auth` (`username`, `phone`, `email`, `password`, `active`, `block`) VALUES ('$user', '$phone', '$email', '$pass', '1', '0')";

// $error = FALSE;

// if ($conn->query($sql) === TRUE) {
//     $error = false;
// } else {
//     // echo "Error: " . $sql . "<br>" . $conn->error;
//     $error = $conn->error;

// }

// $conn->close();
// return $error;
// }


?>