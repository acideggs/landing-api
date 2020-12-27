<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Model Line
use App\Models\Role;

// Request Line
use App\Http\Requests\RoleRequest;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        // Checking if role was exist and return 404 if not found
        if (empty($roles)) {
            return response()->json([
                'data'      =>  "No one role has created",
                'status'    =>  "Not Success"
            ], 404);
        }

        return response()->json([
            'data'      => $roles,
            'status'    => "Success"
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        $role = Role::create([
            'name'  =>  $request->name
        ]);

        return response()->json([
            'data'      =>  $role,
            'status'    =>  "Role Was Added"
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);

        // Checking if role was exist and return 404 if not found
        if (empty($role)) {
            return response()->json([
                'data'      =>  "Role Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        return response()->json([
            'data'      =>  $role,
            'status'    =>  "Success"
        ], 200);
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
        $role = Role::find($id);

        // Checking if role was exist and return 404 if not found
        if (empty($role)) {
            return response()->json([
                'data'      =>  "Role Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        $role->update([
            'name'  =>  $request->name
        ]);

        return response()->json([
            'data'      =>  $role,
            'status'    =>  "Role was Updated"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);

        // Checking if role was exist and return 404 if not found
        if (empty($role)) {
            return response()->json([
                'data'      =>  "Role Not Found",
                'status'    =>  "Not Success"
            ], 404);
        }

        $role->delete();

        return response()->json([
            'data'      =>  $role,
            'status'    =>  "Role was Deleted"
        ], 200);
    }
}
