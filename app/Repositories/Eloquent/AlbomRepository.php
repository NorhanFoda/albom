<?php

namespace App\Repositories\Eloquent;

use App\Models\Albom;
use App\Repositories\AlbomRepositoryInterface;

class AlbomRepository extends BaseRepository implements AlbomRepositoryInterface
{

    public function __construct()
    {
        $this->model = new Albom();
        
    }

}
