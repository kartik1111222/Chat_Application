<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Registrationrequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function registration_page(){
       return view('registration');
    }

    public function add_registration(Registrationrequest $request){
        $data = $request->all();

        $user = new User();
        $user->firstname = $data['firstname'];
        $user->lastname = $data['lastname'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = Hash::make($data['password']);
        $user->address = $data['address'];

        if($request->has('profile')){
            $profile = $request->profile;
            $name = time() . '.' . $profile->extension(); 
            $path = public_path(). '/assets/images/profile';
            $profile->move($path, $name);
            $user->profile = $name;
        }
        $result = $user->save();
        if($result == true){
            return redirect()->route('login_page');
        }

     }

    public function login_page(){
        return view('login');
    }

    public function login_check(LoginRequest $request){
        
        if(Auth::attempt($request->only('email', 'password'))){
            return redirect()->route('user.dashboard');
        }else{
            return redirect()->route('login_page');

        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login_page');
    }
}
