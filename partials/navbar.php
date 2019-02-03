<?php
/**
 * This is a simple navbar partial
 *
 * @param string     $curPath        simple variable to define the active tab
 */
?>

<ul>
    <li><a <?= empty($curPath) ? 'class="active"' : '';?> href="/">Home</a></li>
    <li><a <?= !empty($curPath) && $curPath == '/task1/task1.php' ? 'class="active"' : '';?> href="/task1/task1.php">Task 1</a></li>
    <li><a <?= !empty($curPath) && $curPath == '/task1/task1-2.php' ? 'class="active"' : '';?> href="/task1/task1-2.php">Task 1-2</a></li>
    <li><a <?= !empty($curPath) && $curPath == '/task2/task2.php' ? 'class="active"' : '';?> href="/task2/task2.php">Task 2</a></li>
    <li style="float:right"><a target="_blank" href="https://github.com/yue-l/php-coding-task">Assignment Repository</a></li>
</ul>
