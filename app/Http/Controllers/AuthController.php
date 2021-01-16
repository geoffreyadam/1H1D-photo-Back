<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
  public function index (Request $request) 
  {
    $data = $request->all();
    $validatedData = Validator::make($data, [
      'email' => ['required', 'email', 'unique:users'],
      'password' => ['required', 'min:8']
    ]); 

    if ($validatedData->fails()) {
      return json_encode(['errors' => $validatedData->messages()]);
    } else {
      // dump($data['email']);
      // die;
      User::create([
        'email' => $data['email'],
        'password' => $data['password'],
      ]);
      return json_encode(['accepted' => 'Account created']);
    }
  }
}
