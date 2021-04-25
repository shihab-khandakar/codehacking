<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserEditRequest;
use App\Models\User;
use App\Models\Role;
use App\Models\Photo;
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
        
        if(trim($request->password) ==''){
            $input= $request->except('password');
        }else{
            $input= $request->all();
            $input['password'] = bcrypt($request->password);
        }

       

       if($file= $request->file('photo_id')){

        $name=time() . $file->getClientOriginalName();

        $file->move('images', $name);

        $photo=Photo::create(['file'=>$name]);

        $input['photo_id'] = $photo->id;

       }

       
        User::create($input);

        return redirect('/admin/users');


        // return $request->all();


    }

   
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
        $user=User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

   
    public function update(UserEditRequest $request, $id)
    {
        $user= User::findOrFail($id);
        

        if(trim($request->password) ==''){
            $input= $request->except('password');
        }else{
            $input= $request->all();
            $input['password'] = bcrypt($request->password);
        }

        if($file=$request->file('photo_id')){

            $name=time() . $file->getClientOriginalName();
            $file->move('images',$name);

            $photo= Photo::create(['file'=>$name]);

            $input['photo_id']=$photo->id;

        }

        $user->update($input);
        return redirect('/admin/users');

    }

   
    public function destroy($id)
    {
        //
    }
}
