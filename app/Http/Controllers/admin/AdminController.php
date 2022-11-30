<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $user=User::paginate(5);
        return view('admin.book.userlist',['users'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.book.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new User;
        $user->name=$request['name'];
        $user->email=$request['email'];
        $password="pass";
        $user->password=Hash::make($password);
        $user->role=$request['role'];
        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $fileName='img_user'.$user->name.'.'.$file->getClientOriginalExtension();
            $image=$request->file('picture')->storeAs('imgs/auth',$fileName,'public');
            $user->picture='storage/'.$image;
        }
        if ($user->save()) {
            Mail::to($user->email)->send(new Contact(['name'=>$user->name,'email'=>$user->email,'password'=>$password]));
            return redirect()->route('users.index')->with('success','User created successfully');
        }else{
            return back()->with('error','User not created');
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        // return view('admin.book.updateUser',['user'=>$user]);
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
        $olduser=User::find($id);
        $olduser->name=$request['name'];
        $olduser->email=$request['email'];
        $password="pass";
        $olduser->password=Hash::make($password);
        $olduser->role=$request['role'];
        if($request->hasFile('picture')){
            $file=$request->file('picture');
            $fileName='img_user'.$olduser->name.'.'.$file->getClientOriginalExtension();
            $images=$request->file('picture')->storeAs('imgs/auth',$fileName,'public');
            $olduser->picture='storage/'.$images;
        }
       if($olduser->save()){

        return redirect()->route('users.index')->with('success',$olduser->name.'.' .'updated successfully');
       }else{
        return back()->with('error','User not updated');
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
        $user=User::find($id);
       if($user->delete()){
        return redirect()->route('users.index')->with('success','User is deleted');
       }else{
        return back()->with('error', 'User not deleted');
       }
    }
}
