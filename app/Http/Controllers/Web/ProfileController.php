<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\RegisterRequest;

use App\Repositories\UserRepositoryInterface;

class ProfileController extends Controller
{

    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){

        $this->userRepository = $userRepository;

        $this->middleware(['auth', 'role:user']);
    }


    public function index(){

        return view('web.profile.index');
    }

    public function updateProfile(RegisterRequest $request){

        $data = $request->except(['_token', '_method', 'edit', 'password_confirmation']);

        if($request->has('password') && $request->password != null){

            $data['password'] = bcrypt($request->password);
        }

        $updated = $this->userRepository->update($data, auth()->user()->id);

        if($updated){

            $response['status'] = 1;
            $response['reload'] = 0;
            $response['redirect'] = route('web.profile');
            return $response;

        }
        else{
            
            $response['status'] = 0;
            $response['reload'] = 0;
            $response['redirect'] = route('web.profile');
            return $response;

        }


    }
}
