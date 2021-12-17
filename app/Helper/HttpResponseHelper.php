<?php
namespace App\Helper;

use Illuminate\Http\Response;
class HttpResponseHelper {
    const STATUS_SUCCESS = "success";
    const STATUS_ERROR = "error";

    public static function createSuccessResponse(array $data, string $message = HttpResponseMessages::ACTION_SUCCESSFUL, array $headers = []): Response
    {
        return self::createResponse(self::STATUS_SUCCESS, $data, $message, 0, 200, $headers);
    }

    public static function createResponse(
        string $status = self::STATUS_SUCCESS,
        array $data = [],
        string $message = "",
        int $code = 0,
        int $httpResponseCode = 200
    ): Response {
        $responseData = [
            'status' => $status,
            'data' => $data,
            'message' => $message
        ];
        if (!empty($code)) {
            $responseData['code'] = $code;
        }

        return \response($responseData, $httpResponseCode);
//        $header    = [
//            'Access-Control-Allow-Origin'      => self::getOrigin(),
//            'Access-Control-Allow-Credentials' => 'true',
//            'Access-Control-Allow-Methods'     => 'POST, GET, OPTIONS, PUT, DELETE, PATCH',
//            'Access-Control-Allow-Headers'     => 'X-Requested-With, Content-Type, Origin, Authorization'
//        ]];
//        return \response($responseData, $httpResponseCode)->withHeaders($header);
    }

    /**
     * Returns the origin for the request. It just spits back whatever Origin
     * request the request specifies or generates one from the $_SERVER info
     * if no Origin header is specified for the request.
     *
     * @return string the origin of the request
     */
    public static function getOrigin(): string
    {
        if(request()->headers->get('Origin')){
            return request()->headers->get('Origin');
        }
        $server = request()->server;
        $origin = $server->get('REQUEST_SCHEME') . "://" . $server->get('HTTP_HOST')
            . ":" . $server->get('REMOTE_PORT');
        return $origin;
    }

    public static function createErrorResponse(
        $message,
        $errorCode,
        array $data = [],
        $httpResponseCode = 401
    ): Response {
        return self::createResponse(self::STATUS_ERROR, $data, $message, $errorCode, $httpResponseCode);
    }
}
