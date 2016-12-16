<?php 
require_once 'app/settings/init.php';
require_once 'app/bootstrap.php';

require_once 'app/core/controller.php';
require_once 'app/core/database.php';
require_once 'app/core/model.php';

require_once 'app/Controllers/errorhandle.php';
require_once 'app/Models/User.php';
require_once 'app/Models/Training_Session.php';
require_once 'app/Models/Training_Player.php';
require_once 'app/Models/Training_Excercise.php';
require_once 'app/Models/Training_Coach.php';
require_once 'app/Models/Report_Player.php';
require_once 'app/Models/Report.php';
require_once 'app/Models/Player.php';
require_once 'app/Models/Exercise.php';
require_once 'app/Models/Coach.php';
require_once 'app/Models/Attribute.php';


session_start();

$bootstrap = new Bootstrap();
$bootstrap->Init();
 ?>