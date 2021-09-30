<?php

namespace App\Repositories\Eloquent;

use Spatie\Permission\Models\Role;
use App\Repositories\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{

    public function __construct()
    {
        $this->model = new Role();
        
    }

}
