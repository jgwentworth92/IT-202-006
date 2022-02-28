<?php
require_once(__dir__."/db.php");
//TODO 1: require db.php
$BASE_PATH = '/project/';
//require safer_echo.php
require(__DIR__ . "/safer_echo.php");
require(__DIR__ . "/sanitizers.php");

//TODO 3: User helpers
require(__DIR__ . "/user_helpers.php");

//TODO 4: Flash Message Helpers
require(__DIR__ . "/flash_messages.php");

?>