<?php

namespace App\Http\Controllers;
use App\User;
use App\Conversation;
use App\PrivateMessage;

use Illuminate\Http\Request;

class UsersController extends Controller
{
	public function show($username){


		//throw new \Exception("weqweqw");
		$user = $this->findByUserName($username);
		

		return view('users.show',['user'=>$user]);
	}
	public function follows($username)
	{
		$user = $this->findByUserName($username);

		return view('users.follows',[
			'user' =>$user,
			'follows' =>$user->followers

		]);
	}
	public function follow($username, Request $request){
		$user = $this->findByUserName($username);

		$me = $request->user();

		$me->follows()->attach($user);

		return redirect("profile/".$username)->withSuccess("Usuario Seguido !");
	}
	public function unfollow($username, Request $request){
		$user = $this->findByUserName($username);

		$me = $request->user();

		$me->follows()->detach($user);

		return redirect("profile/".$username)->withSuccess("Dejaste de seguir al usuario !");
	}
	public function followers($username){
		$user = $this->findByUserName($username);
		return view('users.follows',[
			'user' =>$user,
			'follows' =>$user->followers

		]);
	}

	public function sendPrivateMessage($username,Request $request){

		$user = $this->findByUserName($username);
		$me = $request->user();

		$message = $request->input('message');

		$conversation = Conversation::between($me,$user);
	
		//creo un mensaje privado
		$mensajeEnviado= PrivateMessage::create([
			'conversation_id'=>$conversation->id,
			'user_id'=> $me->id,
			'message' => $message
		]);
		// y la relacion ?

		return redirect('/conversations/'.$conversation->id);
	}
	public function showConversation(Conversation $conversation){
		$conversation->load('users','mensajesDeConversacion');
		return view('users.conversation',[
			'conversation'=>$conversation,
			'userLogged' => auth()->user()
			]);
	}

	private function findByUserName($username){
		return User::where('username',$username)->firstOrFail();
	}
}
