<?php
namespace App\Http\Controllers\admin;
use DB;
use App\Classes\Table;
use App\Classes\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function index(Request $request) 
    {
        if (permission::permitted('roles')=='fail'){ return redirect()->route('denied'); }
       
        $roles = table::roles()->get();
        
    	return view('admin.user-roles', ['roles' => $roles]);
    }

    public function add(Request $request) 
    {
        if (permission::permitted('roles-add')=='fail'){ return redirect()->route('denied'); }

        $roles = table::roles()->get();

        return view('admin.user-roles-add', ['roles' => $roles]);
    }

    public function store(Request $request) 
    {
        if (permission::permitted('roles-add')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'role_name' => 'required|max:100',
            'status' => 'required|max:20',
        ]);

        $role_name = mb_strtoupper($request->role_name);

        $status = $request->status;

        table::roles()->insert([
            [
                'role_name' => $role_name,
                'status' => $status
            ],
        ]);

        return redirect('users/roles')->with('success', "New user role has been added");
    }

    public function delete($id, Request $request) 
    {
        if (permission::permitted('roles-delete')=='fail'){ return redirect()->route('denied'); }

        table::roles()->where('id', $id)->delete();

        return redirect('users/roles')->with('success', "User role is successfully deleted");
    }

    public function edit(Request $request) 
    {
        if (permission::permitted('roles-edit')=='fail'){ return redirect()->route('denied'); }

        $id = $request->id;

        $role = table::roles()->where('id', $id)->first();

        return view('admin.user-roles-edit', ['role' => $role]);
    }

    public function update(Request $request) 
    {
        if (permission::permitted('roles-edit')=='fail'){ return redirect()->route('denied'); }
        
        $v = $request->validate([
            'reference' => 'required|max:200',
            'role_name' => 'required|max:100',
            'status' => 'required|max:20',
        ]);

        $reference = $request->reference;

        $role_name = mb_strtoupper($request->role_name);

        $status = $request->status;

        table::roles()->where('id', $reference)->update([
            'role_name' => $role_name,
            'status' => $status
        ]);

        return redirect('users/roles')->with('success', "Update was successful");
    }

    public function editperm($id) 
    {
        if (permission::permitted('roles-permission')=='fail'){ return redirect()->route('denied'); }
        
        $perms = table::permissions()->where('role_id', $id)->pluck('perm_id');

    	return view('admin.user-roles-permissions-edit', ['permissions' => $perms->toArray(), 'id' => $id]);
    }

    public function updateperm(Request $request) 
    {
        if (permission::permitted('roles-permission')=='fail'){ return redirect()->route('denied'); }

        $v = $request->validate([
            'perms' => 'array|max:255',
            'role_id' => 'required|max:200',
        ]);

        $perms = $request->perms;

        $role_id = $request->role_id;

        table::permissions()->where('role_id', $role_id)->delete();

        if(isset($perms))
        {
            foreach($perms as $perm) {
                table::permissions()->insert([
                    [
                        'role_id' => $role_id,
                        'perm_id' => $perm
                    ],
                ]);
            }
        }

        return redirect('users/roles')->with('success', "Update was successful");
    }

}
