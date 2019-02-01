# PHP Coding Tasks at Serato

## temporary put skeleton here.

### some issue notes in progress (shall be removed after)
- [ ] The deployment will be done via Docker. Will move codebase
- [ ] implementation is done in PHP 7.2
- [ ] suggest orm classes namespace may cause confusion
- \[x] Task 1

### Task 1

#### Questions
1. What does the `final` keyword mean the [DownloadLog](orm/DownloadLog.php) model? What are the implications in removing the `final` declaration?

    In the [DownloadLog](orm/DownloadLog.php), the keyword `final` indicates that no classes can inherit from [DownloadLog](orm/DownloadLog.php). Removing the keyword `final` implies that there are subclasses of [DownloadLog](orm/DownloadLog.php), and the subclasses may have different behaviors.

2. The current of implementation of [DownloadLog](orm/DownloadLog.php) contains a fatal error. What is it, and how would it be resolved?

    The error is
    > Class Orm\DownloadLog contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Orm\ActiveRecordInterface::isModified)

    The resolution:

    Define the scope of Orm\ActiveRecordInterface::isModified. If all subclasses of [ActiveRecord](orm/ActiveRecord.php) share the same isModified method, then implement the method within [ActiveRecord](orm/ActiveRecord.php). If isModified is required for [DownloadLog](orm/DownloadLog.php), then implement the method in [DownloadLog](orm/DownloadLog.php).
