<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPersonalInformation;
use App\Http\Requests\UserPersonalInformationRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function form(User $user = null){

        return view('form', [
            'user' =>  $user?->load('personalInformation') /* */
        ]);
    }


    public function update(User $user, UserPersonalInformationRequest $request)
    {

        if ($request->hasFile('photo')) {
            $path = 'public/users';

            $file = $request->file('photo');
            $name = Str::uuid()->toString();
            $ext = $file->getClientOriginalExtension();


            if (Storage::exists($user->personalInformation->photo)) {
                Storage::delete($user->personalInformation->photo);
            }

            Storage::putFileAs($path, $file, "$name.$ext");
            $path .= "/$name.$ext";
        }

        $user->email = $request->email;
        $user->update();

        if ($request->get('password')) {
            $user->password = $request->get('password');

            Auth::logout();
        }

        // $user->personalInformation = new UserPersonalInformation($request->all());


        $personalInformation = new UserPersonalInformation($request->all());
        if ($request->hasFile('photo')){
            $personalInformation->photo = $path;
        }

        $user->personalInformation()->updateOrCreate(
            [
                'user_id' => $user->id
            ],
            $personalInformation->toArray()
        );

        return redirect()->back()->with('alert', [
            "type" => 'success',
            "message" => "Se actualizó correctamente"
        ]);
    }


    public function sendNotification(){
        auth()->user()->sendEmailVerificationNotification();

//        Mail::to(auth()->user()->email)->send(new WelcomeEmail());

        return redirect()->back()->with('alert',[
            'type' => 'success',
            'message' => 'Se envió correctamente'
        ]);
    }

    public function verifyEmail(\Illuminate\Foundation\Auth\EmailVerificationRequest $request){
        $request->fulfill();

        return redirect(route('home'))->with('alert', [
            "type" => 'info',
            'message' => 'Se verificó correctamente'
        ]);
    }

    public function store(){
        return 'test';
    }
}
