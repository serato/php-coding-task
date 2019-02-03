<?php

namespace Orm;

use Orm\ActiveRecord;

/**
 * DownloadLog is a record of downloading file by a user.
 *
 */
final class DownloadLog extends ActiveRecord
{
    // use trait
    use Validators;

    /* @var int */
    private $fileId;

    /* @var int */
    private $userId;

    /**
     * Create a DownloadLog object
     *
     * @method create
     * @return DownloadLog                new DownloadLog instance
     */
    public static function create() :DownloadLog
    {
        return new DownloadLog();
    }

    /**
     * fileId setter, $fileId has no identifier set, so that later I can reuse the method for Task 1-2 tests
     *
     * @method setFileId
     * @param  int                        $fileId the file id to be set
     */
    public function setFileId($fileId) :DownloadLog
    {
        $this->fileId = $fileId;
        $this->isModified = true;
        return $this;
    }

    /**
     * userId setter, $userId has no identifier set, so that later I can reuse the method for Task 1-2 tests
     *
     * @method setUserId
     * @param  int                        $userId user id to be set
     */
    public function setUserId($userId) :DownloadLog
    {
        $this->userId = $userId;
        $this->isModified = true;
        return $this;
    }

    /**
     * userId getter
     *
     * @method getUserId
     * @return int                        the userId set
     */
    public function getUserId() :int
    {
        return $this->userId;
    }

    /**
     * fileId getter
     *
     * @method getFileId
     * @return int                        the file Id
     */
    public function getFileId() :int
    {
        return $this->fileId;
    }

    /**
     * isModifed getter
     *
     * @method isModified
     * @return boolean                    true if record is modified; otherwise, false
     */
    public function isModified() :bool
    {
        return $this->isModified;
    }

    /**
     * class name getter
     *
     * @method getName
     * @return string                     returns the class name without predefined namespace
     */
    public function getName() :string
    {
        // remove class path
        $fullyQualifiedName = explode('\\', get_class($this));

        // return the last element
        return array_pop($fullyQualifiedName);
    }

    /**
     * Task 1-1 display console message according to task given.
     *
     * @method displayTaskOneAnwser
     * @param int                         fileId
     * @param int                         UserId
     * @return string                     a text block of Task 1-1 answer.
     */
    public function displayTaskOneAnwser($fileId, $userId) : string
    {
        $result = '';
        $downloadLog = DownloadLog::create();
        $result .= ($downloadLog->isModified() ? 'DownloadLog is modified' : 'DownloadLog is not modified') . "<br/>";
        $downloadLog->setFileId($fileId)->setUserId($userId);
        $result .= ($downloadLog->isModified() ? 'DownloadLog is modified' : 'DownloadLog is not modified') . "<br/>";
        $result .= ("UserId is: " . $downloadLog->getUserId()) .  "<br/>";
        $result .= $downloadLog->destory($downloadLog);

        return $result;
    }

    /**
     * Task 1-2 display console message accoding to the verification of $_POST data
     *
     * @method displayTaskOneDotTwoAnwser
     * @param array                       Post reuqest which is generated via a form from task1-2
     * @return string                     Successful on success; otherwise, an exception message
     */
    public function displayTaskOneDotTwoAnwser($request) : string
    {
        $result = "Successful";
        try {
            $this->validateFieldsNumeric($request);
            $this->setFileId($request['fileId'])->setUserId($request['userId']);
        } catch (\Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    /**
     * helper method for unsetting variable and free memory.
     *
     * @method destory
     * @param  object                    $obj the DownloadLog object be to destoryed
     * @return void
     */
    private function destory(object $obj) : string
    {
        $temp = ("Destorying " . $obj->getName()) . "<br/>";
        unset($obj);
        return $temp;
    }
}

/**
 * validate various purposes
 */
trait Validators
{
    /**
     * validate if array of fields contains non-numeric values
     *
     * @method validateFieldsNumeric
     * @param  array                     $fields an array of fields ($_POST).
     * @see
     * @throws Exception                 custom defined exception
     */
    function validateFieldsNumeric($fields)
    {
        foreach($fields as $tempField) {
            if(!is_numeric($tempField)) {
                throw new \Exception("An exception thrown. The variable: <strong>" . array_search($tempField, $fields) .  "</strong> must be declared in number."  . " Found: <strong>" . $tempField . "</strong>");
            }
        }
    }
}
