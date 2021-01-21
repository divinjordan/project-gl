<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Str;
use App\Providers\RouteServiceProvider;

class SocialiteController extends Controller
{
    //
    public function chooseUser(){
       
    }

    public function facebook(){

        $user = Socialite::driver('facebook')->user();

        // if email address is null
        if($user->email == null){
            session('authErrors',["Aucune adresse email n'est associe a ce compte facebook"]);
            return redirect('/login');
        }

        $this->authenticate($user);

        return redirect('/dashboard');
    }

    public function google(){

        $user = Socialite::driver('google')->user();
        
        $this->authenticate($user);

        return redirect('/dashboard');
    }

    public function authenticate($user){

        $userExist = User::where('email',$user->email)->first();

        if(isset($userExist)){
           Auth::login($userExist);
        }else{
            // register user.
            $userCreated = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => Str::random(20),
                'role' => session('role')
            ]);
            Auth::login($userCreated);
            event(new Registered($userCreated));
        }
    }
}

