<?php
namespace SolidCrud\Modules;

class BaseRepository {
  public function failResponse(string|array $error, $code = 500): array
  {
    return [
      'success' => false,
      'error' => $error,
      'status_code' => $code
    ];
  }

  public function successResponse($data = null, $message = null): array
  {

    return [
      'success' => true,
      'data' => $data,
      'message' => $message
    ];
  }
}
