<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;

use App\Repositories\UserRepositoryInterface;

use Hash;
use Auth;

class LoginController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){

        $this->userRepository = $userRepository;
    }

    public function getLoginFrom(){

        return view('admin.auth.login');
    }

    public function login(LoginRequest $request){

        $user = $this->userRepository->getWhere([['email', $request->email]])->first();

        if($user && Hash::check($request->password, $user->password)){

            Auth::login($user);

            if($user->hasRole('user')){

                $redirect = route('web.home');
            }
            else{

                $redirect = route('admin.home');
            }

            $response['status'] = 1;
            $response['empty_inputs'] = ['email', 'password'];
            $response['reload'] = 1;
            $response['redirect'] = $redirect;
            return $response;

        }

        $response['status'] = 0;
        $response['empty_inputs'] = ['email', 'password'];
        $response['reload'] = 0;
        $response['redirect'] = '';
        return $response;

    }
}
