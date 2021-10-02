<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Admin\UserRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\AlbomRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;

use Storage;

class UserController extends Controller
{
    private $userRepository;
    private $albomRepository;
    private $imageRepository;

    public function __construct(UserRepositoryInterface $userRepository,
                                AlbomRepositoryInterface $albomRepository,
                                ImageRepositoryInterface $imageRepository){

        $this->userRepository = $userRepository;
        $this->albomRepository = $albomRepository;
        $this->imageRepository = $imageRepository;

        $this->middleware('can:list users',    ['only' => ['index']]);
        $this->middleware('can:edit users',    ['only' => ['edit', 'update']]);
        $this->middleware('can:show users',    ['only' => ['show']]);
        $this->middleware('can:delete users',    ['only' => ['delete']]);
        $this->middleware('can:show alboms',    ['only' => ['viewAlbom']]);
        $this->middleware('can:delete alboms',    ['only' => ['deleteAlbom']]);
        $this->middleware('can:delete images',    ['only' => ['deleteImage']]);
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
        $data['user'] = $this->userRepository->findWith($id, ['alboms']);

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
            $response['reload'] = 1;
            $response['redirect'] = route('admin.users.edit', $id);
            return $response;

        }
        else{
            
            $response['status'] = 0;
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
        $user = $this->userRepository->findWith($id, ['alboms', 'alboms.images']);

        foreach($user->alboms as $albom){
            Storage::delete($albom->main_image);

            foreach($albom->images as $image){
                Storage::delete($image->path);
            }
        }

        $this->userRepository->delete($id);

        return response()->json([
            'data' => $data
        ], 200);
    }

    public function viewAlbom($id){

        $data['albom'] = $this->albomRepository->findWith($id, ['images']);

        return view('admin.alboms.show')->with([
            'data' => $data
        ]);
    }

    public function deleteAlbom($id){

        $albom =  $this->albomRepository->findWith($id, ['images']);

        Storage::delete($albom->main_image);

        foreach($albom->images as $image){

            Storage::delete($image->path);
        }

        $this->albomRepository->delete($id);

        return response()->json([
            'data' => 1
        ], 200);
    }

    public function deleteImage($id){

        $image =  $this->imageRepository->findOne($id);

        Storage::delete($image->path);

        $this->imageRepository->delete($id);

        return response()->json([
            'data' => 1
        ], 200);
    }
}
