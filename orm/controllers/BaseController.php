<?php

namespace Orm\controllers;

/**
 * Controller is defined as placeholder of the framework controller. This is the controller at framework level
 */
class BaseController {

    // add more validators
    use InputValidator;

    /**
     * Coding task 2: validate params on put and post request
     *
     * @method validateParams
     * @param  array         $params
     * @return bool                true if all passed; false otherwise
     */
    public function validateParams($attributes)
    {
        $this->validateNonWordFields($attributes);
    }
    // assume more basic settings and functions to be implemented

    /**
     * base controller render method for generating HTML content of a web page.
     * @param view                      $view php page from templates/views
     * @param array                     $params parameters to be passed into the view.
     *
     * @return html                     returns string in HTML format
     */
    public function render ($view, $params = [] ) : string
    {
        $htmlContent = "";
        // omitted code for concat html content
        return $htmlContent;
    }
}

/**
 * Input must not be null
 * @var [type]
 */
trait InputValidator {

    /**
     * validate if array of fields contains non-numeric values
     *
     * @method validateFieldsNumeric
     * @param  array                     $fields an array of fields
     * @throws Exception                 custom defined exception
     */
    function validateNonWordFields($fields) : void
    {
        // non word matches
        $pattern = "[\W]+";
        foreach($fields as $tempField) {
            if(preg_match($pattern, $tempField)) {
                throw new \Exception("An exception thrown. The variable: <strong>" . array_search($tempField, $fields) .  "</strong> must be alphabetical letters."  . " Found: <strong>" . $tempField . "</strong>");
            }
        }
    }



}
