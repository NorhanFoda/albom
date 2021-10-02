<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use  App\Http\Requests\Admin\EmployeeRequest;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\RoleRepositoryInterface;

use Str;

class EmployeeController extends Controller
{
    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepositoryInterface $userRepository,
                                RoleRepositoryInterface $roleRepository){

        $this->userRepository = $userRepository;
        $this->roleRepository = $roleRepository;

        $this->middleware('can:list employees',    ['only' => ['index']]);
        $this->middleware('can:edit employees',    ['only' => ['edit', 'update']]);
        $this->middleware('can:create employees',    ['only' => ['create', 'store']]);
        $this->middleware('can:show employees',    ['only' => ['show']]);
        $this->middleware('can:delete employees',    ['only' => ['delete']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['emps'] = $this->userRepository->paginateWhereHas('roles', [['name', '!=', 'user'], ['name', '!=', 'admin']]);

        return view('admin.emps.index')->with([
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
        $data['roles'] = $this->roleRepository->getWhere([['name', '!=', 'admin'], ['name', '!=', 'user'], ['name', '!=', 'employee']]);

        return view('admin.emps.create')->with([
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $data = $request->except(['_token', '_method', 'roles']);

        // password shoud by hashed but it was not hashed just for test
        // passowrd login data (email and password) shoud by emailed to employee in real apps
        $data['password'] = Str::random(12);

        $emp = $this->userRepository->create($data) ;

        if($emp){

            $emp->syncRoles($request->roles);
            $emp->assignRole('employee');

            $response['status'] = 1;
            $response['reload'] = 0;
            $response['redirect'] = route('admin.employees.create');
            return $response;

        }
        else{
            
            $response['status'] = 0;
            $response['reload'] = 0;
            $response['redirect'] = route('admin.employees.create');
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
        $data['roles'] = $this->roleRepository->getWhere([['name', '!=', 'admin'], ['name', '!=', 'user'], ['name', '!=', 'employee']]);

        $data['emp'] = $this->userRepository->findWith($id, ['roles']);

        return view('admin.emps.show')->with([
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
        $data['roles'] = $this->roleRepository->getWhere([['name', '!=', 'admin'], ['name', '!=', 'user'], ['name', '!=', 'employee']]);

        $data['emp'] = $this->userRepository->findWith($id, ['roles']);

        return view('admin.emps.edit')->with([
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
    public function update(EmployeeRequest $request, $id)
    {
        $data = $request->except(['_token', '_method', 'roles']);

        $updated = $this->userRepository->update($data, $id) ;

        if($updated){

            $emp = $this->userRepository->findOne($id);

            $emp->syncRoles($request->roles);

            $response['status'] = 1;
            $response['reload'] = 0;
            $response['redirect'] = route('admin.employees.edit', $emp->id);
            return $response;

        }
        else{
            
            $response['status'] = 0;
            $response['reload'] = 0;
            $response['redirect'] = route('admin.employees.edit', $emp->id);
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
        $emp = $this->userRepository->findWith($id, ['roles']);

        $emp->roles()->detach();

        $this->userRepository->delete($id);

        return response()->json([
            'data' => 1
        ], 200);
    }
}
