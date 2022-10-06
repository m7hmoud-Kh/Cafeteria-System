<?php

namespace App\Http\Controllers\Api\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\trait\ImageTrait;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\Resources\Api\admin\UserResource;

class UserApiController extends Controller
{

    use ImageTrait;

    public function index()
    {
        $users = User::WhereNull('isAdmin')->get();
        return [
            'status' => 200,
            'data' =>  UserResource::collection($users),
        ];

    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->all();
        $data['email_verified_at'] = Carbon::now();
        $data['password'] = Hash::make($request->password);
        $data['image'] =
        $this->insertImage($request->email, $request->image, 'User_image/');
        User::create($data);
        return [
            'status' => 201,
            'message' => 'User Created'
        ];

    }


    public function update(UpdateUserRequest $request,$id)
    {
        $data = $request->all();
        $user = User::find($id);
        if($request->file('image')){
            Storage::disk('user_image')->delete($user->image);
            $data['image'] = $this->insertImage($request->email,$request->image,'User_image/');
        }

        $user->update($data);
        return response()->json([
            'message' => 'User Updated',
            'status' => 201
        ],'201');
    }

    public function destory($id) {
        $user = User::find($id);
        if($user){
            Storage::disk('user_image')->delete($user->image);
            $user->delete();
        }
        return response()->json([
            'message' => 'User Deleted',
            'status' => 201
        ],200);
    }
}
