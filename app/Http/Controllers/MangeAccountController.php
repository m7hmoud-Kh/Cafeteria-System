<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class MangeAccountController extends Controller
{
    public function index()
    {

        return view('website.account');
    }

    public function update(UpdateUserRequest $request)
    {
        $user = User::find($request->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return view('website.account')->with([
            'message' => 'your Account Updated Successfully',
            'alert' => 'success'
        ]);

    }


    public function destroy(Request $request)
    {

        $user = User::find(Auth::user()->id);
        if ($user->delete()) {

            return redirect()->route('home')->with([
                'message' => 'your Account Deleted Successfully',
                'alert' => 'danger'
            ]);
        }
    }
}
