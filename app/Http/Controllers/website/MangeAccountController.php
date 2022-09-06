<?php

namespace App\Http\Controllers\website;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Http\trait\ImageTrait;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\trait\OrderNotificationTrait;
use Flasher\Prime\FlasherInterface;

class MangeAccountController extends Controller
{
    use ImageTrait;
    use OrderNotificationTrait;

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

      //  return view('website.account')->with([
        //    'message' => 'your Account Updated Successfully',
        //    'alert' => 'success'
      //  ]);
      return redirect()->route('account');

    }

    public function updateimage(Request $request)
    {
        if($request->file('image')){
            Storage::disk('user_image')->delete(Auth::user()->image);
            $dataimage = $this->insertImage(Auth::user()->email,$request->image,'User_image/');
            Auth::user()->update([
                'image' => $dataimage,
            ]);

         }

         return redirect()->route('account');

    }
    public function changepassword(Request $request,FlasherInterface $flasher)
    {
       # Validation
        if($request->new_password != $request->new_password_confirmation){
            $flasher->addError("Password and confirm password does not match");
            return redirect()->route('account');
        }else{
            $request->validate([ 'new_password' => 'required|confirmed',]);
            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password)
            ]);
            $flasher->addSuccess("Password changed successfully");
            return redirect()->route('account');
        }



    }

    public function destroy()
    {
        $user = User::find(Auth::user()->id);
        Storage::disk('user_image')->delete(Auth::user()->image);
        if ($user->delete()) {
            return redirect()->route('home')->with([
                'message' => 'your Account Deleted Successfully',
                'alert' => 'danger'
            ]);
        }
    }



}
