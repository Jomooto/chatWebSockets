<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;

class chatController extends Controller
{
   public function __construct(){
       $this->middleware('auth');
   }

   public function chatWith(User $user){
        //we get our user and the user that we pass
       $user_a = auth()->user();
       $user_b = $user;

       //compare chats and chat_user table  with chat_user tablet where have the same user_id and exist in chats table
       //and get the first
       $chat = $user_a->chats()->wherehas('users', function ($q) use($user_b){
          $q->where('chat_user.user_id', $user_b->id);
       })->first();

       //if chat is null create a new chat register with their relations and create the relations
       if (!$chat){
           $chat = \App\Models\Chat::create([]);
           $chat->users()->sync([$user_a->id, $user_b->id]);

       }

       //redirect to the chat
       return redirect()->route('chat.show', $chat);

   }

   public function show(Chat $chat){
        //validate if chat have our user id
       abort_unless($chat->users->contains(auth()->id()), 403);
       //return the vie chat with de data on chat
       return view('chat', [
           'chat' => $chat
       ]);
   }

   public function getUSers(Chat $chat){

       $users = $chat->users;

       return response()->json([
          'users' => $users
       ]);
   }

   public function getMessages (Chat $chat){

       $messages = $chat->messages()->with('user')->get();

       return response()->json([
           'messages' => $messages
       ]);
   }

}
