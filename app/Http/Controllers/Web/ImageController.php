<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\ImageRepositoryInterface;

use Storage;

class ImageController extends Controller
{
    private $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository){

        $this->imageRepository = $imageRepository;
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = $this->imageRepository->findOne($id);

        Storage::delete($image->path);

        $this->imageRepository->delete($id);

        return response()->json([
            'data' => 1
        ], 200);
    }
}
