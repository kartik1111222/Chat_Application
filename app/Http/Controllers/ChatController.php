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
    public function chat(Request $request)
    {

        $users = User::where('id', '!=', Auth()->user()->id)->get();
        $search_chat = $request->input('searchText');
        // \DB::statement("SET SQL_MODE=''");
        $conversation = Conversation::where('from_user_id', Auth()->user()->id)->groupBy(['user_id'])->get();

        if ($search_chat != null) {
            $conversation = Conversation::where('from_user_id', Auth()->user()->id)->whereHas('user', function ($query) use ($search_chat) {
                $query->where('firstname', 'like', '%' . $search_chat . '%');
            })
                ->with(['user' => function ($query) use ($search_chat) {
                    $query->where('firstname', 'like', '%' . $search_chat . '%');
                }])->get();
        } else {

            $user_id = User::pluck('id');

            $from_chat_message = Conversation::where('from_user_id', Auth()->user()->id)->with('message')->get();

            $to_chat_message = Conversation::whereIn('user_id', $user_id)->with('message')->get();


            if ($from_chat_message->count() > 0) {
                $chat_messages = $from_chat_message->merge($to_chat_message)->sortBy('created_at');
            } else {
                $chat_messages = $to_chat_message->sortBy('created_at');
            }
        }
        return view('chat', compact('users', 'chat_messages', 'conversation', 'from_chat_message', 'to_chat_message'));
    }

    public function chat_message(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $conversation = new Conversation();
        $conversation->from_user_id = Auth()->user()->id;
        $conversation->user_id = $data['receiver_user_id'];
        $conversation->save();
        $conversation_id = $conversation->id;

        $message = new Message();

        if ($data['message'] != null) {
            $message->message = $data['message'];
            $message->message_type = '1';
            $message_type = '1';
            $reply_message = $data['reply_message'];

        }

        if (isset($data['image'])) {
            if ($request->has('image')) {
                $image = $request->image;
                $name = time() . '.' . $image->extension();
                $path = public_path() . "/assets/images/chat_img";
                $image->move($path, $name);
                $message->message = $name;
                $message->message_type = '2';
                $data['message'] = $data['message'] . $name;
                $message_type = '2';
                // $reply_message = $data['reply_message'];

            }
        }

        if (isset($data['video'])) {
            if ($request->has('video')) {
                $video = $request->video;
                $videoname = time() . '.' . $video->extension();
                $videopath = public_path() . "/assets/images/chat_img/video";
                $video->move($videopath, $videoname);
                $message->message = $videoname;
                $message->message_type = '3';
                $data['message'] = $data['message'] . $videoname;
                $message_type = '3';
                // $reply_message = $data['reply_message'];

            }
        }

        if(isset($data['doc_file'])){
            if ($request->has('doc_file')) {
                $doc_file = $request->doc_file;
                $doc_file_name = time() . '.' . $doc_file->extension();
                $doc_file_path = public_path() . "/assets/images/chat_img/doc_file";
                $doc_file->move($doc_file_path, $doc_file_name);
                $message->message = $doc_file_name;
                $message->message_type = '4';
                $data['message'] = $data['message'] . $doc_file_name;
                $message_type = '4';
                // $reply_message = $data['reply_message'];

            }
        }

        if (isset($data['audio'])) {
            if ($request->has('audio')) {
                $audio = $request->audio;
                $audioname = time() . '.' . $audio->extension();
                $audio_path = public_path() . "/assets/images/chat_img/audio";
                $audio->move($audio_path, $audioname);
                $message->message = $audioname;
                $message->message_type = '5';
                $data['message'] = $data['message'] . $audioname;
                $message_type = '5';
                // $reply_message = $data['reply_message'];

            }
        }

        if ($data['reply_message'] != null) {
            $message->message = $data['message'];
            $message->reply_message = $data['reply_message'];
            $message->message_type = '6';
            $message_type = '6';
           
        }

        $message->conversation_id = $conversation_id;
        $message->save();

        return response()->json([
            'message_type' => $message_type,
            'message' => $data['message'],
            'reply_message' => $data['reply_message']
        ]);

        // $message = new Message();
        // $message->message = $data['message'];

        // if ($request->has('image')) {
        //     $image = $request->image;
        //     $name = time() . '.' . $image->extension();
        //     $path = public_path() . "/assets/images/chat_img";
        //     $image->move($path, $name);
        //     $message->message = $name;
        //     $message->message_type = '2';
        //     $data['message'] = $data['message'] . $name;
        // }

        // if ($request->has('video')) {
        //     $video = $request->video;
        //     $name = time() . '.' . $video->extension();
        //     $videopath = public_path() . "/assets/images/chat_img/video";
        //     $video->move($videopath, $name);
        //     $message->video = $name;
        //     $data['message'] = $data['message'] . ' ' . $videopath;
        // }

        // if ($request->has('doc_file')) {
        //     $doc_file = $request->doc_file;
        //     $name = time() . '.' . $doc_file->extension();
        //     $doc_file_path = public_path() . "/assets/images/chat_img/doc_file";
        //     $doc_file->move($doc_file_path, $name);
        //     $message->doc_file = $name;
        //     $data['message'] = $data['message'] . $doc_file_path;
        // }

        // if ($request->has('audio')) {
        //     $audio = $request->audio;
        //     $name = time() . '.' . $audio->extension();
        //     $audio_path = public_path() . "/assets/images/chat_img/audio";
        //     $audio->move($audio_path, $name);
        //     $message->audio = $name;
        //     $data['message'] = $data['message'] . ' ' . $audio_path;
        // }
        // $message->conversation_id = $conversation_id;
        // $message->save();

        // return response()->json([
        //     'message' => $data['message'],
        // ]);
    }

    public function remove_chat($id)
    {

        $conversation = Conversation::where('id', $id)->first();

        if ($conversation != null) {
            $conversation->delete();
            return response()->json([
                'message' => 'chat removed'
            ]);
        } else {
            return response()->json([
                'message' => 'something went wrong!'
            ]);
        }
    }
}
