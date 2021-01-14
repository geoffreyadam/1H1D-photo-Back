<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
  public function index (Request $request) 
  {
    $validatedData = Validator::make($request->all(), [
      'email' => ['required', 'email'],
      'body' => ['required', 'numeric']
    ]); 

    if ($validatedData->fails()) {
      return json_encode($validatedData->messages());
      dump('nope');
    } else {
      
    }
    dump($validatedData);
    die;
    return 'works';
  }
}
