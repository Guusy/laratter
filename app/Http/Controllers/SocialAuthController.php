<?php

namespace App\Http\Controllers;
use Socialite;
use Illuminate\Http\Request;
use App\User;
use App\SocialProfile;


class SocialAuthController extends Controller
{
	public function facebook()
	{
		$provider = 'facebook';
		return Socialite::driver($provider)->redirect();
	}
	public function callback()
	{
		$user = Socialite::driver('facebook')->user();
    	//dd($user); DATOS DESDE FACEBOOK
		session()->flash('facebookUser',$user);

		$existing = User::whereHas('socialProfiles',
			function($query) use($user){
			$query->where('social_id',$user->id);
		})->first();
		if($existing!==null){
			auth()->login($existing);
			return redirect('/');
		}
		return view('users.facebook',[
			'userFacebook' => $user
		]);
	}
	public function register(Request $request){
		$data = session('facebookUser');

		$username = $request->input('username');

		$user = User::create([
			'name'=>$data->name,
			'email'=>$data->email,
			'avatar'=>$data->avatar,
			'username'=>$username,
			'password'=>str_random(16)


		]);

		$profile = SocialProfile::create([
			'social_id'=>$data->id,
			'user_id'=>$user->id
		]);

		auth()->login($user);
		return redirect('/');
	}
}
