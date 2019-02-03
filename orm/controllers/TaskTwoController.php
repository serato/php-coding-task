<?php

namespace Orm\controllers;

use Orm\controllers\BaseController;
use Orm\providers\TaskTwoDataProvider;
use Orm\http\ModifiedResponse;

/**
 * This is the highest level controller handles detailed request.
 *
 *
 */
class TaskTwoController extends BaseController
{

    /**
     * functional
     * @method execute
     * @param  request  $request  request from http
     * @param  response  $response response from http
     * @return ModifiedResponse
     */
    public function execute($request, $response) : ModifiedResponse
    {
        if ($request->getMethod() == "POST" || $request->getMethod() == "PUT") {
            $this->validateParams($request->getAttributes());
        }

        $res = new ModifiedResponse();
        $isJSON = $this->checkJSON($request);
        $provider = new TaskTwoDataProvider();
        $formattedData = $provider->formatData($request, $request->listOfRequestedAttributes());

        if ($isJSON) {
            $res->setHeader('Content-Type', 'application/json');
            $res->addHeader($res->setHeader);
            return json_encode($res);
        } else {
            $res->setHeader('Content-Type', 'text/html');
            return $res;
        }
    }

    /**
     * check if the request is JSON
     * @method checkJSON
     * @param  string    $req assume to be string
     * @return bool         [description]
     */
    function checkJSON($req) : boolean
    {
        $result = true;
        if(!is_string($string) || !is_array(json_decode($string, true)) || json_last_error() != JSON_ERROR_NONE) {
            return false;
        }
        return true;
    }
}
