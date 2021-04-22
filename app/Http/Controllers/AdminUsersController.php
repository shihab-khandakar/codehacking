<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $users=User::all();
        return view('admin.users.index',compact('users'));

    }

    
    public function create()
    {
       $roles = Role::pluck('name','id')->all();
        return view('admin.users.create', compact('roles'));
    }

   
    public function store(UsersRequest $request)
    {
        
        User::create($request->all());

        return redirect('/admin/users');


        // return $request->all();


    }

   
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        return view('admin.users.edit');
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
