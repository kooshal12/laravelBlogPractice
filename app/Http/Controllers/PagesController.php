<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mail;

class PagesController extends Controller {

	public function getIndex(){
		$posts = Post::orderBy('created_at','desc')->limit(3)->get();
		return view ('pages.welcome')->withPosts($posts);
	}

	public function getContact(){

		return view ('pages.contact');

	}
	public function postContact(Request $request)
	{
		$this->validate($request,[
			'email'=> 'required|email',
			'message' => 'required|min:10|max:255'
		]);
		$data = array(
			'email' => $request->email,
			'bodyMessage' => $request->message //message is a bulit in variable in laravel
		);
		Mail::send('emails.contact', $data, function($message) use ($data){
			$message->from($data['email']);
			$message->to(['mrkushalsharma@gmail.com']);
		});
		return view ('pages.contact');
	}

	public function getAbout(){

		$first = 'Kushal'; 

		$last = 'Sharma';

		$fullname = $first . " ". $last;

		$email = 'mrkushalsharma@gmail.com';
		
		$data=[];
		$data['fullname'] = $fullname;
		$data['email'] = $email;
 		return view ('pages.about')->withData($data);

	}
}