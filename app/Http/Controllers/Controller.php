<?php

namespace App\Http\Controllers;

use App\Helper\HttpResponseHelper;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param array $data
     * @param string $message
     * @return Response
     */
    public function sendSuccess(array $data, string $message = '', int $http_response_code = 200): Response
    {
        return HttpResponseHelper::createSuccessResponse($data, $message, $http_response_code);
    }

    /**
     * @param string $message
     * @param int $error_code
     * @param array $data
     * @param int $http_response_code
     * @return Response
     */
    public function sendError(string $message, int $error_code, array $data = [], int $http_response_code = 401): Response
    {
        return HttpResponseHelper::createErrorResponse($message, $error_code, $data, $http_response_code);
    }

    public function respondError(string $message, int $http_response_code = 400): Response
    {
        return HttpResponseHelper::createErrorResponse($message, 400, [], $http_response_code);
    }
}
