<?php
/**
 * the basic template page of the application. As for all the
 */
?>

<html>
<head>
    <meta charset="utf-8"/>
    <title><?= empty($title) ? "PHP Coding Tasks at Serato" : $title;?></title>
    <link rel="stylesheet" href="/res/css/main.css">
</head>
<body>
    <?php require("partials/navbar.php");?>
    <!-- not closed at this stage. will look for a complete PHP templating system to replace -->
    <div class="container">

        <div>Current Path: <?= $_SERVER['REQUEST_URI'] == "/" ? "/" : $_SERVER['REQUEST_URI'];?></div>
        <br/>
        <!-- task 1 and 2 outputs to be replaced with cms later -->
        <?php if (!empty($pageContent) && !empty($srcContent)): ?>
            <div style="display:inline-block; border:1px solid; width:30%; height:600px; vertical-align: text-top;">
                <h3>Test Results</h3>
                <?=$pageContent;?>
            </div>
            <div style="display:inline-block; border:1px solid; width:60%; height:600px; vertical-align: text-top; overflow: scroll;">
                <h3>File Source</h3>
                <pre><?= $srcContent;?></pre>
            </div>
        <?php elseif (!empty($pageContent)):?>
            <h3>Test Space</h3>
            <p><?=$pageContent;?></p>
        <?php elseif ($_SERVER['REQUEST_URI'] == "/"): ?>
            <ol>
                <li>
                    <b>
                        What does the `final` keyword mean the [DownloadLog](orm/DownloadLog.php) model? What are the implications in removing the `final` declaration?
                    </b>
                    <div>
                        In the [DownloadLog](orm/DownloadLog.php), the keyword `final` indicates that no class can inherit from [DownloadLog](orm/DownloadLog.php). Removing the keyword `final` implies that there are subclasses of [DownloadLog](orm/DownloadLog.php), and the subclasses may have different behaviors.
                    </div>
                </li>
                <li>
                    <b>
                        The current of implementation of [DownloadLog](orm/DownloadLog.php) contains a fatal error. What is it, and how would it be resolved?
                    </b>
                    <div>
                        The <b>fatal error</b> is: <em>Class Orm\DownloadLog contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Orm\ActiveRecordInterface::isModified)</em>
                    </div>
                    <div>
                        The <b>resolution</b> is: <em>Define the scope of Orm\ActiveRecordInterface::isModified. If all subclasses of [ActiveRecord](orm/ActiveRecord.php) share the same isModified method, then implement the method within [ActiveRecord](orm/ActiveRecord.php). If isModified is required for [DownloadLog](orm/DownloadLog.php), then implement the method in [DownloadLog](orm/DownloadLog.php)</em>.
                    </div>
                </li>
            </ol>
        <?php endif; ?>
    <!-- the missing div tag -->
</body>
</html>
