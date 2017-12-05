<?php

namespace App\Http\Controllers;
use App\Message;
use App\Http\Requests\CreateMessageRequest;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
	public function show(Message $message){
		//ir a buscar el messages by id
		//return vista de message $message = Message::find($id);
		//$message = Message::find($id);
		return view('messages.show',[
			'message' => $message
		]);
	}
	public function create(CreateMessageRequest $request){
		//dd($request->all()); ver todo el contenido de la request
		$user = $request->user();
		$image = $request->file('image');
		$message = Message::create([
			'user_id' => $user->id,
			'content' => $request->input('message'),
			'image' => $image->store('messages','public')

		]);
		return redirect('/messages/'.$message->id);

	}
	public function search(Request $request)
	{
		$textoAdentroDelMensaje = $request->input('query');

		$messages = Message::search($textoAdentroDelMensaje)->get();
		$messages->load('user');

		return view('messages.index',[
			'messages' => $messages
		]);
	}
}
