<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat(Request $request){
    
        
        $users = User::where('id', '!=', Auth()->user()->id)->get();
        $from_chat_message = Message::with('user')->get();
        // dd($from_chat_message);
        $to_chat_message = Message::with('user')->get();       
        $chat_message = Message::pluck('user_id');
        
        return view('chat', compact('users', 'from_chat_message', 'to_chat_message', 'chat_message'));
    }

    public function chat_message(Request $request){
        $data = $request->all();
        // dd($data); 
        $message = new Message();
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
            $path = public_path(). "/assets/images/chat_img";
            $video->move($path, $name); 
            $message->video = $name;  
        }

        if($request->has('doc_file')){
            $doc_file = $request->doc_file;
            dd($doc_file);
            $name = time() . '.' . $doc_file->extension();
            $path = public_path(). "/assets/images/chat_img";
            $image->move($path, $name); 
            $message->doc_file = $name;  
        }
           

        $message->message = $data['message'];
        $message->user_id = $data['receiver_user_id'];
        $message->from_user_id = Auth()->user()->id;
        $message->save();
       
       
       
        // $message->message = $data['message'];
        // $message->user_id = $data['user_id'];

        // $to_chat_message = Message::where('user_id', $data['user_id'])->pluck('message');
        // $from_chat_message = Message::where('from_user_id', Auth()->user()->id)->pluck('message'); 
      
        return response()->json([
        //   'from_chat_message' => $from_chat_message,  
        //   'to_chat_message' => $to_chat_message,  
          'message' => 'Message sent!'
        ]);

        // $message = Message::where('from_user_id',Auth()->user()->id)->first();
        // if($message != null){
        //     $message_data = $message->message;
             
        // }
    }

    // public function search(Request $request){
    //     $name = $request->input('name');

    //     $users = User::query()
    //         ->when(
    //             $request->q,
    //             function (Builder $builder) use ($request) {
    //                 $builder->where('name', 'like', "%{$request->q}%")
    //                     ->orWhere('email', 'like', "%{$request->q}%");
    //             }
    //         )
    //         ->simplePaginate(5);
    // }

   
}
