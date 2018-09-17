<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiBaseController extends Controller
{
  function baseResponse($isError, $message, $data)
  {
    return [
          "error" => $isError,
          "message" => $message,
          "data" => $data
      ];
  }
}
