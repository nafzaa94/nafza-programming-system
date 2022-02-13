<?php

namespace App\Http\Controllers;

use App\Helper\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $response = (new UserService($request->name, $request->email, $request->password, $request->password_confirmation))->register($request->deviceName);
        return response()->json($response);
    }

    public function login(Request $request)
    {
        $response = (new UserService($request->name, $request->email, $request->password, $request->password_confirmation))->login($request->deviceName);
        return response()->json($response);
    }
}
