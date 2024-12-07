<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use Auth;
use DB;
use Spatie\Permission\Models\Role;


class RoleRepository extends BaseRepository
{
    protected $role;
    public function __construct(Role $role)
    {
        $this->role = new BaseRepository($role);
    }

    public function list()
    {
        try {
            $roles = Role::with('permissions')->get();
            return $this->response = apiResponse($roles, 'Data fetch successfully.');
        } catch (\Exception $e) {
            return $this->response = errorResponse('', $e);
        }

    }

    public function create($data)
    {
        //dd($data['permisssion_data']);
        try {
            $role_data = [
                'name' => $data['name'],
            ];
            $role = $this->role->create($role_data);
            if (!empty($data['permisssion_data'])) {
                foreach ($data['permisssion_data'] as $name) {
                    $role->givePermissionTo($name);
                }
            }
            return $this->response = apiResponse($role);
        } catch (\Exception $e) {
            return $this->response = errorResponse('', $e);
        }
    }

    public function edit($id)
    {
        try {
            $role = $this->role->find($id);
            return $this->response = apiResponse($role, 'Data found successfully.');
        } catch (\Exception $e) {
            return $this->response = errorResponse('', $e);
        }
    }

    public function update($data, $id)
    {
        DB::beginTransaction();
        try {
            //dd($data['permisssion_data']);
            $role = $this->role->find($id);
            if (!empty($role)) {
                //$permission->name = $data['name'];
                $role_data = [
                    'name' => $data['name'],
                ];
                $new_role = $role->update($role_data);
                if (!empty($data['permisssion_data'])) {
                    $new_role->syncPermissions($data['permisssion_data']);
                } else {
                    $new_role->syncPermissions([]);
                }
                DB::commit();
                return $this->response = apiResponse($new_role, 'Data updated successfully.');
            } else {
                return $this->response = apiResponse($role, 'Data not found.');
            }

        } catch (\Exception $e) {
            return $this->response = errorResponse('', $e);
        }
    }

    public function destroy($id)
    {
        try {
            $role = $this->role->find($id)->delete();

            //$role->delete();
            return $this->response = apiResponse($role, 'Data deleted successfully.');
        } catch (\Exception $e) {
            return $this->response = errorResponse('', $e);
        }
    }


}