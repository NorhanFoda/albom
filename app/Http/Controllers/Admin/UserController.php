<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\UserRequest;

use App\Repositories\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository){

        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = $this->userRepository->paginateWhereHas('roles', [['name', 'user']]);

        return view('admin.users.index')->with([
            'data' => $data
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user'] = $this->userRepository->findOne($id);

        return view('admin.users.show')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = $this->userRepository->findOne($id);

        return view('admin.users.edit')->with([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $data = $request->except(['_token', '_method', 'edit']);

        $updated = $this->userRepository->update($data, $id);

        if($updated){

            $response['status'] = 1;
            $response['empty_inputs'] = ['email', 'password'];
            $response['reload'] = 1;
            $response['redirect'] = route('admin.users.edit', $id);
            return $response;

        }
        else{
            
            $response['status'] = 0;
            $response['empty_inputs'] = ['email', 'password'];
            $response['reload'] = 0;
            $response['redirect'] = route('admin.users.edit', $id);
            return $response;

        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
