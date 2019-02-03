<?php

namespace Orm\providers;

/**
 * Follows provider pattern, and look for specified attributes
 */
class TaskTwoDataProvider {

    /**
    * Generate a set of data in prefined format
    *
    * @method formatData
    * @param  request         $request   [description]
    * @param  array           $namedDataArray a designed array target in the request example ['namedArray' => ['paramOne', 'paramTwo', 'paramThree']]
    *
    * @return  array          A list of array in json_format
    */
    public function formatData($request, $namedDataArray)
    {
        $key = key($namedDataArray);
        // mockup code to find the lookup array of attributes in the request
        // assume all attributes are search under the same array
        $result = [];
        $targetArrayName = $namedDataArray[$key];

        foreach ($namedDataArray as $tempEntry) {
            $result[$tempEntry] = $request[$targetArrayName][$tempEntry];
        }

        return $result;
    }
}
