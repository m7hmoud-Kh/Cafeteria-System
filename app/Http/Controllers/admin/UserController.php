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

class UserController extends Controller
{

    use ImageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::WhereNull('isAdmin')->get();
        $data = [
            'users' => $users
        ];
        return view('admin.user.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create');
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
        $data['password'] = Hash::make($request->password);
        $data['image'] = $this->insertImage($request->email,$request->image,'User_image/');
        User::create($data);
        return redirect()->route('user.index')->with([
            'message' => 'User Added Successfully',
            'alert' => 'success'
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data = [
            'user' => $user
        ];
        return view('admin.user.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->all();
        if($request->file('image')){
            Storage::disk('user_image')->delete($user->image);
            $data['image'] = $this->insertImage($request->email,$request->image,'User_image/');
        }

        $user->update($data);
        return redirect()->route('user.index')->with([
            'message' => 'User Updated Successfully',
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
        return redirect()->route('user.index')->with([
            'message' => 'User Deleted Successfully',
            'alert' => 'danger'
        ]);
    }
}
