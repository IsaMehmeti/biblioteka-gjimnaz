<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserController extends Controller
{
     public function edit()
    {       
        if (Auth::user()) {

            $user = User::find(Auth::user()->id);
            if ($user) {
                         
                return view('profile.profile')->withUser($user);
                     
            }else{
                return redirect()->back();
            }
        }else{
                return redirect()->back(); 
        }

    }
    public function update(Request $request){
    	$user = User::find(Auth::user()->id);
    	if ($user) {
    		$validate = null;
    		if(Auth::user()->email === $request['email']){
    		$validate = $request->validate([
    		'name' => ['required', 'string', 'max:255' ],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
          
    		]);
    	}else{
    		$validate = $request->validate([
    		'name' => ['required', 'string', 'max:255' ],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
           
    		]);
    	}

    		if ($validate) {
    			# code...
    		$user->name = $request['name'];
    		$user->email = $request['email'];
    		$user->password = bcrypt(request('password'));
			

			$user->save();
			$request->session()->flash('success', 'Your details have been updated');
			return redirect()->back()->with('status' , 'Ju edituat Profilin tuaj me sukses');
    		}else{
                return redirect()->back(); 
				    		
    		}		
	}}
}
