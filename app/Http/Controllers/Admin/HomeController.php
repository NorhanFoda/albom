<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\AlbomRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\UserRepositoryInterface;

class HomeController extends Controller
{
    private $albomRepository;
    private $imageRepository;
    private $userRepository;

    public function __construct(AlbomRepositoryInterface $albomRepository,
                                ImageRepositoryInterface $imageRepository,
                                UserRepositoryInterface $userRepository){

        $this->albomRepository = $albomRepository;
        $this->imageRepository = $imageRepository;
        $this->userRepository = $userRepository;
    }

    public function index(){

        $data['users_count'] =  $this->userRepository->whereHas('roles', [['name', 'user']])->count();
        $data['images_count'] =  $this->imageRepository->getAll()->count();
        $data['alboms_count'] =  $this->albomRepository->getAll()->count();

        return view('admin.home.index')->with([
            'data' => $data
        ]);
    }
}
