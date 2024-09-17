<?php
require_once "classes/databases/MYSQL.php";
require_once "classes/Validations/Validator.php";
require_once "classes/Sessions.php";
require_once "classes/Request.php";
require_once "classes/UploadFiles.php";
require_once "classes/Strings.php";

use Classes\Databases\MYSQL;
use classes\Validations\Validator;
use Classes\Sessions;
use Classes\Request;
use classes\UploadFiles;
use classes\Strings;

$db = new MYSQL("localhost","db_blog","root","");
$db->Connect();
$valid = new Validator();
$Session = new Sessions();
$req = new Request();
$UploadImage = new UploadFiles();
$Str = new Strings();