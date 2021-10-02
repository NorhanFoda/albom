<?php

namespace App\Repositories\Eloquent;

use App\Models\Image;
use App\Repositories\ImageRepositoryInterface;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{

    public function __construct()
    {
        $this->model = new Image();
        
    }

}
