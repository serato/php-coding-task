<?php
namespace phpcodingtask\tasks;

require(__DIR__ . '/../vendor/autoload.php');

use Orm\DownloadLog;

$curPath = "/task1/task1.php";
$title = "Task 1";

$downloadLog = DownloadLog::create();

// get the function results
$pageContent = $downloadLog->displayTaskOneAnwser(1000, 2000);

// get the file source
$filePath = "File is located at:" . __DIR__ . "/../orm/DownloadLog.php" . "<br/>";
$srcContent = $filePath . nl2br(file_get_contents("../orm/DownloadLog.php"));

?>

<?php require(__DIR__ . "/../index.php");?>
