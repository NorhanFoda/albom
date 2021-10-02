<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\AlbomRepositoryInterface;

class WebHomeController extends Controller
{
    private $albomRepository;

    public function __construct(AlbomRepositoryInterface $albomRepository){

        $this->albomRepository = $albomRepository;
    }

    public function index(){

        $data['alboms'] =  $this->albomRepository->paginateWhere([['type', 'public']], 6);

        return view('web.home.index')->with([
            'data' => $data
        ]);
    }
}
