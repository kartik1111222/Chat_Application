<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat(Request $request){
    
        $search_chat = $request->input('searchText');
        // dd($search_chat);
        $users = User::where('id', '!=', Auth()->user()->id)->get();
        $from_chat_message = Conversation::where('from_user_id', Auth()->user()->id)->with('message')->get();
        $to_chat_message = Conversation::where('user_id', Auth()->user()->id)->with('message')->get();

        if($search_chat != null){
            $conversation = Conversation::where('from_user_id', Auth()->user()->id)->whereHas('user', function ($query) use ($search_chat){
                $query->where('firstname', 'like', '%'.$search_chat.'%');
            })
            ->with(['user' => function($query) use ($search_chat){
                $query->where('firstname', 'like', '%'.$search_chat.'%');
            }])->get();
        }else{
           
            // $conversation = Conversation::where('from_user_id', Auth()->user()->id)->with('user')->get();
            // $conversation_data = Conversation::select('from_user_id', 'user_id')
            // ->where('from_user_id', auth()->user()->id)
            // ->orWhere('user_id', auth()->user()->id)
            // ->groupBy('from_user_id', 'user_id')
            // ->get();
            $conversation = Conversation::where('from_user_id', Auth()->user()->id)->orWhere('user_id', Auth()->user()->id)->get();
            // dd($conversation);
        }
        
        $chat_message = Conversation::pluck('user_id');

        
        return view('chat', compact('users', 'from_chat_message', 'to_chat_message', 'chat_message', 'conversation'));
    }

    public function chat_message(Request $request){
        $data = $request->all();


        $conversation = new Conversation();
        $conversation->from_user_id = Auth()->user()->id;
        $conversation->user_id = $data['receiver_user_id'];
        $conversation->save();
        $conversation_id = $conversation->id;
        
        //    dd($data);
        $message = new Message();
        $message->message = $data['message'];
        
        if($request->has('image')){
         $image = $request->image;
         $name = time() . '.' . $image->extension();
         $path = public_path(). "/assets/images/chat_img";
         $image->move($path, $name); 
         $message->file = $name;  
        }

        if($request->has('video')){
            $video = $request->video;
            $name = time() . '.' . $video->extension();
            $path = public_path(). "/assets/images/chat_img/video";
            $video->move($path, $name); 
            $message->video = $name;  
        }

        if($request->has('doc_file')){
            $doc_file = $request->doc_file;
            $name = time() . '.' . $doc_file->extension();
            $path = public_path(). "/assets/images/chat_img/doc_file";
            $doc_file->move($path, $name); 
            $message->doc_file = $name;  
        }

        if($request->has('audio')){
            $audio = $request->audio;
            $name = time() . '.' . $audio->extension();
            $path = public_path(). "/assets/images/chat_img/audio";
            $audio->move($path, $name); 
            $message->audio = $name;  
        }
        $message->conversation_id = $conversation_id;
        $message->save();

        return response()->json([
          'message' => 'Message sent!'
        ]);

    }
}
