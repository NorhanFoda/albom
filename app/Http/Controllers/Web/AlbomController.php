<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\Web\AlbomRequest;

use App\Repositories\AlbomRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;

use Storage;

class AlbomController extends Controller
{
    private $albomRepository;
    private $imageRepository;

    public function __construct(AlbomRepositoryInterface $albomRepository,
                                ImageRepositoryInterface $imageRepository){

        $this->albomRepository = $albomRepository;
        $this->imageRepository = $imageRepository;

        $this->middleware(['auth', 'role:user'])->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['alboms'] = $this->albomRepository->paginateWhere([['user_id', auth()->user()->id]], 6);

        return view('web.alboms.index')->with([
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('web.alboms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlbomRequest $request)
    {
        $data = $request->except(['_token', '_method', 'images']);

        $data['main_image'] = $request->file('main_image')->store('uploads');
        $data['user_id'] = auth()->user()->id;

        $albom =  $this->albomRepository->create($data);

        if($albom){

            $imagesArr = [];

            foreach ($request->images as $image) {

                $path = $image->store('uploads');

                $arr = [
                    'albom_id' => $albom->id,
                    'path' => $path,
                ];

                array_push($imagesArr, $arr);
            }

            if (count($imagesArr) > 0) {
                $this->imageRepository->CreateMulti($imagesArr);
            }

            $response['status'] = 1;
            $response['reload'] = 0;
            $response['redirect'] = route('web.alboms.create');
            return $response;

        }
        else{
            
            $response['status'] = 0;
            $response['reload'] = 0;
            $response['redirect'] = route('web.alboms.create');
            return $response;

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['albom'] = $this->albomRepository->findWith($id, ['images', 'images.albom']);

        return view('web.alboms.show')->with([
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
        $data['albom'] = $this->albomRepository->findOne($id);

        return view('web.alboms.edit')->with([
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
    public function update(AlbomRequest $request, $id)
    {
        $data = $request->except(['_token', '_method', 'images']);

        if($request->has('main_image')){

            $data['main_image'] = $request->file('main_image')->store('uploads');
        }

        $updated = $this->albomRepository->update($data, $id);

        if($updated){

            if($request->has('images')){

                $albom = $this->albomRepository->findWith($id, ['images']);

                // delete old images
                foreach($albom->images as $image){

                    Storage::delete($image->path);

                    $this->imageRepository->delete($image->id);
                }

                $imagesArr = [];
    
                foreach ($request->images as $image) {
    
                    $path = $image->store('uploads');
    
                    $arr = [
                        'albom_id' => $albom->id,
                        'path' => $path,
                    ];
    
                    array_push($imagesArr, $arr);
                }
    
                if (count($imagesArr) > 0) {
                    $this->imageRepository->CreateMulti($imagesArr);
                }
            }

            $response['status'] = 1;
            $response['reload'] = 0;
            $response['redirect'] = route('web.alboms.index');
            return $response;

        }
        else{
            
            $response['status'] = 0;
            $response['reload'] = 0;
            $response['redirect'] = route('web.alboms.edit', $id);
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
        $albom = $this->albomRepository->findOne($id);

        // delete image
        Storage::delete($albom->main_image);

        $this->albomRepository->delete($id);

        return response()->json([
            'data' => 1
        ], 200);
    }
}
