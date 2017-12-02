<?php

namespace App\Http\Controllers;
use App\Message;
use Illuminate\Http\Request;

class PagesController extends Controller
{
	public function home(){
		$messages =Message::latest()->paginate(10);
		//dd($messages);  ver el contenido del objeto
		return view('welcome',[
			'messages' => $messages
			
		]);

	}
	
}
