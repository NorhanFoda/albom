<?php

namespace App\Repositories\Eloquent;

use Spatie\Permission\Models\Permission;
use App\Repositories\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{

    public function __construct()
    {
        $this->model = new Permission();
        
    }

}
