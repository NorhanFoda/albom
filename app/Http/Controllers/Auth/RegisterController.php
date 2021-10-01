<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;

use App\Repositories\UserRepositoryInterface;

use Auth;

class RegisterController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){

        $this->userRepository = $userRepository;
    }

    public function getRegisterForm(){

        return view('web.auth.register');
    }

    public function regsiter(RegisterRequest $request){

        $data = $request->except(['_token', '_method']);

        $data['password'] = bcrypt($request->password);

        $user = $this->userRepository->create($data);

        if($user){

            Auth::login($user);

            $user->assignRole('user');

            $response['status'] = 1;
            $response['empty_inputs'] = ['email', 'password'];
            $response['redirect'] = route('web.home');;
            $response['reload'] = 1;
            return $response;
        }

        $response['status'] = 0;
        $response['empty_inputs'] = ['email', 'password'];
        $response['redirect'] = route('get-register-form');
        $response['reload'] = 0;    
        return $response;
    }
}
