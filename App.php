<?php
require_once "Authors/classes/databases/MYSQL.php";
require_once "Authors/classes/Validations/Validator.php";
require_once "Authors/classes/Sessions.php";
require_once "Authors/classes/Request.php";
require_once "Authors/classes/UploadFiles.php";
require_once "Authors/classes/Strings.php";

use classes\databases\MYSQL;
use classes\Validations\Validator;
use classes\Sessions;
use classes\Request;
use classes\UploadFiles;
use classes\Strings;

$db = new MYSQL("localhost", "db_blog", "root", "");
$db->Connect();
$valid = new Validator();
$Session = new Sessions();
$req = new Request();
$UploadImage = new UploadFiles();
$Str = new Strings();
