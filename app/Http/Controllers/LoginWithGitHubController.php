<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Exception;
use Socialite;
use App\Models\User;

class LoginWithGitHubController extends Controller
{
    public function gitRedirect()
    {
        return Socialite::driver('github')->redirect();
    }
       
    public function gitCallback()
    {
        try {
     
            $user = Socialite::driver('github')->user();
            
            $searchUser = User::where('github_id', $user->id)->first();
          
            if($searchUser){
      
                Auth::login($searchUser);
     
                return redirect('/');
      
            }else{



                $gitUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'github_id'=> $user->id,
                    'github_nick_name'=>$user->nickname,
                    'auth_type'=> 'github',
                    'password' => encrypt('gitpwd059')
                ]);
     
                Auth::login($gitUser);
      
                return redirect('/');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
