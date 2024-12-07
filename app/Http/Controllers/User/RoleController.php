<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RoleRequest;
use App\Repositories\User\RoleRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    protected $role;
    /**
     * Create new role instance
     * 
     * @param \Spatie\Permission\Models\Role
     */
    public function __construct(Role $role)
    {
        $this->role = new RoleRepository($role);
    }

    /**
     * Summary of list
     * 
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function list()
    {
        return $this->role->list();
    }

    /**
     * Summary of update
     * 
     * @param \App\Http\Requests\User\RoleRequest
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function create(RoleRequest $request)
    {
        return $this->role->create($request);
    }

    /**
     * Summary of edit
     * 
     * @param $id;
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->role->edit($id);
    }

    /**
     * Summary of update
     * 
     * @param \App\Http\Requests\User\RoleRequest
     * @param $id
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(RoleRequest $request, $id)
    {
        //dd($request);
        return $this->role->update($request, $id);
    }

    /**
     * Summary of destroy
     * 
     * @param $id
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->role->destroy($id);
    }
}
