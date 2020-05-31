<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserApiRequest;
use App\Traits\ApiResponser;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    use ApiResponser;

    public function register(StoreUserApiRequest $request)
    {
        $userData = $request->validated();
        $user = $this->create($userData);
        return $this->createdSuccessWithMsg('User Created.', $user);
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        $loginData = $request->all();
        if($user = $this->authenticated($loginData)){
            $user['api_token'] = generateApiToken();
            $user->save();

            return $this->successWithMsg("Login success", $user);
        }

        return $this->successWithMsg('Login Failed.', []);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function authenticated($loginData){
        $user = User::where('email', $loginData['email'])->first();

        if($user && Hash::check($loginData['password'], $user->password)){
            return $user;
        }
        
        return null;
    }
}
