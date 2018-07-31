<?php

namespace App\Http\Controllers;
use Session;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::paginate(2);

        return view('admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//select in select input
$roles = Role::pluck('name','id')->all();

        return view('admin.users.create',compact('roles'));
        //


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data=$this->validate(request(),[
'name'=>'required',
'email'=>'required',
'password'=>'required',
'is_active'=>'required',
'role_id'=>'required',


        ],[],['name'=>'Please Enter Your Name']);


//photo of user
        
if ($file = $request->file('photo_id')) {
   $name = time().$file->getClientOriginalName();
  $path= $file->move('my_images',$name);
  //$path_admin= $file->move(public_path('admin/my_images'),$name);
   // $file->move(public_path('admin/my_images'),$name);
   $photo=Photo::create(['file'=>$name]);
   $data['photo_id'] = $photo->id;


}

   $data['password'] = bcrypt($request->password);

        User::create($data);
        
        return redirect('admin/users');


   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate data
                $data=$this->validate(request(),[
'name'=>'required',
'email'=>'required',
'is_active'=>'required',
'role_id'=>'required',


        ],[],['name'=>'Please Enter Your Name']);
//find user
$user = User::findOrFail($id);


//file
if ($file = $request->file('photo_id')) {
    $name = time() . $file->getClientOriginalName();
    $file->move('my_images',$name);
    $photo = Photo::create(['file'=>$name]);
   $data['photo_id'] = $photo->id;

}
   $data['password'] = bcrypt($request->password);


$user->update($data);
return redirect('admin/users');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $user = User::findOrFail($id);
        // delete user image
        unlink(public_path()."/my_images/". $user->photo->file);
        // delete user image
        
        $user->delete();
        Session::flash('deleted_user','the user has been deleted');
        return redirect('admin/users');

    }

    public function hi(){

    return view('admin.index');
        
    }
}
