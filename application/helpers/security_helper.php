<?php
date_default_timezone_set("Asia/Manila");
function locker($length=50)
{
    $result = "";
    $chars = CHAR_SET;
    $charArray = str_split($chars);
    
    for($i = 0; $i < $length; $i++)
    {
	    $randItem = array_rand($charArray);
	    $result .= "".$charArray[$randItem];
    }
    
    return $result;
}

function auth_token($id = 1, $length = 50)
{
    
    // $bytes = random_bytes(ceil($length / 2));
    $bytes = uniqid();
    $random = substr(bin2hex($bytes), 0, $length);
    $auth = (sha1($random. date('y-m-d:h:i:s').$random. date('y-m-d:h:i:s')).':'.sha1(date('y-m-d:h:i:s')).':'.sha1($random)).$id;
    
    return $auth;
}

function password_generator($password,$locker,$length=100){
    $result = "";    
    
    for($i = 0; $i < $length; $i++)
    {	    
	    $result .= "".strrev($password).$locker;
    }
    
    return $result;
}

function check_user_info(){
    if(empty($_SESSION[USER])){
        redirect(base_url().'login');
    }
}
function reset_session(){
    unset($_SESSION[USER]);
}


function unit_permission($condition='', $values=''){
    switch ($condition) {
        case 'admin':
            return true;
            break;
        case 'doctor':
            return  true;
            break;
        case 'accounting':
            return true;
            break;
        case 'medtech':
            return true;
            break;
        default:
            return false;
            break;
    }
}

