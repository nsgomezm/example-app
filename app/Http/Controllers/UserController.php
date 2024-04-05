<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserPersonalInformation;
use App\Http\Requests\UserPersonalInformationRequest;

class UserController extends Controller
{
    public function form(User $user = null){

        return view('form', [
            'user' =>  $user?->load('personalInformation') /* */
        ]);
    }


    public function update(User $user, UserPersonalInformationRequest $request){

        $user->email = $request->email;


        if($request->get('password')){
            $user->password = $request->get('password');

            Auth::logout();
        }

        $user->update();

        // $user->personalInformation = new UserPersonalInformation($request->all());


        $personalInformation = new UserPersonalInformation( $request->all() );

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


    public function store(){
        return 'test';
    }
}
