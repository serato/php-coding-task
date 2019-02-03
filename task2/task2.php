<?php
namespace phpcodingtask\tasks;

require(__DIR__ . '/../vendor/autoload.php');

$curPath = "/task2/task2.php";
$title = "Task 2";

$bathController = "BathController is located at:" . __DIR__ . "/../orm/controllers/BaseController.php" . "<br/>";
$taskTwoController = "TaskTwoController is located at:" . __DIR__ . "/../orm/controllers/TaskTwoController.php" . "<br/>";
$httpResponse = "ModifiedResponse is located at:" . __DIR__ . "/../orm/http/ModifiedResponse.php" . "<br/>";
$task2Provider = "TaskTwoDataProvider is located at:" . __DIR__ . "/../orm/providers/TaskTwoDataProvider.php" . "<br/>";

// $srcContent = $filePath . nl2br(file_get_contents("../orm/DownloadLog.php"));
$pageContent = [
    [$bathController, $filePath . nl2br(file_get_contents("../orm/controllers/BaseController.php"))],
    [$taskTwoController, $filePath . nl2br(file_get_contents("../orm/controllers/TaskTwoController.php"))],
    [$httpResponse, $filePath . nl2br(file_get_contents("../orm/http/ModifiedResponse.php"))],
    [$task2Provider, $filePath . nl2br(file_get_contents("../orm/providers/TaskTwoDataProvider.php"))]
];
?>

<?php require(__DIR__ . "/../index.php");?>
<!-- <!?=var_dump([$_SERVER, $_REQUEST, json_encode($test)]);?> -->
