<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PermissionRequest;
use App\Repositories\User\PermissionRepository;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{

    protected $permission;
    /**
     * Create new permission instance
     * 
     * @param \Spatie\Permission\Models\Permission
     */
    public function __construct(Permission $permission)
    {
        $this->permission = new PermissionRepository($permission);
    }

    /**
     * Summary of list
     * 
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function list()
    {
        return $this->permission->list();
    }

    /**
     * Summary of update
     * 
     * @param \App\Http\Requests\User\PermissionRequest
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function create(PermissionRequest $request)
    {
        return $this->permission->create($request);
    }

    /**
     * Summary of edit
     * 
     * @param $id;
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        return $this->permission->edit($id);
    }

    /**
     * Summary of update
     * 
     * @param \App\Http\Requests\User\PermissionRequest
     * @param $id
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(PermissionRequest $request, $id)
    {
        //dd($id);
        return $this->permission->update($request, $id);
    }

    /**
     * Summary of destroy
     * 
     * @param $id
     * @return mixed|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->permission->destroy($id);
    }
}
