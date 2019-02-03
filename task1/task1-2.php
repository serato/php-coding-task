<?php
namespace phpcodingtask\tasks;

require(__DIR__ . '/../vendor/autoload.php');

use Orm\DownloadLog;

$curPath = "/task1/task1-2.php";
$title = "Task 1-2";


if (!empty($_POST)) {
    $downloadLog = DownloadLog::create();
    $result = $downloadLog->displayTaskOneDotTwoAnwser($_POST);
}
?>

<?php require(__DIR__ . "/../index.php");?>

<em>
    Create a `trait` which validates that a value is numeric. Add this `trait` to DownloadLog(orm/DownloadLog.php) and use it to validate that `user_id` and `file_id` values are numeric. If they are not, throw an exception.
</em>
<div class="form-area">
    <?php if(!empty($_POST)): ?>
        <span>Entered File ID: <?=$_POST['fileId']?></span>
        <span>Entered User ID: <?=$_POST['userId']?></span>
        <br/>
        <span>Result: <?=$result;?></span>
        <br/>
        <br/>
        <br/>
    <?php endif; ?>
    <form action="/task1/task1-2.php" method="post">
        UserId: <input name="userId"><br/>
        FileId: <input name="fileId"><br/>
        <input type="submit" value="Submit">
    </form>
</div>
