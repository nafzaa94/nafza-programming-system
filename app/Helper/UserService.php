<?php

namespace App\Helper;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserService
{
    public $name, $email, $password, $password_confirmation;

    public function __construct($name, $email, $password, $password_confirmation)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->password_confirmation = $password_confirmation;
    }

    public function validateInputRegister()
    {
        $validator = Validator::make(
            ['name' => $this->name, 'email' => $this->email, 'password' => $this->password, 'password_confirmation' => $this->password_confirmation],
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string', 'min:8'],
            ]
        );

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()
            ];
        } else {
            return [
                'status' => true,
                'message' => 'Success'
            ];
        }
    }

    public function validateInputLogin()
    {
        $validator = Validator::make(
            ['email' => $this->email, 'password' => $this->password],
            [
                'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
                'password' => ['required', 'string', 'min:8'],
            ]
        );

        if ($validator->fails()) {
            return [
                'status' => false,
                'message' => $validator->errors()
            ];
        } else {
            return [
                'status' => true,
                'message' => 'Success'
            ];
        }
    }

    public function register($deviceName)
    {
        $validate = $this->validateInputRegister();

        if ($validate['status'] == false) {
            return $validate;
        } else {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password)
            ]);
            $token = $user->createToken($deviceName)->plainTextToken;
            return ['status' => true, 'token' => $token, 'user' => $user];
        }
    }

    public function login($deviceName)
    {
        $validate = $this->validateInputLogin();

        if ($validate['status'] == false) {
            return $validate;
        } else {
            $user = User::where('email', $this->email)->first();
            if (Hash::check($this->password, $user->password)) {
                $token = $user->createToken($deviceName)->plainTextToken;
                return ['status' => true, 'token' => $token, 'user' => $user];
            } else {
                return ['status' => false, 'message' => ['password' => 'Password is incorrect']];
            }
        }
    }
}
