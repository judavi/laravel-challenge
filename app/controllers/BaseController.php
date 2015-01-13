<?php

class BaseController extends Controller {

    protected function sendJsonResponse($success, $notification, $url)
    {
        return Response::json(
            array(
                'success'      => $success,
                'notification' => $notification,
                'url'          => $url,
            )
        );
    }

}
