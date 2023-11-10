<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.css" integrity="sha512-fxF1t7b0mpb/ytjBeSu/OpgXxCVcX5/O8AJGYvHaWmNfi/lYLtttitFK17K4iKBva4iU9dcZ+BIV7dyD/nDdSw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- css --}}
    <style>
        html,
        body,
        div,
        span {
            height: 100%;
            width: 100%;
            overflow: hidden;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            background: url("http://shurl.esy.es/y") no-repeat fixed center;
            background-size: cover;
        }

        .fa-2x {
            font-size: 1.5em;
        }

        .app {
            position: relative;
            overflow: hidden;
            top: 19px;
            height: calc(100% - 38px);
            margin: auto;
            padding: 0;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
        }

        .app-one {
            background-color: #f7f7f7;
            height: 100%;
            overflow: hidden;
            margin: 0;
            padding: 0;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .06), 0 2px 5px 0 rgba(0, 0, 0, .2);
        }

        .side {
            padding: 0;
            margin: 0;
            height: 100%;
        }

        .side-one {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            z-index: 1;
            position: relative;
            display: block;
            top: 0;
        }

        .side-two {
            padding: 0;
            margin: 0;
            height: 100%;
            width: 100%;
            z-index: 2;
            position: relative;
            top: -100%;
            left: -100%;
            -webkit-transition: left 0.3s ease;
            transition: left 0.3s ease;

        }


        .heading {
            padding: 10px 16px 10px 15px;
            margin: 0;
            height: 60px;
            width: 100%;
            background-color: #eee;
            z-index: 1000;
        }

        .heading-avatar {
            padding: 0;
            cursor: pointer;

        }

        .heading-avatar-icon img {
            border-radius: 50%;
            height: 40px;
            width: 40px;
        }

        .heading-name {
            padding: 0 !important;
            cursor: pointer;
        }

        .heading-name-meta {
            font-weight: 700;
            font-size: 100%;
            padding: 5px;
            padding-bottom: 0;
            text-align: left;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
            display: block;
        }

        .heading-online {
            display: none;
            padding: 0 5px;
            font-size: 12px;
            color: #93918f;
        }

        .heading-compose {
            padding: 0;
        }

        .heading-compose i {
            text-align: center;
            padding: 5px;
            color: #93918f;
            cursor: pointer;
        }

        .heading-dot {
            padding: 0;
            margin-left: 10px;
        }

        .heading-dot i {
            text-align: right;
            padding: 5px;
            color: #93918f;
            cursor: pointer;
        }

        .searchBox {
            padding: 0 !important;
            margin: 0 !important;
            height: 60px;
            width: 100%;
        }

        .searchBox-inner {
            height: 100%;
            width: 100%;
            padding: 10px !important;
            background-color: #fbfbfb;
        }


        /*#searchBox-inner input {
  box-shadow: none;
}*/

        .searchBox-inner input:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }

        .sideBar {
            padding: 0 !important;
            margin: 0 !important;
            background-color: #fff;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 120px);
        }

        .sideBar-body {
            position: relative;
            padding: 10px !important;
            border-bottom: 1px solid #f7f7f7;
            height: 72px;
            margin: 0 !important;
            cursor: pointer;
        }

        .sideBar-body:hover {
            background-color: #f2f2f2;
        }

        .sideBar-avatar {
            text-align: center;
            padding: 0 !important;
        }

        .avatar-icon img {
            border-radius: 50%;
            height: 49px;
            width: 49px;
        }

        .sideBar-main {
            padding: 0 !important;
        }

        .sideBar-main .row {
            padding: 0 !important;
            margin: 0 !important;
        }

        .sideBar-name {
            padding: 10px !important;
        }

        .name-meta {
            font-size: 100%;
            padding: 1% !important;
            text-align: left;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
        }

        .sideBar-time {
            padding: 10px !important;
        }

        .time-meta {
            text-align: right;
            font-size: 12px;
            padding: 1% !important;
            color: rgba(0, 0, 0, .4);
            vertical-align: baseline;
        }

        /*New Message*/

        .newMessage {
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
            position: relative;
            left: -100%;
        }

        .newMessage-heading {
            padding: 10px 16px 10px 15px !important;
            margin: 0 !important;
            height: 100px;
            width: 100%;
            background-color: #00bfa5;
            z-index: 1001;
        }

        .newMessage-main {
            padding: 10px 16px 0 15px !important;
            margin: 0 !important;
            height: 60px;
            margin-top: 30px !important;
            width: 100%;
            z-index: 1001;
            color: #fff;
        }

        .newMessage-title {
            font-size: 18px;
            font-weight: 700;
            padding: 10px 5px !important;
        }

        .newMessage-back {
            text-align: center;
            vertical-align: baseline;
            padding: 12px 5px !important;
            display: block;
            cursor: pointer;
        }

        .newMessage-back i {
            margin: auto !important;
        }

        .composeBox {
            padding: 0 !important;
            margin: 0 !important;
            height: 60px;
            width: 100%;
        }

        .composeBox-inner {
            height: 100%;
            width: 100%;
            padding: 10px !important;
            background-color: #fbfbfb;
        }

        .composeBox-inner input:focus {
            outline: none;
            border: none;
            box-shadow: none;
        }

        .compose-sideBar {
            padding: 0 !important;
            margin: 0 !important;
            background-color: #fff;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 160px);
        }

        /*Conversation*/

        .conversation {
            padding: 0 !important;
            margin: 0 !important;
            height: 100%;
            /*width: 100%;*/
            border-left: 1px solid rgba(0, 0, 0, .08);
            /*overflow-y: auto;*/
        }

        .message {
            padding: 0 !important;
            margin: 0 !important;
            background: url("w.jpg") no-repeat fixed center;
            background-size: cover;
            overflow-y: auto;
            border: 1px solid #f7f7f7;
            height: calc(100% - 180px);
        }

        .message-previous {
            margin: 0 !important;
            padding: 0 !important;
            height: auto;
            width: 100%;
        }

        .previous {
            font-size: 15px;
            text-align: center;
            padding: 10px !important;
            cursor: pointer;
        }

        .previous a {
            text-decoration: none;
            font-weight: 700;
        }

        .message-body {
            margin: 0 !important;
            padding: 0 !important;
            width: auto;
            height: auto;
        }

        .message-main-receiver {
            /*padding: 10px 20px;*/
            max-width: 60%;
        }

        .message-main-sender {
            padding: 3px 20px !important;
            margin-left: 40% !important;
            max-width: 60%;
        }

        .message-text {
            margin: 0 !important;
            padding: 5px !important;
            word-wrap: break-word;
            font-weight: 200;
            font-size: 14px;
            padding-bottom: 0 !important;
        }

        .message-time {
            margin: 0 !important;
            margin-left: 50px !important;
            font-size: 12px;
            text-align: right;
            color: #9a9a9a;

        }

        .receiver {
            width: auto !important;
            padding: 4px 10px 7px !important;
            border-radius: 10px 10px 10px 0;
            background: #ffffff;
            font-size: 12px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            word-wrap: break-word;
            display: inline-block;
        }

        .sender {
            float: right;
            width: auto !important;
            background: #dcf8c6;
            border-radius: 10px 10px 0 10px;
            padding: 4px 10px 7px !important;
            font-size: 12px;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
            display: inline-block;
            word-wrap: break-word;
        }


        /*Reply*/

        .reply {
            height: 60px;
            width: 100%;
            background-color: #f5f1ee;
            padding: 10px 5px 10px 5px !important;
            margin: 0 !important;
            z-index: 1000;
        }

        .reply-emojis {
            padding: 5px !important;
            
        }

        .reply-emojis i {
            text-align: center;
            padding: 5px 5px 5px 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-recording {
            padding: 5px !important;
        }

        .reply-recording i {
            text-align: center;
            padding: 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-send {
            padding: 5px !important;
        }

        .reply-send i {
            text-align: center;
            padding: 5px !important;
            color: #93918f;
            cursor: pointer;
        }

        .reply-main {
            padding: 2px 5px !important;
        }

        .reply-main textarea {
            /* width: 100%; */
            resize: none;
            overflow: hidden;
            padding: 5px !important;
            outline: none;
            border: none;
            text-indent: 5px;
            box-shadow: none;
            /* height: 100%; */
            font-size: 16px;
        }

        .reply-main textarea:focus {
            outline: none;
            border: none;
            text-indent: 5px;
            box-shadow: none;
        }

        #files_upload,#user_chat2,.reply{
            overflow: visible !important;
        }

        @media screen and (max-width: 700px) {
            .app {
                top: 0;
                height: 100%;
            }

            .heading {
                height: 70px;
                background-color: #009688;
            }

            .fa-2x {
                font-size: 2.3em !important;
            }

            .heading-avatar {
                padding: 0 !important;
            }

            .heading-avatar-icon img {
                height: 50px;
                width: 50px;
            }

            .heading-compose {
                padding: 5px !important;
            }

            .heading-compose i {
                color: #fff;
                cursor: pointer;
            }

            .heading-dot {
                padding: 5px !important;
                margin-left: 10px !important;
            }

            .heading-dot i {
                color: #fff;
                cursor: pointer;
            }

            .sideBar {
                height: calc(100% - 130px);
            }

            .sideBar-body {
                height: 80px;
            }

            .sideBar-avatar {
                text-align: left;
                padding: 0 8px !important;
            }

            .avatar-icon img {
                height: 55px;
                width: 55px;
            }

            .sideBar-main {
                padding: 0 !important;
            }

            .sideBar-main .row {
                padding: 0 !important;
                margin: 0 !important;
            }

            .sideBar-name {
                padding: 10px 5px !important;
            }

            .name-meta {
                font-size: 16px;
                padding: 5% !important;
            }

            .sideBar-time {
                padding: 10px !important;
            }

            .time-meta {
                text-align: right;
                font-size: 14px;
                padding: 4% !important;
                color: rgba(0, 0, 0, .4);
                vertical-align: baseline;
            }

            /*Conversation*/
            .conversation {
                padding: 0 !important;
                margin: 0 !important;
                height: 100%;
                /*width: 100%;*/
                border-left: 1px solid rgba(0, 0, 0, .08);
                /*overflow-y: auto;*/
            }

            .message {
                height: calc(100% - 140px);
            }

            .reply {
                height: 70px;
            }

            .reply-emojis {
                padding: 5px 0 !important;
            }

            .reply-emojis i {
                padding: 5px 2px !important;
                font-size: 1.8em !important;
            }

            .reply-main {
                padding: 2px 8px !important;
            }

            .reply-main textarea {
                padding: 8px !important;
                font-size: 18px;
            }

            .reply-recording {
                padding: 5px 0 !important;
            }

            .reply-recording i {
                padding: 5px 0 !important;
                font-size: 1.8em !important;
            }

            .reply-send {
                padding: 5px 0 !important;
            }

            .reply-send i {
                padding: 5px 2px 5px 0 !important;
                font-size: 1.8em !important;
            }

            .holder {
                height: 300px;
                width: 300px;
                border: 2px solid black;
            }

            img {
                max-width: 300px;
                max-height: 300px;
                min-width: 300px;
                min-height: 300px;
            }

            input[type="file"] {
                margin-top: 5px;
            }

            .heading {
                font-family: Montserrat;
                font-size: 45px;
                color: green;
            }

            .hidden {
                display: none;
            }

            .msg_menu {
                margin-left:
            }

            label.error {
            color: #dc3545;
            font-size: 14px;
        }
        }

    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
    {{-- <div class="text-right"> --}}
    <a href="{{route('logout')}}" class="btn btn-danger" style="margin-left:1495px ">Logout</a>
    {{-- </div>  --}}
    <div class="container app">
        <div class="row app-one">
            <div class="col-sm-4 side">
                <div class="side-one">
                    <div class="row heading">
                        <div class="col-sm-3 col-xs-3 heading-avatar">
                            <div class="heading-avatar-icon">
                                <img src="{{asset('assets/images/profile/' . Auth()->user()->profile)}}">
                            </div>
                        </div>
                        <div class="col-sm-1 col-xs-1  heading-dot  pull-right">
                            <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                        </div>
                        <div class="col-sm-2 col-xs-2 heading-compose  pull-right">
                            <i class="fa fa-comments fa-2x  pull-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <form action="{{route('user.chat')}}" method="GET">
                        <div class="row searchBox">
                            <div class="col-sm-12 searchBox-inner">
                                <div class="form-group has-feedback">
                                    <input id="searchText" type="text" class="form-control" name="searchText" placeholder="Search">
                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                    <div class="col-md-2">
                                        <input type="submit" class="form-control mb-3" value="Search">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    
                    <div class="row sideBar">
                        @foreach($conversation as $conversation_data)
                       
                        
                        <div class="row sideBar-body" onclick="open_user_chat({{$conversation_data->user->id}})">
                            <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                <div class="avatar-icon">
                                    <img src="{{asset('assets/images/profile/' . $conversation_data->user->profile)}}">
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-9 sideBar-main">
                                <div class="row">
                                    <div class="col-sm-8 col-xs-8 sideBar-name">
                                        <span class="name-meta">{{$conversation_data->user->firstname}} {{$conversation_data->user->lastname}}</span>
                                    </div>
                                    <div class="col-sm-4 col-xs-4 pull-right sideBar-time">
                                        <span class="time-meta pull-right">18:18
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>

                <div class="side-two">
                    <div class="row newMessage-heading">
                        <div class="row newMessage-main">
                            <div class="col-sm-2 col-xs-2 newMessage-back">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>
                            </div>
                            <div class="col-sm-10 col-xs-10 newMessage-title">
                                New Chat
                            </div>
                        </div>
                    </div>

                    <form action="{{route('user.chat')}}" type="GET" id="search-USerform">
                        <div class="row composeBox">
                            <div class="col-sm-12 composeBox-inner">
                                <div class="form-group has-feedback">
                                    <input type="text" class="form-control" name="search" id="search" placeholder="Search People">

                                    <span class="glyphicon glyphicon-search form-control-feedback"></span>
                                    <div class="col-md-2">
                                        <input type="submit" class="form-control mb-3" value="Search">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row compose-sideBar">
                        @foreach($users as $value)
                        <div class="row sideBar-body" onclick="open_user_chat({{$value->id}})">
                            <div class="col-sm-3 col-xs-3 sideBar-avatar">
                                <div class="avatar-icon">
                                    <img src="{{ asset('assets/images/profile/'. $value->profile) }}">
                                </div>
                            </div>
                            <div class="col-sm-9 col-xs-9 sideBar-main">
                                <div class="row">
                                    <div class="col-sm-8 col-xs-8 sideBar-name">
                                        <span class="name-meta">{{$value->firstname}} {{$value->lastname}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

            @foreach($users as $value)
            {{-- {{dd($value)}} --}}
            <input type="hidden" name="receiver_user_id" id="receiver_user_id{{$value->id}}" value="{{$value->id}}">
            <div class="col-sm-8 conversation user_chat" style="display: none" id="user_chat{{$value->id}}">


                <div class="row heading">
                    <div class="col-sm-2 col-md-1 col-xs-3 heading-avatar">
                        <div class="heading-avatar-icon">
                            <img src="{{asset('assets/images/profile/' . $value->profile)}}">
                        </div>
                    </div>
                    <div class="col-sm-8 col-xs-7 heading-name">
                        <a id="username" class="heading-name-meta">{{$value->firstname}} {{$value->lastname}}</a>
                        <span class="heading-online">Online</span>
                    </div>
                    <div class="col-sm-1 col-xs-1  heading-dot pull-right">
                        <i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="row message" id="conversation">
                    <div class="row message-previous">
                        <div class="col-sm-12 previous">
                            <a onclick="previous(this)" id="ankitjain28" name="20">
                                Show Previous Message!
                            </a>
                        </div>
                    </div>
                    @foreach($to_chat_message as $to_chat_value)
                    <div class="row message-body">
                        <div class="col-sm-12 message-main-receiver">
                            <div class="receiver">
                                <div class="message-text friend_chat_msg" id="myInput{{$to_chat_value->id}}">
                                    {{$to_chat_value->message->message}}
                                    <button type="submit" onclick="copyToClipboard({{$to_chat_value->message->id}})"><i class="fa-solid fa-copy"></i></button>
                                    <button type="button" onclick="showReplyContainer({{$to_chat_value->message->id}})"><i class="fa-solid fa-reply"></i></button>

                                    @if($to_chat_value->message->file != null)
                                    <img src="{{asset('assets/images/chat_img/' . $to_chat_value->message->file)}}" style="height: 5cm; width: 10cm;">
                                    @endif

                                    @if($to_chat_value->message->video != null)
                                    <video width="320" height="240" controls>
                                        <source src="{{asset('assets/images/chat_img/video/' . $to_chat_value->message->video)}}" type="video/mp4">
                                      Your browser does not support the video tag.
                                  </video>
                                  @endif

                                  @if($to_chat_value->message->doc_file != null)
                                   <iframe src="{{asset('assets/images/chat_img/doc_file/' . $to_chat_value->message->doc_file)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                                  @endif
                                  
                                  @if($to_chat_value->message->audio != null)
                                    <audio controls="" style="vertical-align: middle" src="{{asset('assets/images/chat_img/audio/' . $to_chat_value->message->video)}}" type="audio/mp3" controlslist="nodownload">
                                        Your browser does not support the audio element.
                                    </audio>
                                  @endif    
                                </div>
                                <span class="message-time pull-right">

                                </span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    @foreach($from_chat_message as $from_chat_value)


                    @if(($value->id == $from_chat_value->user_id) )
                    <div class="row message-body " style="position: relative">
                        <div class="col-sm-12 message-main-sender">
                            <div class="sender" style="position: relative">
                                <div class="message-text your_chat_msg" id="myInput{{$from_chat_value->message->id}}">
                                    {{$from_chat_value->message->message}}<br>

                                    @if($from_chat_value->message->file != null)
                                    <img src="{{asset('assets/images/chat_img/' . $from_chat_value->message->file)}}" style="height: 5cm; width: 10cm;">
                                    @endif

                                    @if($from_chat_value->message->video != null)
                                    <video width="320" height="240" controls>
                                        <source src="{{asset('assets/images/chat_img/video/' . $from_chat_value->message->video)}}" type="video/mp4">
                                      Your browser does not support the video tag.
                                    </video>
                                    @endif

                                  @if($from_chat_value->message->doc_file != null)
                                   <iframe src="{{asset('assets/images/chat_img/doc_file/' . $from_chat_value->message->doc_file)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                                  @endif
                                  
                                  @if($from_chat_value->message->audio != null)
                                    <audio controls="" style="vertical-align: middle" src="{{asset('assets/images/chat_img/audio/' . $from_chat_value->message->video)}}" type="audio/mp3" controlslist="nodownload">
                                        Your browser does not support the audio element.
                                    </audio>
                                  @endif                       
                                  {{-- @if($from_chat_value->doc_file != null)
                                   <iframe src="{{asset('assets/images/chat_img/' . $from_chat_value->doc_file)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                                  @else
                                  <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{asset('assets/images/chat_img/' . $from_chat_value->doc_file)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
                                  @endif --}}

                                  {{-- @if(upload is image)
   <img src="{{image url}}"/>
 @elseif(upload is pdf)
   <iframe src="{{pdf url}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
 @elseif(upload is document)
   <iframe src="https://view.officeapps.live.com/op/view.aspx?src={{urlendoe(doc url)}}" frameborder="0" style="width:100%;min-height:640px;"></iframe>
 @else
   //manage things here
 @endif --}}
                                </div>
                                <button type="submit" onclick="copyToClipboard({{$from_chat_value->message->id}})"><i class="fa-solid fa-copy"></i></button>
                                <button type="button" onclick="showReplyContainer({{$from_chat_value->message->id}})"><i class="fa-solid fa-reply"></i></button>
                                {{-- <button onclick="messageOptions()" style="position: absolute;bottom: 0;right: 5px;"><i class="fa fa-ellipsis-v fa-2x  pull-right" aria-hidden="true"></i></button> --}}


                                <span class="message-time pull-right">

                                </span>
                            </div>
                        </div>
                        {{-- <div class="msg_menu" style="width:100px; position: absolute; top: 0px; left: 640px;background-color: #fff;border: 2px solid black; height: 100px; display: none;padding-top: 20px" id="msg_option"> --}}
                            
                        {{-- </div> --}}
                    </div>
                    @endif
                    @endforeach
                </div>
                <div class="row reply" >
                    <div class="col-sm-1 col-xs-1 reply-emojis">
                        <i class="fa fa-smile-o fa-2x"></i>
                    </div>
                    <form method="POST" id="send_chat_message_{{$value->id}}" class="chat-form" data-receiver-id="{{$value->id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-9 col-xs-9 reply-main" id="message_field" >
                            <img id="image-preview" style="max-width: 300px; max-height: 300px;" />
                            <textarea rows="1" cols="50" name="message" style="border: 2"  id="message{{$value->id}}" placeholder="enter text here"></textarea>
                        </div>
                        <div class="col-sm-2" id="files_upload">
                            <label for="video{{$value->id}}" class="custom-file-upload">
                                <i class="fa fa-video fa-2x" aria-hidden="true"></i>
                            </label>
                            <input type="file" id="video{{$value->id}}" name="video" class="video" style="display: none;">
                            
                            
                            <label for="image{{$value->id}}" class="custom-file-upload">
                                <i class="fa fa-image fa-2x" aria-hidden="true"></i>
                            </label>
                            <input type="file" id="image{{$value->id}}" name="image" class="photo" style="display: none;">

                            <label for="doc_file{{$value->id}}" class="custom-file-upload">
                                <i class="fa-solid fa-folder"></i>
                            </label>
                            <input type="file" id="doc_file{{$value->id}}" name="doc_file" class="photo" style="display: none;">

                            <label for="audio{{$value->id}}" class="custom-file-upload">
                                <i class="fa-solid fa-microphone" aria-hidden="true" style="size: 500px"></i>
                            </label>
                            <input type="file" id="audio{{$value->id}}" name="audio" class="photo" style="display: none;">
                        </div>
                        <div class="col-sm-1 col-xs-1">
                            
                        </div>
                         

                        <div class="reply-container hidden" id="replyContainer">
                            <textarea class="reply-input" id="replyInput" placeholder="Type your reply here"></textarea>
                        </div>
                        <div class="col-sm-1 col-xs-1 holder">
                            <button type="submit" data-receiver-id="{{$value->id}}"><i class="fa-regular fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    </div>
</body>
</html>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js" integrity="sha512-2hIlk2fL+NNHkULe9gGdma/T5vSYk80U5tvAFSy3dGEl8XD4h2i6frQvHv5B+bm/Itmi8nJ6krAcj5FWFcBGig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.5.16/clipboard.min.js"></script>
<script>
    $(function() {
        $(".heading-compose").click(function() {
            $(".side-two").css({
                "left": "0"
            });
        });

        $(".newMessage-back").click(function() {
            $(".side-two").css({
                "left": "-100%"
            });
        });
    })

    $(document).ready(function() {
        $('#image').change(function() {
            var file = this.files[0];
            if (file) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            } else {
                $('#image-preview').attr('src', '');
            }
        });
    });


    function messageOptions() {
        $("#msg_option").show();
    }

    function copyToClipboard($id) {
        / Get the text element by its id /
        var textToCopy = document.getElementById("myInput" + $id);

        / Create a text area element to copy the text to the clipboard /
        var textArea = document.createElement("textarea");

        / Set the value of the text area to the text you want to copy /
        textArea.value = textToCopy.innerText;

        / Append the text area to the document /
        document.body.appendChild(textArea);

        / Select the text in the text area /
        textArea.select();

        / Copy the selected text to the clipboard /
        document.execCommand("copy");

        / Remove the temporary text area from the document /
        document.body.removeChild(textArea);

        / You can provide user feedback here, e.g., show a message that the text has been copied /
    }

    function showReplyContainer(chatId) {
        const replyContainer = document.getElementById(`replyContainer${chatId}`);
        if (replyContainer) {
            replyContainer.classList.remove("hidden"); // Show the reply container
        }
    }

    function sendReply(chatId) {
        const replyInput = document.getElementById(`replyInput${chatId}`);
        const replyMessage = replyInput.value;

        // Send the replyMessage to the server using AJAX or another method

        // After sending the reply, you can hide the reply container
        const replyContainer = document.getElementById(`replyContainer${chatId}`);
        if (replyContainer) {
            replyContainer.classList.add("hidden"); // Hide the reply container
        }
    }



    function open_user_chat($id) {
        // Hide all chat windows
        $('[id^="user_chat"]').hide();

        $('#user_chat' + $id).show();
    }

    function files_options(){

    }



    // function send_message($id) {

    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     var user_id = $id;
    //     var message = $("#message" + $id).val();

    //     var url = "{{route('user.chat_message')}}";

    //     $.ajax({
    //         url: url
    //         , type: 'POST'
    //         , data: {
    //             user_id: $id
    //             , message: message
    //         }
    //         , dataType: 'json'
    //         , success: function(response) {
    //             console.log(response.from_chat_message);

    //             $('.your_chat_msg').html(response.from_chat_message);

    //             // $('#friend_chat_msg').html(response.to_chat_message);
    //             $('#message_field').load(document.URL + ' #message_field');

    //         }
    //     , });
    // }
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".chat-form").submit(function(e) {
        e.preventDefault();

        var form = $(this);
        var receiverUserId = form.data("receiver-id");

        var formdata = new FormData(form[0]);
        formdata.append('receiver_user_id', receiverUserId);

        var url = "{{ route('user.chat_message') }}";

        $.ajax({
            url: url
            , type: 'POST'
            , data: formdata
            , dataType: 'JSON'
            , contentType: false
            , processData: false
            , success: function(response) {
             $('#message_field').load();
            }
        });
    });

    

</script>














<!------ Include the above in your HEAD tag ---------->
