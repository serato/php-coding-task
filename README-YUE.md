# PHP Coding Tasks at Serato

### Improvement
This project means to test candidate PHP skills. I created a little DevOps environment for me to test out some functions. The project is running under Docker. I also applied Composer's autoload mechanism so that I can comply with PSR-4 standards. Save huge time in writing require/include calls when importing PHP classes. As for the frontend pages, I only applied basic PHP to run as template engine.

### Deployment Manual
The deployment work is primarily done via terminal. Below tools are required:

- Docker
- Composer

WARNING: docker-compose.yml requires attention as the contain will use port 8081. If you need to use another port, please make change to do so.

About Docker image installation: I used a official maintained image <b>php:7.2-apache</b> (https://hub.docker.com/_/php/). If docker does not have the image, it will try to install the image while bringing up the container. The image will take ~366MB of computer space, and this image can be removed after container is down.

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

5. Open up a browser, enter localhost:8081 by the default

6. Stop container, then it optional to delete php:7.2-apache by issuing commands:
```
Ctrl + c //use keystroke to stop container
docker image ls //display all images installed under Docker
Look up the image id for php:7.2-apache
docker image rm -f $IMAGE_ID  
```

### some issue notes in progress (shall be removed after)
- \[x] The deployment will be done via Docker. Will move codebase
- \[x] implementation is done in PHP 7.2
- \[x] suggest orm classes namespace may cause confusion; updated with full namespace path
- \[x] Task 1
- \[x] Task 1-2
- \[x] Questions 1
- \[x] Task 2

### Task 1

#### Questions
1. What does the `final` keyword mean the [DownloadLog](orm/DownloadLog.php) model? What are the implications in removing the `final` declaration?

    In the [DownloadLog](orm/DownloadLog.php), the keyword `final` indicates that no classes can inherit from [DownloadLog](orm/DownloadLog.php). Removing the keyword `final` implies that there are subclasses of [DownloadLog](orm/DownloadLog.php), and the subclasses may have different behaviors.

2. The current of implementation of [DownloadLog](orm/DownloadLog.php) contains a fatal error. What is it, and how would it be resolved?

    The error is
    > Class Orm\DownloadLog contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Orm\ActiveRecordInterface::isModified)

    The resolution:

    Define the scope of Orm\ActiveRecordInterface::isModified. If all subclasses of [ActiveRecord](orm/ActiveRecord.php) share the same isModified method, then implement the method within [ActiveRecord](orm/ActiveRecord.php). If isModified is required for [DownloadLog](orm/DownloadLog.php), then implement the method in [DownloadLog](orm/DownloadLog.php).

### Task 2
Task 2 draws a skeleton structure of controller. This task takes few assumptions as the controller usually acts as part of middleware in the web project. I think more functions need to be added into the controller class in order to make it functional; however, in this task, I mainly focus on the identified requirements. I have some difficulty to convert this task into a mock test as I did for task 1; I completed the class relations and indicated what needs to be shown in this task.

- \[x] Functionality to return an HTML response body along with any valid HTTP response codes and/or response headers.
- \[x] Functionality to return a JSON response body along with any valid HTTP response codes and/or response headers.
- \[x] Generic functionality to validate input parameters for a PUT or POST request.
