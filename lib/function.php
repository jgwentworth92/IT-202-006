<?php
require_once(__dir__."/db.php");
//TODO 1: require db.php

//require safer_echo.php
require(__DIR__ . "/safer_echo.php");
require(__DIR__ . "/sanitizers.php");

//TODO 3: User helpers
require(__DIR__ . "/user_helpers.php");

//TODO 4: Flash Message Helpers
function flash($msg =" ",$color="info")
{
    $message=["text"=> $msg, "color"=> $color];
if (isset($_SESSION['flash']))
{
array_push($_SESSION['flash'],$message);
}
else{ 
    $_SESSION['flash']=array();
    array_push($_SESSION['flash'],$message);

}

}

function getMessages()
{
    if (isset($_SESSION['flash']))
    {
        $flashes=$_SESSION['flash'];
        $_SESSION['flash']=array();
        return $flashes;
    }
    return array();

}

?>