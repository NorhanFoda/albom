<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  App\Http\Requests\Admin\RoleRequest;

use App\Repositories\RoleRepositoryInterface;
use App\Repositories\PermissionRepositoryInterface;

class RoleController extends Controller
{
    private $roleRepository;
    private $permissionRepository;

    public function __construct(RoleRepositoryInterface $roleRepository,
                                PermissionRepositoryInterface $permissionRepository){

        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['roles'] = $this->roleRepository->paginateWhere([['name', '!=', 'admin'], ['name', '!=', 'user'], ['name', '!=', 'employee']]);

        return view('admin.roles.index')->with([
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
        $data['permissions']  = $this->permissionRepository->getAll();

        return view('admin.roles.create')->with([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $data = $request->except(['_token', '_method', 'permissions']);

        $role = $this->roleRepository->create($data) ;

        if($role){

            $role->syncPermissions($request->permissions);

            $response['status'] = 1;
            $response['reload'] = 0;
            $response['redirect'] = route('admin.roles.create');
            return $response;

        }
        else{
            
            $response['status'] = 0;
            $response['reload'] = 0;
            $response['redirect'] = route('admin.roles.create');
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
        $data['permissions']  = $this->permissionRepository->getAll();

        $data['role'] =  $this->roleRepository->findWith($id, ['permissions']);

        return view('admin.roles.show')->with([
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
        $data['permissions']  = $this->permissionRepository->getAll();

        $data['role'] =  $this->roleRepository->findWith($id, ['permissions']);

        return view('admin.roles.edit')->with([
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
    public function update(RoleRequest $request, $id)
    {
        $data = $request->except(['_token', '_method', 'permissions']);

        $updated = $this->roleRepository->update($data, $id);

        if($updated){

            $role = $this->roleRepository->findOne($id) ;

            $role->syncPermissions($request->permissions);

            $response['status'] = 1;
            $response['reload'] = 0;
            $response['redirect'] = route('admin.roles.edit', $id);
            return $response;

        }
        else{
            
            $response['status'] = 0;
            $response['reload'] = 0;
            $response['redirect'] = route('admin.roles.edit', $id);
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
        $role = $this->roleRepository->findWith($id, ['permissions']);

        $role->revokePermissionTo($role->permissions);

        $this->roleRepository->delete($id);

        return response()->json([
            'data' => 1
        ], 200);
    }
}
