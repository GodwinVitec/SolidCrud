<?php

namespace SolidCrud\Modules;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class BaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function respondSuccess($message = 'Done!', $code = 200)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], $code);
    }

    protected function respondWithError($message = 'Failed!', $code = 200)
    {
        return Response::json([
            'success' => false,
            'message' => $message
        ], $code);
    }

    protected function respondWithData($data = [], $message = 'Done!', $code = 200)
    {
        return Response::json([
            'success' => true,
            'message' => $message,
            'data' => $data
        ], $code);
    }


    protected function respondWithDataWithPagination($data, $message = 'Done!', $code = 200)
    {
        $response['success'] = true;
        $response['message'] = $message;
        $response['data'] = $data->items();
        $response['urls'] = [
            'next_url' => $data->nextPageUrl(),
            'prev_url' => $data->previousPageUrl(),
        ];
        return Response::json($response, $code);
    }

    protected function respondWithErrorKey($key, $message = 'Failed!', $code = 200)
    {
        return Response::json([
            'success' => false,
            'key' => $key,
            'message' => $message
        ], $code);
    }

}
