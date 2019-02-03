# PHP Coding Tasks at Serato

### Improvement
This project means to test candidate PHP skills. I created a little DevOps environment for me to test out some functions. The project is running under Docker. I also applied Composer's autoload mechanism so that I can comply with PSR-4 standards. Save huge time in writing require/include calls when importing PHP classes. As for the frontend pages, I only applied basic PHP to run as template engine.

### Deployment Manual
The deployment work is primarily done via terminal. Below tools are required:

- Docker
- Composer

WARNING: docker-compose.yml requires attention as the contain will use port 8081. If you need to use another port, please make change to do so.

1. Navigate to project root folder.
```
cd php-coding-task
```
2. Get Composer Executable (composer.phar)

    For more details please visit: https://getcomposer.org/doc/00-intro.md

3. Execute composer command
```
./composer.phar dump-autoload
```

4. Start Docker container
```
docker-compose up
```

5. Open up a browser

### some issue notes in progress (shall be removed after)
- \[x] The deployment will be done via Docker. Will move codebase
- \[x] implementation is done in PHP 7.2
- \[x] suggest orm classes namespace may cause confusion; updated with full namespace path
- \[x] Task 1
- \[x] Task 1-2
- \[x] Questions 1

### Task 1

#### Questions
1. What does the `final` keyword mean the [DownloadLog](orm/DownloadLog.php) model? What are the implications in removing the `final` declaration?

    In the [DownloadLog](orm/DownloadLog.php), the keyword `final` indicates that no classes can inherit from [DownloadLog](orm/DownloadLog.php). Removing the keyword `final` implies that there are subclasses of [DownloadLog](orm/DownloadLog.php), and the subclasses may have different behaviors.

2. The current of implementation of [DownloadLog](orm/DownloadLog.php) contains a fatal error. What is it, and how would it be resolved?

    The error is
    > Class Orm\DownloadLog contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Orm\ActiveRecordInterface::isModified)

    The resolution:

    Define the scope of Orm\ActiveRecordInterface::isModified. If all subclasses of [ActiveRecord](orm/ActiveRecord.php) share the same isModified method, then implement the method within [ActiveRecord](orm/ActiveRecord.php). If isModified is required for [DownloadLog](orm/DownloadLog.php), then implement the method in [DownloadLog](orm/DownloadLog.php).
