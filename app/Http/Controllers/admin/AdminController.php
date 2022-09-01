<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\trait\ImageTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::whereNotNull('isAdmin')->get();
        $data = [
            'users' => $users
        ];
        return view('admin.admin.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['email_verified_at'] = Carbon::now();
        $data['isAdmin'] = true;
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->insertImage($request->email,$request->image,'User_image/');
        User::create($data);
        return redirect()->route('admin.index')->with([
            'message' => 'Admin Added Successfully',
            'alert' => 'success'
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
        $user = User::find($id);
        $data = [
            'user' => $user
        ];
        return view('admin.admin.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);
        $data = $request->all();
        if($request->file('image')){
            Storage::disk('user_image')->delete($user->image);
            $data['image'] = $this->insertImage($request->email,$request->image,'User_image/');
        }
        $user->update($data);
        return redirect()->route('admin.index')->with([
            'message' => 'Admin Updated Successfully',
            'alert' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if($user){
            Storage::disk('user_image')->delete($user->image);
            $user->delete();
        }
        return redirect()->route('admin.index')->with([
            'message' => 'Admin Deleted Successfully',
            'alert' => 'danger'
        ]);
    }
}
