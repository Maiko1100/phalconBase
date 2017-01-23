<?php

namespace Backend\Source\Components;

class ResponseUtils
{

    //Web Status codes:
    const STATUS_OK               = 200;
    const STATUS_CREATED          = 201;
    const STATUS_NO_CONTENT       = 204;
    const STATUS_BAD_REQUEST      = 400;
    const STATUS_UNAUTHORIZED     = 401;
    const STATUS_PAYMENT_REQUIRED = 402;
    const STATUS_FORBIDDEN        = 403;
    const STATUS_NOT_FOUND        = 404;
    const STATUS_CONFLICT         = 409;
    const STATUS_GONE             = 410;
    const STATUS_TEAPOT           = 418;
    const STATUS_INTERNAL_ERROR   = 500;

    const STATUS_NOT_IMPLEMENTED = 501;
    const STATUS_USER_BLOCKED    = 1000;


    public function __construct() {

    }

    /**
     * Function to send a response.
     *
     * @param $status       ,              The status code to send. Default is @see ResponseUtils::STATUS_OK
     * @param $body         ,                Assoc array of data to send. Default is none.
     * @param $content_type ,        The content type to serve. Default is 'application/json'.
     */
    public function sendResponse($status = self::STATUS_OK, $body = [], $content_type = 'application/json')
    {
        // Set the status
        $status_header = 'HTTP/1.1 ' . $status . ' ' . $this->getStatusCodeMessage($status);
        header($status_header);
        // and the content type
        header('Content-type: ' . $content_type);

        if ($this->doesReturn($status))
        {
            $result = [
                'status'  => $status,
                'message' => $this->getStatusCodeMessage($status),
                'result'  => $body,
            ];

            echo json_encode($result);
        }

        exit;
    }

    /**
     * Function to get the header for a status code.
     *
     * @param $status , The status code.
     *
     * @return string, A message header for a status code.
     */
    private function getStatusCodeMessage($status)
    {
        $message = "";
        switch ($status)
        {
            case self::STATUS_OK:
                $message = "OK";
                break;
            case self::STATUS_CREATED:
                $message = "Created";
                break;
            case self::STATUS_NO_CONTENT:
                $message = "No Content";
                break;
            case self::STATUS_BAD_REQUEST:
                $message = 'Bad Request';
                break;
            case self::STATUS_UNAUTHORIZED:
                $message = 'Unauthorized';
                break;
            case self::STATUS_PAYMENT_REQUIRED:
                $message = 'Payment Required';
                break;
            case self::STATUS_FORBIDDEN:
                $message = 'Forbidden';
                break;
            case self::STATUS_NOT_FOUND:
                $message = 'Not Found';
                break;
            case self::STATUS_TEAPOT:
                $message = "I'm a teapot";
                break;
            case self::STATUS_GONE:
                $message = "Gone";
                break;
            case self::STATUS_INTERNAL_ERROR:
                $message = 'Internal Server Error';
                break;
            case self::STATUS_NOT_IMPLEMENTED:
                $message = 'Not Implemented';
                break;
            case self::STATUS_USER_BLOCKED:
                $message = 'User is blocked';
                break;
            case self::STATUS_CONFLICT:
                $message = 'There is a conflict';
                break;
            default:
                $message = "Unknown";
                break;
        }

        return $message;
    }

    private function doesReturn($status)
    {
        switch ($status)
        {
            case self::STATUS_NO_CONTENT:
                return FALSE;
            default:
                return TRUE;
        }
    }
}
