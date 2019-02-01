<?php

namespace Orm;

use Orm\ActiveRecord;

final class DownloadLog extends ActiveRecord
{
    // user trait
    use NumericValidator;

    /* @var int */
    private $fileId;

    /* @var int */
    private $userId;

    /**
     * Create a DownloadLog object
     * @method create
     * @return DownloadLog [description]
     */
    public static function create() :DownloadLog
    {
        return new DownloadLog();
    }

    /**
     * fileId setter
     * @method setFileId
     * @param  int       $fileId the file id to be set
     */
    public function setFileId(int $fileId) :void
    {
        $this->fileId = $fileId;
        $this->isModified = true;
    }

    /**
     * userId setter
     * @method setUserId
     * @param  int       $userId user id to be set
     */
    public function setUserId(int $userId) :void
    {
        $this->userId = $userId;
        $this->isModified = true;
    }

    /**
     * userId getter
     * @method getUserId
     * @return int       the userId set
     */
    public function getUserId() :int
    {
        return $this->userId;
    }

    /**
     * fileId getter
     * @method getFileId
     * @return int       the file Id
     */
    public function getFileId() :int
    {
        return $this->fileId;
    }

    /**
     * isModifed getter
     * @method isModified
     * @return boolean    true if record is modified; otherwise, false
     */
    public function isModified() :bool
    {
        return $this->isModified;
    }

    /**
     * class name getter
     * @method getName
     * @return string  returns the class name without predefined namespace
     */
    public function getName() :string
    {
        $fullyQualifiedName = explode('\\', get_class($this));

        return array_pop($fullyQualifiedName);
    }
}

/**
 * validate values
 */
trait NumericValidator
{
    /**
     * validate if fields are numeric
     * @method validateFieldsNumeric
     * @param  array                $fields an array of fields
     * @throws Exception            custom defined exception
     */
    function validateFieldsNumeric($fields)
    {
        foreach ($fields as $tempField) {
            if(!is_numeric($tempField)) {
                throw new Exception("The field: " . $tempField .  " is not numeric.");
            }
        }
    }
}
